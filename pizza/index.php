<?php

  session_start();
  //$_SESSION['nombre'] = "Rafa";
  require_once("connect_db.php");
?>

<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
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
      <a href="logout.php" class="w3-bar-item w3-button w3-right">Cerrar sesión</a>
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
      <form class="w3-container" method="post" action="login.php">
        <div class="w3-section">
          <label><b>Usuario</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Usuario" name="usuario" required>
          <label><b>Contraseña</b></label>
          <input class="w3-input w3-border" type="password" placeholder="contraseña" name="pass" required>
          <input class="w3-button w3-block w3-green w3-section w3-padding" type="submit" value="Iniciar Sesión">
          <input class="w3-check w3-margin-top" name="remember" type="checkbox" checked="checked"> Recuérdame
          <br>
          <input class="w3-check w3-margin-top" name="soyadmin" type="checkbox"> Soy administrador
        </div>
      </form>

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
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
      <h1><b>Margarita</b> <span class="w3-right w3-tag w3-dark-grey w3-round">8,50 €</span></h1>
      <p class="w3-text-grey">Tomate,mozzarella y orégano</p>
      <hr>
   
      <h1><b>Formaggio</b> <span class="w3-right w3-tag w3-dark-grey w3-round">15,50 €</span></h1>
      <p class="w3-text-grey">Cuatro quesos (mozzarella, parmesano, roquefort, emmental)</p>
      <hr>
      
      <h1><b>Chicken</b> <span class="w3-right w3-tag w3-dark-grey w3-round">$17.00</span></h1>
      <p class="w3-text-grey">Fresh tomatoes, mozzarella, chicken, onions</p>
      <hr>

      <h1><b>Pineapple'o'clock</b> <span class="w3-right w3-tag w3-dark-grey w3-round">$16.50</span></h1>
      <p class="w3-text-grey">Fresh tomatoes, mozzarella, fresh pineapple, bacon, fresh basil</p>
      <hr>

      <h1><b>Meat Town</b> <span class="w3-tag w3-red w3-round">Hot!</span><span class="w3-right w3-tag w3-dark-grey w3-round">$20.00</span></h1>
      <p class="w3-text-grey">Fresh tomatoes, mozzarella, hot pepporoni, hot sausage, beef, chicken</p>
      <hr>

      <h1><b>Parma</b> <span class="w3-tag w3-grey w3-round">New</span><span class="w3-right w3-tag w3-dark-grey w3-round">$21.50</span></h1>
      <p class="w3-text-grey">Fresh tomatoes, mozzarella, parma, bacon, fresh arugula</p>
    </div>

    <div id="Pasta" class="w3-container menu w3-padding-32 w3-white">
      <h1><b>Lasagna</b> <span class="w3-tag w3-grey w3-round">Popular</span> <span class="w3-right w3-tag w3-dark-grey w3-round">$13.50</span></h1>
      <p class="w3-text-grey">Special sauce, mozzarella, parmesan, ground beef</p>
      <hr>
   
      <h1><b>Ravioli</b> <span class="w3-right w3-tag w3-dark-grey w3-round">$14.50</span></h1>
      <p class="w3-text-grey">Ravioli filled with cheese</p>
      <hr>
      
      <h1><b>Spaghetti Classica</b> <span class="w3-right w3-tag w3-dark-grey w3-round">$11.00</span></h1>
      <p class="w3-text-grey">Fresh tomatoes, onions, ground beef</p>
      <hr>

      <h1><b>Seafood pasta</b> <span class="w3-right w3-tag w3-dark-grey w3-round">$25.50</span></h1>
      <p class="w3-text-grey">Salmon, shrimp, lobster, garlic</p>
    </div>


    <div id="Starter" class="w3-container menu w3-padding-32 w3-white">
      <h1><b>Today's Soup</b> <span class="w3-tag w3-grey w3-round">Seasonal</span><span class="w3-right w3-tag w3-dark-grey w3-round">$5.50</span></h1>
      <p class="w3-text-grey">Ask the waiter</p>
      <hr>
   
      <h1><b>Bruschetta</b> <span class="w3-right w3-tag w3-dark-grey w3-round">$8.50</span></h1>
      <p class="w3-text-grey">Bread with pesto, tomatoes, onion, garlic</p>
      <hr>
      
      <h1><b>Garlic bread</b> <span class="w3-right w3-tag w3-dark-grey w3-round">$9.50</span></h1>
      <p class="w3-text-grey">Grilled ciabatta, garlic butter, onions</p>
      <hr>
      
      <h1><b>Tomozzarella</b> <span class="w3-right w3-tag w3-dark-grey w3-round">$10.50</span></h1>
      <p class="w3-text-grey">Tomatoes and mozzarella</p>
    </div><br>

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

<!-- Contact -->
<div class="w3-container w3-padding-64 w3-blue-grey w3-grayscale-min w3-xlarge">
  <div class="w3-content">
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px" id="myMap">REGÍSTRATE</h1>
    <p><span class="w3-tag">FYI!</span> We offer full-service catering for any event, large or small. We understand your needs and we will cater the food to satisfy the biggerst criteria of them all, both look and taste.</p>
    <p class="w3-xxlarge"><strong>Regístrate</strong> para hacer pedidos online y estar al tanto de nuestras últimas novedades</p>
    <form action="register.php" method="post">
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Nombre de usuario (nickname)" required="required" name="usuario"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Nombre" required="required>" name="nombre"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Nombre" required="required>" name="apellidos"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="passwd" placeholder="Contraseña (mínimo 5 caracteres, letras a-z, A-z, números 0-9)" required="required>" name="pass1"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="passwd" placeholder="Repita su contraseña" required="required" name="pass2"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="tel" placeholder="Teléfono (sólo números de España)" pattern="^[6789]{1}[0-9]{8}$" required name="telefono"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="email" placeholder="correo electrónico" required name="correo"></p>
      <p><button class="w3-button w3-light-grey w3-block" type="submit">registrarse</button></p>
    </form>
  </div>
</div>

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-48 w3-xxlarge">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
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
