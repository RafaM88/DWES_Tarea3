<?php
session_start();
    $_SESSION['nombre']=$_POST['usuario'];
    if(isset($_POST['remember'])){
        setcookie("usuario",$_SESSION['nombre'],time()+60*30);
        }
        
    
    header("Location:index.php");
?>