<?php
require_once ("connect_db.php");

?>
<!DOCTYPE html>
<html>
<title>Pizza Donatello</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
<style>
body, html {height: 100%}
body,h1,h2,h3,h4,h5,h6 {font-family: "Amatic SC", sans-serif}
.menu {display: none}
.bgimg {
  background-repeat: no-repeat;
  background-size: cover;
  background-image: url("img/pizza2.jpg");
  min-height: 90%;
  
}

</style>
<body>
Hola mundo<br>
<?php
    $query=$dbh->prepare("select nombre, ingredientes, precio from pizzas;");
    $result=$query->execute();
    $result=$query->fetchAll(PDO::FETCH_ASSOC);

    foreach($result as $row){
        echo $row['nombre']." - ". $row['precio']."<br>";
      $query2=$dbh->prepare("select unnest(ingredientes) as ingredientes from pizzas where nombre=?;");
      $query2->bindParam(1,$row['nombre']);
          $result2=$query2->execute();
          $result2=$query2->fetchAll(PDO::FETCH_ASSOC);
          
          foreach($result2 as $ingredientes){
            echo $ingredientes['ingredientes'].", ";
          }
      }

           
          
          echo "<br>";
       
      
    
?>
</body>
</html>