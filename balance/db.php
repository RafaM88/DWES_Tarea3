<?php
$username="ckakxqglmylwvz";
$password="1288c8817b3460f1ef28e14201a27490bdb07da6a9a01cedc9420a22d809cd5f";
$host="ec2-54-216-159-235.eu-west-1.compute.amazonaws.com";
$dbname="d1hhkma9j2jr21";

$dbh = new PDO('pgsql:host=' . $host . ';dbname=' . $dbname, $username, $password);
 ?>
