<?php
session_start();
require_once ("db.php");
$nombre=$_POST['nombre'];
$clave1=$_POST['pass1'];
$clave2=$_POST['pass2'];

if(empty($nombre)){
    die(header("Location:index.php?error=3"));
}else if(empty($clave1)){
    die(header("Location:index.php?error=3"));   
}else if(empty($clave2)){
    die(header("Location:index.php?error=3"));   
}

if($clave1!=$clave2){
    die(header("Location:index.php?error=2"));
}

echo "todo ok";
$query=$dbh->prepare("select * from usuarios where usuario = ?;");
$query->bindParam(1,$nombre);
$result=$query->execute();
if($query->rowCount()>0){
   die(header("Location:index.php?error=1"));
}else{
    echo "no existe aun";
}

$hash=password_hash($clave1,PASSWORD_BCRYPT);
$query2=$dbh->prepare("insert into usuarios (usuario,clave) values (?,?)");
$query2->bindParam(1,$nombre);
$query2->bindParam(2,$hash);
$result2=$query2->execute();
if($result2){


$_SESSION['nombre']=$nombre;
header("Location:index.php?success=1");
}
?>