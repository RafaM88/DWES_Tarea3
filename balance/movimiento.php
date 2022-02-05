<?php
    session_start();
    require_once("db.php");
    if(!isset($_SESSION['nombre'])){
        die(header("Location:index.php"));
    }

   $fecha=$_POST['fecha'];

   $tipo=$_POST['tipo'];
    $concepto=$_POST['concepto'];
    $importe=$_POST['importe'];
    $usuario=$_SESSION['nombre'];

    if(empty($fecha)){
        die(header("Location:index.php?error=2"));

    }
if(empty($tipo)){
    die(header("Location:index.php?error=2"));
}

if(($tipo!="gasto") && ($tipo!="ingreso")){
    die(header("Location:index.php?error=6"));
}

if(empty($importe)){
    die(header("Location:index.php?error=2"));
}

if(!is_numeric($importe)){
    die(header("Location:index.php?error=7"));
}

$query=$dbh->prepare("insert into operaciones (fecha,importe,usuario,operacion,concepto) values (?,?,?,?,?);");
$query->bindParam(1,$fecha);
$query->bindParam(2,$importe);
$query->bindParam(3,$_SESSION['nombre']);
$query->bindParam(4,$tipo);
$query->bindParam(5,$concepto);

$query->execute();

header("Location:resumen.php");
?>