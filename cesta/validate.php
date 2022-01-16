<?php


/*En esta página, recogemos los artículos añadidos a la cesta
y creamos una cookie por cada artículo con duración de media hora*/


if(!isset($_POST['frutas'])){
  header("Location:index.php");
}
//Asignamos los datos recogidos en el formulario a un array $frutas[]
for($i=0;$i<count($_POST['frutas']);$i++){

  $frutas[$i]=$_POST['frutas'][$i];

}

//Eliminamos las cookies anteriores antes de asignar unas nuevas tras modificar el contenido de la cesta

foreach($_COOKIE['frutas'] as $index => $value){

  setcookie("frutas[".$index."]",$frutas[$value],time()-60*30,"/cesta");
}
//Creamos las cookies y mostramos al usuario lo que ha añadido a la cesta

foreach($frutas as $index => $value){
  setcookie("frutas[".$index."]",$value,time()+60*30,"/cesta");
}

header("Location:index.php");
?>
