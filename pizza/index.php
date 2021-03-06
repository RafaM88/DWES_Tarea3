<?php

  session_start();
  
  require_once("connect_db.php");

//Consultas

$query_ingredientes = "select * from ingredientes order by ingrediente;";
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

</style>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-xlarge w3-black w3-opacity w3-hover-opacity-off" id="myNavbar">
    <a href="#" class="w3-bar-item w3-button">INICIO</a>
    <a href="#menu" class="w3-bar-item w3-button w3-hide-small">MENÚ</a>
    <a href="#about" class="w3-bar-item w3-button w3-hide-small">NOSOTROS</a>
    <a href="#myMap" class="w3-bar-item w3-button w3-hide-small">REGISTRO</a>
    
    <?php
    if(!isset($_SESSION['nombre'])){
      ?>
      
    <span class="w3-bar-item w3-button w3-right" onclick="document.getElementById('id01').style.display='block'">ÁREA CLIENTE</span>
    <?php
    }else{
      ?>
      <a href="realizarpedido.php" class="w3-bar-item w3-button">REALIZAR PEDIDO</a>
      <a href="logout.php" class="w3-bar-item w3-button w3-right" target="_blank">Cerrar sesión</a>
      <?php
    }
    ?>
   
  </div>
</div>

<!-- Header with image -->
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

  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
        <img src="img/icono_chef.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
      </div>
<!-- Login -->
      <form class="w3-container" method="post" action="login.php" style="font-size:30px;" >
      <?php
      if(isset($_GET['errorLog'])){
  switch($_GET['errorLog']){
    case 1:
    $error="Has dejado campos sin rellenar. Todos los campos son obligatorios";
    break;

    case 2:
      $error="Usuario y/o contraseña incorrectos";
      break;

      default:
      $error="Error desconocido";
  }
  ?>
  <div class="w3-panel w3-red w3-display-container">
        <span onclick="this.parentElement.style.display='none'"class="w3-button w3-large w3-display-topright">&times;</span>
        <h3>Error</h3>
        <p><?=$error?></p>
    </div>
    <script>document.getElementById('id01').style.display='block';</script>
  <?php
}
    ?>
        <div class="w3-section">
          <label><b>Usuario</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Usuario" name="usuario" required="required" style="-input-placeholder background-color:red;">
          <label><b>Contraseña</b></label>
          <input class="w3-input w3-border" type="password" placeholder="contraseña" name="pass" required>
          <input class="w3-button w3-block w3-green w3-section w3-padding" type="submit" value="Iniciar Sesión">
          <input class="w3-check w3-margin-top" name="remember" type="checkbox" checked="checked"> Recuérdame
          <br>
          <input class="w3-check w3-margin-top" name="soyadmin" type="checkbox"> Soy administrador
        </div>
      </form>

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey" style="font-size:30px;">
        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancelar</button>
       
      </div>

    </div>
  </div>
  <div class="w3-display-middle w3-center" style="background-color:rgba(255,255,255,0.7);width:100%">
    <span class="w3-hide-small" style="font-size:100px;color:#007F00;"><b>PIZZERÍA</b><br></span>
    <span class="w3-hide-small" style="font-size:100px;color:#cc0000"><b>DONATELLO</b></span>
    <span class="w3-text-green w3-hide-large w3-hide-medium" style="font-size:60px"><b>pizzería<br></span>
    <span class="w3-text-red w3-hide-large w3-hide-medium" style="font-size:60px"><b>donatello</b></span>
    <p><a href="#menu" class="w3-button w3-xxlarge w3-black">CARTA</a></p>
  </div>
</header>

<!-- Menu Container -->
<div class="w3-container w3-black w3-padding-64 w3-xxlarge" id="menu">
  <div class="w3-content">
  
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">NUESTRA CARTA</h1>
    <div class="w3-row w3-center w3-border w3-border-dark-grey">
      <a href="javascript:void(0)" onclick="openMenu(event, 'Pizza');" id="myLink">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Pizzas</div>
      </a>
      <a href="javascript:void(0)" onclick="openMenu(event, 'Pasta');">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Ingredientes</div>
      </a>
      <a href="javascript:void(0)" onclick="openMenu(event, 'Starter');">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Tamaños</div>
      </a>
    </div>

    <div id="Pizza" class="w3-container menu w3-padding-32 w3-white">
     <?php
     $nombre="";
     $precio=0;
         $query=$dbh->prepare("select nombre,ingredientes, precio from pizzas;");
         $result=$query->execute();
         $result=$query->fetchAll(PDO::FETCH_ASSOC);
         foreach($result as $row){
           
     ?>
      <h1><b><?=$row['nombre'];?></b> <span class="w3-right w3-tag w3-dark-grey w3-round"><?=$row['precio']?></span></h1>
      <p class="w3-text-grey">
        <?php

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
    </p>
      <hr>
      <?php
         }
         ?>
      
  
    </div>
  
    <div id="Pasta" class="w3-container menu w3-padding-32 w3-white">

    <?php
      $stmt = $dbh -> prepare($query_ingredientes);
      $stmt -> execute();
      $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
      foreach($result as $row){
        ?>
        <h1><b><?=$row['ingrediente'];?></b> <span class="w3-tag w3-grey w3-round"><?=$row['tipo'];?></span> 
        <span class="w3-right w3-tag w3-dark-grey w3-round"><?=$row['precio']?> €</span></h1>
      <hr>
      <?php
      }

    ?>
     
    </div>


    <div id="Starter" class="w3-container menu w3-padding-32 w3-white">
      
   <?php
    $query3=$dbh->prepare("select * from tamanio;");
    $result3=$query3->execute();
    $result3=$query3->fetchAll(PDO::FETCH_ASSOC);
    foreach($result3 as $row){
      ?>
      <h1><b><?=$row['nombre'];?></b> <span class="w3-right w3-tag w3-dark-grey w3-round">
        <?php
          if($row['incremento']>0){
            $incremento="+".$row['incremento']." €";
          }else if($row['incremento']<0){
            $incremento=$row['incremento']." €";
          }else{
            $incremento="incluído";
          }

          echo $incremento;
            
          
        ?>
      </span></h1>
      <p class="w3-text-grey"><?=$row['descripcion'];?></p>
      <hr>
      <?php
    }
   ?>
     
      
      
  </div>
