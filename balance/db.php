<?php
    $username="ixffektnmbrjrh";
    $password="067616931c4cb1a7826aec3f77225ff8853a7c900a6d8fbac2667645c1c09654";
    $host="ec2-34-255-21-191.eu-west-1.compute.amazonaws.com";
    $dbname="dalacud70lhcur";

    try{
        $dbh = new PDO('pgsql:host=' . $host . ';dbname=' . $dbname, $username, $password);
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
