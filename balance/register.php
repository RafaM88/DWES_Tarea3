<?php
     require_once("db.php");
    session_start();
   
    

    $nombre=$_POST['nombre'];
    $clave1=$_POST['pass1'];
    $clave2=$_POST['pass2'];
    
    if(empty($nombre)){
        echo "vacio";
        header("Location:index.php?error=3&campo=nombre");
    }

    if(empty($clave1)){
        header("Location:index.php?error=3&campo=clave1");
    }

   //
/*
    $query=$dbh->prepare("select * from usuarios where usuario = ?");
    $query->bindParam(1,$nombre);
    $result1=$query->execute();

    if($query->rowCount()==1){
        header("Location:index.php?error=1");
    
    }
    $hash=password_hash($clave1,PASSWORD_BCRYPT);
    $query2=$dbh->prepare("insert into usuarios (usuario,clave) values (?,?);");
    $query2->bindParam(1,$nombre);
    $query2->bindParam(2,$hash);
    $result2=$query2->execute();
        
       
if($result2){
    $_SESSION['nombre']=$nombre;
    header("Location:index.php?success=1");
}
    */

    
    

?>