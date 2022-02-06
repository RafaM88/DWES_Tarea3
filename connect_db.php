<?php
    $user ="ypsypomijbyelc";
    $pass="f70f6c01a583e3f93ffde04bb643b1c09d76f8696a517413f1c9fff4fcea3ad5";
    $host="ec2-176-34-105-15.eu-west-1.compute.amazonaws.com";
   
    $db="do605oa5iqcpt";
    try{
        $dbh = new PDO('pgsql:host=' . $host . ';dbname=' . $db, $user, $pass);
    }catch(PDOException $e){
    ?>

    <div class="w3-panel w3-red w3-display-container">
        <span onclick="this.parentElement.style.display='none'"class="w3-button w3-large w3-display-topright">&times;</span>
        <h3>Error</h3>
        <p>No se pudo conectar con base de datos</p>
    </div>

    <?php
    }
 ?>

    
    
    
