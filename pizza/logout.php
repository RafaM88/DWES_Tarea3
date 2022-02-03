<?php
    session_start();
    
    setcookie("usuario",$_SESSION['nombre'],time()-60*30);
    
    session_destroy();
    $_SESSION = array();
    header("Location:index.php");
?>