</div>

<!-- About Container -->
<div class="w3-container w3-padding-64 w3-red w3-grayscale w3-xlarge" id="about">
  <div class="w3-content">
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">NOSOTROS</h1>
    <p>Restaurante italiano con comida para recoger o para consumir en local. Puedes hacer tu pedido en nuestra web.</p> Contamos con en equipo humano con una alta experiencia
      en cocina, para poder ofrecerte la mejor calidad en nuestros platos. Poco a poco iremos añadiendo especialidades a nuestra carta.</p>
    
    
    <h1><b>Horario</b></h1>
    
    <div class="w3-row">
      <div class="w3-col s6">
        <p>Lunes y martes CERRADO</p>
        <p>Miércoles 10.00 - 24.00</p>
        <p>Jueves 10:00 - 24:00</p>
      </div>
      <div class="w3-col s6">
        <p>Viernes 10:00 - 12:00</p>
        <p>Sábado 10:00 - 23:00</p>
        <p>Domingo CERRADO</p>
      </div>
    </div>
    
  </div>
</div>

<!-- Image of location/map -->
<img src="img/pizza.jpg" class="w3-image w3-greyscale" style="width:100%;">
<?php


  
  if(!isset($_SESSION['nombre'])){
    ?>
<!-- Registro -->
<div class="w3-container w3-padding-64 w3-blue-grey w3-grayscale-min w3-xlarge">
  <div class="w3-content">
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px" id="myMap">REGÍSTRATE</h1>
    <p class="w3-xxlarge"><strong>Regístrate</strong> para hacer pedidos online y estar al tanto de nuestras últimas novedades</p>
    <?php
    if(isset($_GET['error'])){
  switch($_GET['error']){
    case 1:
    $error="Has dejado campos sin rellenar. Todos los campos son obligatorios";
    break;
  case 2:
  $error="Las contraseñas no coinciden";
  break;
  
    case 4:
   $error="El formato de usuario no es correcto";
      break;
      case 5:
        $error="El formato de nombre no es correcto";
        break;
        case 6:
        $error="El formato de apellidos no es correcto";
          break;
          case 7:
           $error="El formato de contraseña no es correcto";
            break;
    
    case 8:
      $error="Ya existe un usuario con el nombre introducido. Prueba uno diferente";
      break;
      default:
    $error="error desconocido";
  }
  ?>
  <div class="w3-panel w3-red w3-display-container">
        <span onclick="this.parentElement.style.display='none'"class="w3-button w3-large w3-display-topright">&times;</span>
        <h3>Error</h3>
        <p><?=$error?></p>
    </div>

  <?php
}
?>
    <form action="register.php" method="post">
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="nickname (letras sin acento, números de 0 a 9 máximo 10 caracteres)" required="required" pattern="^[a-zA-Z0-9]{0,10}$" name="usuario"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Nombre (máximo 20 caracteres, solo letras y espacio)" required="required" pattern="^[a-zA-Z0-9ÁÉÍÓÚáéíóú ]{1,20}$" maxlength="20"  name="nombre"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Apellidos (máximo 30 caracteres, solo letras y espacio)" required="required" pattern="^[a-zA-Z0-9ÁÉÍÓÚáéíóú ]{1,30}$" maxlength="30"  name="apellidos"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="password" required="required" placeholder="Contraseña (mínimo 5 caracteres, máximo 10 caracteres. Letras sin acentuar y números 0-9)" maxlength="10" minlength="5" pattern="^[a-zA-Z0-9]{5,10}$"  name="pass1"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="password" required="required" placeholder="Repita su contraseña"  name="pass2"></p>
      <p><button class="w3-button w3-light-grey w3-block" type="submit">registrarse</button></p>
    </form>
  </div>
</div>
<?php
  }
  ?>
<!-- Footer -->
<footer class="w3-center w3-black w3-padding-48 w3-xxlarge">
<p>Powered by <a href="https://github.com/RafaM88" title="W3.CSS" target="_blank" class="w3-hover-text-green">Rafa Montes</a></p>
</footer>

<script>
// Tabbed Menu
function openMenu(evt, menuName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("menu");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
     tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(menuName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-red";
}
document.getElementById("myLink").click();
</script>

</body>
</html>
