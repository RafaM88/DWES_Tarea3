<?php
require __DIR__ . '/vendor/autoload.php';
//require_once("../lib/functions.php");

$mpdf = new \Mpdf\Mpdf();
require_once("../lib/functions.php");

ob_start();
?>
     <!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' lang='es'>
  <head>
    <meta charset='utf-8' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
   
    <!-- Enlaces a fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost&family=Mochiy+Pop+P+One&family=Patrick+Hand&family=DM+Serif+Display&display=swap" rel="stylesheet">

  <!-- Enlace a font-awesome para iconos -->
    <script src="https://kit.fontawesome.com/ad0403babd.js" crossorigin="anonymous"></script>
<body style="background-color:red;">
<h1 style="color:blue; font-family:'Times New Roman';">Hola, mundo</h1>
<i class="fa fa-shopping-basket w3-xxlarge"></i>
</body>
</html>
<?php
$html=ob_get_contents();

ob_clean();


$mpdf->WriteHTML($html);
$mpdf->Output();
?>