<?php
if(isset($_COOKIE['fruta'])){
  $obj=json_decode($_COOKIE['fruta'],true);
  print_r($obj);
  echo count($obj);
}else{
  echo "empty";
}
 ?>
