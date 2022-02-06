<?php
session_start();
require_once("connect_db.php");
    if(!isset($_SESSION['nombre'])){
        die(header("Location:index.php"));
    }
   

    if(!isset($_POST['option'])){
        die(header("Location:realizarpedido.php"));
    }

    if(!isset($_POST['cantidad']) || !is_numeric($_POST['cantidad'])){
        $cantidad = 1;
    }else{
        $cantidad=floor(abs($_POST['cantidad']));
    }
    $query=$dbh->prepare("select p.nombre as nombre ,p.precio as precio, t.nombre as nombre_tamanio, t.incremento as incremento from pizzas p, tamanio t where t.nombre=? and p.nombre=?;");
    $query->bindParam(1,$_POST['size']);
    $query->bindParam(2,$_POST['option']);
    $result=$query->execute();
    $result=$query->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $row){
    $nombre = $row['nombre'];
    $precio = $row['precio'];
    $size = $row['nombre_tamanio'];
    $incremento=$row['incremento'];
    }
    

    $obj= array();
    $actual=array($nombre,$precio,$size,$cantidad,$incremento);
   
    if(isset($_COOKIE['cesta'])){
        $obj = json_decode($_COOKIE['cesta']);
        setcookie("cesta",$_COOKIE['cesta'],time()-60*60*24);
       
    }
    array_push($obj,$actual);

    setcookie("cesta",json_encode($obj),time()+60*60*24);

    header("Location:realizarpedido.php");

   

  
    
?>