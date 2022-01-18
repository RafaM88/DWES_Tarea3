<?php

/**************************************
*        Funciones reutilizables      *
**************************************/

//Función que despliega la cabecera, pasándole como argumento
//el título del head del documento.
  function cabecera($site,$title){
    ?>
    <!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' lang='es'>
  <head>
    <meta charset='utf-8' />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link rel="stylesheet" href="<?=$site?>.css" />
    <!-- Enlaces a fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost&family=Mochiy+Pop+P+One&family=Patrick+Hand&family=DM+Serif+Display&display=swap" rel="stylesheet">

  <!-- Enlace a font-awesome para iconos -->
    <script src="https://kit.fontawesome.com/ad0403babd.js" crossorigin="anonymous"></script>

    <title><?=$title;?></title>

  </head>

    <?php
      require_once("../lib/header_".$site.".php");
  }

//Función que despliega el pie de página del sitio
  function footer($site){
      require_once("../lib/footer_".$site.".php");
    ?>
  </body>
  </html>
    <?php
  }
 ?>
