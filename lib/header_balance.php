<header class="w3-light-green w3-padding-16 w3-display-container">
  <div class="w3-left"><i class="far fa-money-bill-alt w3-jumbo"></i></div>
  <div class="display-center"><h1>Contabilidad financiera</h1></div>
  <?php
  if(isset($_SESSION['nombre'])){
  ?>
    <div class="w3-display-right w3-margin-right">
<a href="logout.php">
        <i class="fas fa-sign-out-alt w3-xlarge">Salir</i>

</a>

    </div>
  <?php
  }
 ?>
</header>
