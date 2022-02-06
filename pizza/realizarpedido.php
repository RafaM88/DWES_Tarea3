<?php
    require_once("connect_db.php");
    session_start();
    if(!isset($_SESSION['nombre'])){
        die(header("Location:index.php"));
    }
?>
<!DOCTYPE html>
<html>
<title>Pizza Donatello</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
<style>
body, html {height: 100%}
body,h1,h2,h3,h4,h5,h6 {font-family: "Amatic SC", sans-serif}
.menu {display: none}
.bgimg {
  background-repeat: no-repeat;
  background-size: cover;
  background-image: url("img/pizza2.jpg");
  min-height: 90%;
  
}

body{
    background-color:black;
   
  }

</style>
<body>
<div class="w3-top">
  <div class="w3-bar w3-xlarge w3-black w3-opacity w3-hover-opacity-off" id="myNavbar">
    <a href="void.php" class="w3-bar-item w3-button">Vaciar la cesta</a>
</div>
</div>
<header class="bgimg w3-display-container w3-grayscale-min" id="home">
  <div class="w3-display-bottomleft w3-padding">
    <?php
    if(isset($_SESSION['nombre'])){
      ?>
      <span class="w3-tag w3-xlarge">BIENVENID@, <?=$_SESSION['nombre'];?></span>
      <?php
    }
    ?>
    </div>
<div class="w3-display-middle w3-center" style="background-color:rgba(255,255,255,0.7);width:100%">
    <span class="w3-hide-small" style="font-size:100px;color:#007F00;"><b>PIZZERÍA</b><br></span>
    <span class="w3-hide-small" style="font-size:100px;color:#cc0000"><b>DONATELLO</b></span>
    <span class="w3-text-green w3-hide-large w3-hide-medium" style="font-size:60px"><b>pizzería<br></span>
    <span class="w3-text-red w3-hide-large w3-hide-medium" style="font-size:60px"><b>donatello</b></span>
    <p><a href="#form" class="w3-button w3-xxlarge w3-black">PEDIR</a></p>
  
</div>
</header>
<div class="w3-container w3-green w3-margin-top w3-margin-left w3-margin-right w3-margin-bottom w3-xxxlarge">
  <h2>Nuestras pizzas</h2>
</div>

<form class="w3-container  w3-gray w3-margin-top w3-margin-left w3-margin-right w3-margin-bottom" id="form" method="post" action="addcesta.php">
  <select class="w3-select w3-margin-top w3-margin-bottom w3-xxlarge" name="option">
  <option value="" disabled selected>Elige una de nuestras pizzas</option>
  <?php

    $query=$dbh->prepare("select * from pizzas;");
    $result=$query->execute();
    $result=$query->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $row){
        ?><option value="<?=$row['nombre'];?>"><b><?=$row['nombre']."</b> - ";?><?php
    $query2=$dbh->prepare("select unnest(ingredientes) as ingredientes from pizzas where nombre=?;");
$query2->bindParam(1,$row['nombre']);
    $result2=$query2->execute();
    $result2=$query2->fetchAll(PDO::FETCH_ASSOC);
    $string = "";
    foreach($result2 as $ingredientes){
      $string = $string . $ingredientes['ingredientes'].", ";
    }
    $final= rtrim($string,", ");
    echo $final." - ".$row['precio']." €";
    ?>
    </option><?php
    }
?>
</select>

<select class="w3-select w3-margin-top w3-margin-bottom w3-xxlarge" name="size">
  <option value="" disabled selected>Elige un tamaño</option>
  <?php

$query=$dbh->prepare("select * from tamanio;");
$result=$query->execute();
$result=$query->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $row){
    ?><option value="<?=$row['nombre'];?>"><?=$row['nombre'];?>-<?=$row['descripcion']." ".$row['incremento'];?> €</option>
<?php
}
?>
</select>
<label class="w3-xxlarge">Cantidad (máximo 10)</label>
<input class="w3-input w3-xxlarge" type="number" min="1" max="10" step="1" name="cantidad">
<input class="w3-button w3-block w3-red w3-margin-top w3-margin-bottom w3-xxlarge w3-hover-green" type="submit" value="añadir a la cesta">
</form>
<p style="background-color:red">
<div class="w3-gray w3-container w3-center">
<?php
if(!isset($_COOKIE['cesta'])){
    ?>
    
        <h1 class="w3-center w3-xxxlarge w3-green"><b>Tu cesta está vacía</b></h1><?php
    
}else{
    ?><h1 class="w3-center w3-xxxlarge w3-green"><b>Productos añadidos a la cesta</b></h1>
   <?php
   $total=0;
   $cesta=json_decode($_COOKIE['cesta']);
   for($i=0;$i<count($cesta);$i++){
     ?>
     <form method="GET" action="borrar.php?number=<?=$i;?>">
    <h1><b><?=$cesta[$i][0];?></b>
    <span class="w3-right w3-tag w3-dark-grey w3-round">Precio unitario <?=$cesta[$i][1];?> €</span></h1>
    <p class="w3-xlarge">Tamaño: <b><?=$cesta[$i][2];?>(<?=$cesta[$i][4];?> €)</b></p>
    <p class="w3-xlarge">Cantidad: <b><?=$cesta[$i][3];?></b></p>
    <h1>
    <span class="w3-tag w3-dark-grey w3-round">SUBTOTAL:<?php
    $subtotal=((($cesta[$i][1])+($cesta[$i][4]))*($cesta[$i][3]));
    $total=$total + $subtotal;
    echo $subtotal;?> €</span></h1><br>
    <input class="w3-red w3-xlarge w3-block w3-button w3-margin-bottom" value="Eliminar de la cesta" type="submit">
    <?php
       }
   ?>
 
  
   
   </div>
   <hr>
    </form>
 <?php
  }
 

  

  

?>
<h1><span class="w3-margin w3-xxxlarge w3-center w3-tag w3-dark-grey w3-round">TOTAL <?=$total?> €</span></h1>
</div>
<footer class="w3-center w3-black w3-padding-48 w3-xxlarge">
  <p>Powered by <a href="https://github.com/RafaM88" title="W3.CSS" target="_blank" class="w3-hover-text-green">Rafa Montes</a></p>
</footer>
</body>
</html>