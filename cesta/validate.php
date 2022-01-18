<?php


//Eliminamos las cookies anteriores antes de asignar unas nuevas tras modificar el contenido de la cesta
if(isset($_COOKIE['fruta'])){
  setcookie("fruta",$_COOKIE['fruta'],time()-60*60);
}

if(!isset($_POST['frutas'])){
  header("Location:index.php");
}

//Asignamos los datos recogidos en el formulario a un array $frutas[]
for($i=0;$i<count($_POST['frutas']);$i++){

  $frutas[$i]=$_POST['frutas'][$i];

}




/*Creamos una sola cookie con un array que contiene todos los artículos.
Para ello, hacemos uso de la función json_encode*/


$obj=json_encode($frutas);
setcookie("fruta",$obj,time()+60*60);

header("Location:index.php");

?>
