<?php
session_start();
require_once("connect_db.php");
//usuario,pass
if(isset($_SESSION['nombre'])){
    die(header("Location:index.php"));
}

if(empty($_POST['usuario']) || empty($_POST['pass'])){
    die(header("Location:index.php?errorLog=1#id01"));
}
$usuario=$_POST['usuario'];
$clave=$_POST['pass'];
$query=$dbh->prepare("select * from usuarios where usuario = ?;");
$query->bindParam(1,$usuario);
$result=$query->execute();
$result=$query->fetchAll(PDO::FETCH_ASSOC);

if($query->rowCount()==0){
    die(header("Location:index.php?errorLog=2#id01"));
}

foreach($result as $row){
    if(!password_verify($clave,$row['clave'])){
        die(header("Location:index.php?errorLog=2#id01"));
        }
    }


    $_SESSION['nombre']=$usuario;
    if(isset($_POST['remember'])){
        setcookie("usuario",$_SESSION['nombre'],time()+60*60*24*365);
        }
        
    
    header("Location:index.php");
       
        
        ?>