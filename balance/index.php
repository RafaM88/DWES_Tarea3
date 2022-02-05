<?php
session_start();
//$_SESSION['nombre']="pepito";
  require_once("db.php");
  require_once("../lib/functions.php");
  cabecera("balance","Contabilidad::Inicio");
  $error="";
  
  if(isset($_GET['error'])){
    switch($_GET['error']){
      case 1:
        ?><script>alert("Ya existe un usario con este nombre");</script><?php
        break;
      case 2:
        ?><script>alert("Las contraseñas no coinciden");</script><?php
        break;

        case 3:
          ?><script>alert("Formulario incompleto. Todos los campos son obligatorios");</script><?php
          break;

          case 4:
            ?><script>alert("El usuario no existe");</script><?php
            break;

            case 5:
              ?><script>alert("Usuario o contraseña incorrecto");</script><?php
              break;

              case 6:
                ?><script>alert("Tipo de movimiento incorrecto");</script><?php
                break;

                case 7:
                  ?><script>alert("Importe introducido incorrecto");</script><?php
                  break;

    }
  }

  if(isset($_GET['success'])){
    ?><script>alert("Gracias por registrarte");</script><?php
  }
  if(!isset($_SESSION['nombre'])){
  ?>
<!--Formulario de registro -->
  <div class="w3-card-4 w3-margin">

<div class="w3-container w3-green">
  <h2>Regístrate</h2>
</div>

<form class="w3-container" name="formulario1" method="post" action="registro.php">

<label>Usuario</label>
<input class="w3-input" type="text" maxlenght="10" name="nombre">

<label>Contraseña</label>
<input class="w3-input" type="password" name="pass1">

<label>Repita contraseña</label>
<input class="w3-input" type="password" name="pass2">

<input class="w3-button w3-red w3-margin-top w3-margin-bottom" type="submit" value="Enviar">

</form>

</div>

<!--Formulario de login-->

<div class="w3-card-4 w3-margin">

<div class="w3-container w3-green">
  <h2>Iniciar sesión</h2>
</div>

<form class="w3-container" method="post" action="login.php">

<label>Usuario</label>
<input class="w3-input" type="text" name="usuario">

<label>Contraseña</label>
<input class="w3-input" type="password" name="clave">

<input class="w3-button w3-light-green w3-margin-top w3-margin-bottom" type="submit" value="Inicar sesión">

</form>

</div>

  <?php
  }

  if(isset($_SESSION['nombre'])){
   ?>
    <div class="w3-card-4 w3-margin">

<div class="w3-container w3-yellow">
  <h2>Introduce un movimiento</h2>
</div>

<form class="w3-container" method="post" action="movimiento.php" target="_blank">

<label>Concepto</label>
<input class="w3-input w3-margin-top w3-margin-bottom" maxlength="20" type="text" name="concepto">

<label>Importe</label>
<input class="w3-input w3-margin-top w3-margin-bottom" type="number" step="any" name="importe">

<label>Fecha</label>
<input class="w3-input w3-margin-top w3-margin-bottom" type="date" name="fecha">

<input class="w3-radio w3-margin-left w3-margin-top" type="radio" name="tipo" value="ingreso" checked>
<label>Ingreso</label>
<input class="w3-radio w3-margin-left w3-margin-top" type="radio" name="tipo" value="gasto">
<label>Gasto</label>
<br>
<input class="w3-button w3-green w3-margin-top w3-margin-bottom w3-block" type="submit" value="Registrar movimiento">

</form>
  </div>
<div class="w3-container">
<form method="post" action="resumen.php" target="_blank">
  <input class="w3-button w3-block w3-margin-top w3-margin-bottom w3-gray" type="submit" value="Ver mis movimientos">

</div>
   <?php
  }
  footer("balance");
 ?>
