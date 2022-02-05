<?php
require_once("db.php");
session_start();

$nombre = $_POST['usuario'];
$clave = $_POST['clave'];

if(empty($nombre) || empty($clave)){
    header("Location:index.php?error=3");
}


$query=$dbh->prepare("select * from usuarios where usuario = ?;");
$query->bindParam(1,$nombre);
$result=$query->execute();
$result=$query->fetchAll(PDO::FETCH_ASSOC);

if($query->rowCount()==0){
    die(header("Location:index.php?error=4"));
}
foreach($result as $row){
$hash=$row['clave'];

}

if(password_verify($clave,$hash)){
    $_SESSION['nombre']=$nombre;
    die(header("Location:index.php"));
}else{
   die(header("Location:index.php?error=5"));
}
?>