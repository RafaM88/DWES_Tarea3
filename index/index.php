<?php
    require_once("../lib/functions.php");
    cabecera("index","DWES::Tarea 3");
?>


<!-- Icon Bar (Sidebar - hidden on small screens) -->
<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
  <!-- Avatar image in top left corner -->
  <img src="img/icon.png" style="width:100%">
  <a href="../http/index.php" target="_blank" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-key w3-xxlarge"></i>
    <p>EJERCICIO 1 - Autenticación HTTP</p>
  </a>
  <a href="../cesta/index.php" target="_blank" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-shopping-basket w3-xxlarge"></i>
    <p>EJERCICIO 2 - Cesta de la compra con cookies</p>
  </a>
  <a href="../composer/index.php" target="_blank" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-file-code-o w3-xxlarge"></i>
    <p>EJERCICIO 3 - Composer y JSON</p>
  </a>

  <a href="../balance/index.php" target="_blank" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-money w3-xxlarge"></i>
    <p>EJERCICIO 4 - Balance de cuentas</p>
  </a>

  <a href="../pizza/index.php" target="_blank" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fas fa-pizza-slice w3-xxlarge"></i>
    <p>EJERCICIO 5 A- Pizzería Online</p>
  </a>


</nav>

<!-- Navbar on small screens (Hidden on medium and large screens) -->
<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
  <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
    <a href="../http/index.php" target="_blank" class="w3-bar-item w3-button" style="width:16.6% !important"><i class="fa fa-key w3-xxlarge"></i></a>
    <a href="../cesta/index.php"  target="_blank" class="w3-bar-item w3-button" style="width:16.6% !important"><i class="fa fa-shopping-basket w3-xxlarge"></i></a>
    <a href="../composer/index.php" target="_blank" class="w3-bar-item w3-button" style="width:16.6% !important"><i class="fa fa-file-code-o w3-xxlarge"></i></a>
    <a href="../balance/index.php" target="_blank" class="w3-bar-item w3-button" style="width:16.6% !important"><i class="fa fa-money w3-xxlarge"></i></a>
    <a href="../pizza/index.php" target="_blank" class="w3-bar-item w3-button" style="width:16.6% !important"><i class="fas fa-pizza-slice w3-xxlarge"></i></a>
  
  </div>
</div>

<!-- Page Content -->
<div class="w3-padding-large" id="main">
  <!-- Header/Home -->
  <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
    <h1 class="w3-jumbo">DWES a distancia</h1>
    <p>Tarea 3</p>
  </header>

  <!-- About Section -->
  <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
    <h2 class="w3-text-light-grey">Rafael Emilio Montes Jiménez</h2>
    <hr style="width:200px" class="w3-opacity">
    <p>Bienvenid@ a la tarea 3 del módulo profesional Desarrollo Web en Entorno Servidor.</p>

    <p>En esta unidad, vamos a tratar los siguientes puntos</p>
    <ul>
      <li><b>Funciones hash</b> para encriptación de contraseñas</li>
      <li><b>Gestión de dependencias</b> con <b>Composer</b></li>
      <li><b>Cookies</b> para almacenar datos en el navegador del cliente y mejorar su experiencia en nuestro sitio</li>
      <li><b>Otros puntos vistos anteriormente</b> como sesiones, conexión a base de datos o algoritmia, todo con lenguaje <b>PHP</b>
    </ul>
    <p>Para los estilos, me ayudo del framework <b>W3C.CSS</b>, desarrollado y mantenido por el consorcio W3C</p>
    <p>Todos estos aspectos se ven reflejados en las actividades realizadas, a las que se pueden acceder desde el menú lateral situado
      a la izquierda de la página si ves el sitio desde versión escritorio, o arriba si estás en dispositivo móvil</p>
<?php
  footer("index");
 ?>
