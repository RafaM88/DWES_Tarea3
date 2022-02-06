<?php
    session_start();
    
    setcookie("usuario",$_SESSION['nombre'],time()-60*60*24*365);
    
    session_destroy();
    $_SESSION = array();
    header("Location:index.php");
?>