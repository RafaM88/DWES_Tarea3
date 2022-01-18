<body class="w3-orange">
  <header class="w3-green">
    <div><a href="index.php"><i class="fas fa-carrot w3-jumbo" style="color:orange;"></i></a></div>
<h1>Frutas Pili</h1>
<div id="cesta" class="w3-dropdown-hover w3-right">
    <button class="w3-button w3-green"><span class="w3-badge w3-red w3-xlarge">
      <?php
      //Evaluación de variable $_COOKIE[] para dar un valor al contenido del badge
    if(isset($_COOKIE['fruta'])){
    $obj=json_decode($_COOKIE['fruta']);
    echo count($obj);
    }else{
      echo 0;
    }
    ?>
  </span><i class="fa fa-shopping-basket w3-xxlarge"></i></button>
    <div class="w3-dropdown-content w3-bar-block w3-border">
      <a href="void.php" class="w3-bar-item w3-button">Vaciar</a>
</div>
    </div>
</header>
