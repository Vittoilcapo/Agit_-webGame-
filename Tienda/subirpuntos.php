<?php
include_once("connectBD.php");
include_once('usuario.php');
session_start();

$usuario_id = $_SESSION['ClaseUsuario']->usuario_id;
$usuario_nombre = $_SESSION['ClaseUsuario']->usuario_nombre;
$fuerza= $_SESSION['ClaseUsuario']->fuerza;
$agilidad= $_SESSION['ClaseUsuario']->agilidad;
$velocidad= $_SESSION['ClaseUsuario']->velocidad;

$sql="select puntoDisponibles from estadisticas where usuario_id=$usuario_id;";
$resultado=conectar($sql);

while ($mostrar=mysqli_fetch_array($resultado)){
  $disponiblesActual=$mostrar[0];

echo "Total puntos para gastar: ";
echo $disponiblesActual;
echo "<br>";
echo "<br>";
}
?>

<link rel="stylesheet" href="estilo_Inventario.css">
<table class="grid-itemEstadisticas">
<tr>
  <td>Velocidad</td>
  <td>fuerza</td>
  <td>Agilidad</td>

</tr>

<?php
echo "<tr>";
  echo "<td>"; echo $velocidad; echo "</td>";
  echo "<td>"; echo $fuerza; echo "</td>";
  echo "<td>"; echo $agilidad; echo "</td>";
echo "</tr>";
 ?>
<form method="post" action="validarsubirpuntos.php">
<br>
Fuerza
<input type="text" name="ingresa_fuerza">
<br>
Velocidad
<input type="text" name="ingresa_velocidad">
<br>
Agilidad
<input type="text" name="ingresa_agilidad">
<input type="submit" value="ingresar">

</form>
