<?php
if (!isset($_SERVER['PHP_AUTH_USER']) || $_SERVER['PHP_AUTH_USER']!="admin" || $_SERVER['PHP_AUTH_PW']!="admin"){
    header('WWW-Authenticate: Basic realm="Mi dominio"');
    header('HTTP/1.0 401 Unauthorized');
    ?><img src="img/401.jpg" style="width:100%;">
    <?php
    exit;
} else {
   require_once("../lib/functions.php");
   cabecera("http","DWES Tarea 3::Autenticación HTTP");
   ?>
    <h1>Autenticación HTTP</h1>
    <h3>¿Por qué no es segura la <b>autenticación HTTP</b>?</h3>

    <p>Esta autenticación no es segura porque, a pesar de no enviarse como texto plano, sino que utiliza una encriptación básica (<b>Base 64</b>), es un método de encriptación
      ya algo anticuado, pues eso una codificación de 64 bits, cuando ya hay sistemas de codificación de 256 bits, como los que utilizan algunos servicios como las <b>VPN (Virtual
      Private Network)</b> y algunas entidades como la <b>NSA</b> de los EEUU</p>

    <h3>¿Cómo puede mejorarse?</h3>
    
    <p>Podemos mejorar la autenticación HTTP sustituyéndola por una autenticación<em>hash/digest</em>. Te explico más sobre ella si pulsas en este <a href="../hash/index.php">enlace</a>.
    </p>
   <?php
}
?>
