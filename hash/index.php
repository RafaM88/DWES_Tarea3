<?php
$passwd = "admin_hash";
$hash = password_hash($passwd,PASSWORD_BCRYPT);


if (!isset($_SERVER['PHP_AUTH_USER']) || $_SERVER['PHP_AUTH_USER']!="admin_hash" || !(password_verify($_SERVER['PHP_AUTH_PW'],$hash))){
    header('WWW-Authenticate: Basic realm="Mi dominio"');
    header('HTTP/1.0 401 Unauthorized');
    ?><img src="img/401.jpg" style="width:100%;">
    <?php
    exit;
}
    require_once("../lib/functions.php");
    cabecera("hash","DWES Tarea 3:: Funciones Hash");
?>
     <h1>Funciones Hash</h1>
     <h3>¿Qué es una función <b>hash</b>?</h3>
     <p>Por definición, una <em>función hash</em> es aquella que, matemáticamente, no tiene función inversa, y existe una sola salida para varias entradas.
     
</p>
<p>En PHP, para codificar información, existen varios algoritemos de encriptación, como <em>Blowfish</em> por mencionar alguno. Una de las peculiaridades de los algoritmos de encriptación
que nos ofrece el algoritmo Blowfish, es que el resultado tiene una longitud constante de 60 caracteres, empezando siempre por la cadena <em>$2y$</em> seguido del resto de caracteres que la componen.</p>

<p>Algunos ejemplos:<br><br>
<b>Gato</b><br>
<?php
$a=password_hash("Gato",PASSWORD_BCRYPT); 
echo $a. " y tiene una longitud de ". strlen($a) . " caracteres." 
?>

<br><br>

<b>Los gatos saltan</b><br>
<?php
$a=password_hash("Los gatos saltan",PASSWORD_BCRYPT); 
echo $a. " y tiene una longitud de ". strlen($a) . " caracteres." 
?>
</p>
<h3>¿Por qué es tan importante en seguridad informática?</h3>

<p>
    Es importante en seguridad informática porque sirve para añadir una capa de seguridad a datos sensibles, ya que si almacenamos estos datos en un SGBD, y los encriptamos antes de 
    almacenarlos, ni siquiera el administrador de la base de datos podría saber los datos introducidos originariamente.<br>
    Esta información no se decodifica (ya hemos dicho que no se puede), sino que se vuelve a codificar la entrada y se compara con los datos almacenados ya de manera codificada. Esto se consigue
    haciendo uso de funciones como <em>password_hash</em>(para encriptar) y <em>password_verify</em>(para comparar la entrada con un valor encriptado).
</p>

<img src="img/function.jpg" alt="función-hash"/>

<h3>¿Cuál sería la autenticación HTTP más segura de todas?</h3>  

<p>Podemos decir, por tanto, que la autenticación más segura, es aquella que hace uso de funciones hash para gestionar contraseñas, mediante algún algoritmo de encriptación
    de 256 bits como Blowfish, y si es posible, añadiendo una capa de seguridad SSL.
</p>

</body>
</html>