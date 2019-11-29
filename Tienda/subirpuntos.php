<?php
include_once("connectBD.php");
include_once('usuario.php');
session_start();


$usuario_nombre = $_SESSION['ClaseUsuario']->usuario_nombre;
$fuerza= $_SESSION['ClaseUsuario']->fuerza;
$agilidad= $_SESSION['ClaseUsuario']->agilidad;
$velocidad= $_SESSION['ClaseUsuario']->velocidad;

$total= $fuerza + $agilidad + $velocidad;
echo $total;
?>

<link rel="stylesheet" href="estilo_Inventario.css">
<table class="grid-itemEstadisticas">
<tr>
  <td>Velocidad</td>
  <td>Fuerza</td>
  <td>Agilidad</td>

</tr>
<?php
echo "<tr>";
  echo "<td>"; echo $fuerza; echo "</td>";
  echo "<td>"; echo $agilidad; echo "</td>";
  echo "<td>"; echo $velocidad; echo "</td>";
echo "</tr>";
 ?>
<form method="post" action="subirpuntos.php">
<input type="text" name="ingresa_fuerza">
<input type="text" name="ingresa_velocidad">
<input type="text" name="ingresa_agilidad">
<input type="submit" value="ingresar">

</form>
