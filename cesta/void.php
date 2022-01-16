<?php
  foreach($_COOKIE['frutas'] as $index => $value){
    setcookie("frutas[".$index."]",$value,time()-60*5);
  }
  header("Location:index.php");
 ?>
