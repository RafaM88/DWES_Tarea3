<?php
require_once("../lib/functions.php");

//Indicamos, basándonos en las cookies, los artículos que hay en la cesta


//Array con frutas y verduras

  $frutas=array("Papaya","Coco","Arándano","Lima","Pera","Manzana","Fresa","Plátano","Melocotón","Kiwi","Sandía",
  "Melón","Cereza","Piña","Lechuga","Tomate","Cebolla","Pimiento",
  "Berenjena","Calabacín","Coliflor","Pepino","Calabaza","Perejil","Mandarina",
  "Mango","Apio","Puerro","Espárragos","Naranja","Frambuesa","Mora");

  //Los ordenamos alfabéticamente por valor
  sort($frutas);


  //Llamada a la cabecera de la página
  cabecera("cesta","Cesta de la compra::Inicio");

  //Recuento de elementos en la cesta
if(isset($_COOKIE['frutas'])){
    ?>
    <p>Has añadido los siguientes productos a la cesta:</p>
    <ul>
      <?php
      foreach($_COOKIE['frutas'] as $index => $value){
        ?><li><?=$value;?></li>
        <?php
      }
      ?>
    </ul>
<?php
}else{
  ?><p>Tu cesta aún está vacía. Selecciona los productos que desees y pulsa en <em>Añadir a la cesta</em></p>
  <?php
}
 ?>
 <div id="header_form" class="w3-container w3-green">
  <h3>Productos disponibles</h3>
</div>
  <form method="post" name="formulario_frutas" action="validate.php">

<?php

  //Creamos el formulario con entradas checkbox
  for($i=0;$i<count($frutas);$i++){
   ?>
   <div class="fruit">
   <input class="w3-check" type="checkbox" name="frutas[]" value="<?=($frutas[$i]);?>"

   <?php
   //Si tenemos una fruta almacenada en cookie, la seleccionamos

   foreach($_COOKIE['frutas'] as $index => $value){
     if($value==$frutas[$i]){
       echo " checked=\"checked\"";
     }
   }
   echo "><label>  ".$frutas[$i]."</label></div>";
}

    ?>
    <br>
     <input type="Submit" class="w3-button w3-green" value="Añadir a cesta">
   </form>
  
<?php
   footer("cesta");
?>
