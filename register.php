<?php
session_start();
require_once("connect_db.php");
if(isset($_SESSION['nombre'])){
    die(header("Location:index.php"));
}
if(empty($_POST['usuario'])){
    die(header("Location:index.php?error=1#myMap"));
}

if(empty($_POST['nombre'])){
    die(header("Location:index.php?error=1#myMap"));
}
if(empty($_POST['apellidos'])){
    die(header("Location:index.php?error=1#myMap")); 
}

if(empty($_POST['pass1'])){
    die(header("Location:index.php?error=1#myMap"));
}
if(empty($_POST['pass2'])){
    die(header("Location:index.php?error=1#myMap"));
}

if($_POST['pass1']!=$_POST['pass2']){
    die(header("Location:index.php?error=2#myMap"));
}
$usuario=$_POST['usuario'];
$nombre=$_POST['nombre'];
$apellidos=$_POST['apellidos'];
$clave=$_POST['pass1'];

$query1=$dbh->prepare("select * from usuarios where usuario = ?;");
$query1->bindParam(1,$usuario);
$result=$query1->execute();
if($query1->rowCount()!=0){
    die(header("Location:index.php?error=8#myMap"));
}

$plantilla_nombre="/^[a-zA-Z0-9ÁÉÍÓÚáéíóú ]{1,20}$/";
$plantilla_usuario="/^[a-zA-Z0-9]{0,10}$/";
$plantilla_apellidos="/^[a-zA-Z0-9ÁÉÍÓÚáéíóú ]{1,30}$/";
$plantilla_clave="/^[a-zA-Z0-9]{5,10}$/";

if(!preg_match_all($plantilla_usuario,$usuario)){
    die(header("Location:index.php?error=4#myMap"));
}
if(!preg_match_all($plantilla_nombre,$nombre)){
    die(header("Location:index.php?error=5#myMap"));
}

if(!preg_match_all($plantilla_apellidos,$apellidos)){
    die(header("Location:index.php?error=6#myMap"));
}

if(!preg_match_all($plantilla_clave,$clave)){
    die(header("Location:index.php?error=7#myMap"));
}

$hash=password_hash($clave,PASSWORD_BCRYPT);

$query=$dbh->prepare("insert into usuarios (usuario,nombre,apellidos,clave) values (?,?,?,?);");
$query->bindParam(1,$usuario);
$query->bindParam(2,$nombre);
$query->bindParam(3,$apellidos);
$query->bindParam(4,$hash);
$query->execute();

$_SESSION['nombre']=$nombre;
header("Location:index.php");
?>