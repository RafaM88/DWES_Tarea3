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
    echo $final;
    ?>
    </option><?php
    }
?>
</select>
<input class="w3-button w3-block w3-red w3-margin-top w3-margin-bottom w3-xxlarge w3-hover-green" type="submit" value="añadir a la cesta">
</form>


<footer class="w3-center w3-black w3-padding-48 w3-xxlarge">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>
</body>
</html>