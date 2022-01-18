<?php

    setcookie("fruta",$_COOKIE['fruta'],time()-60*60);

  header("Location:index.php");
 ?>
