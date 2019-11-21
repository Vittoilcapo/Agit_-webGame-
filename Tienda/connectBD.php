<?php
function conectar($sql){
$conexion = mysqli_connect("localhost:3306","root","juanmanuel2000") or die ("Problema con la conexion");
mysqli_select_db($conexion,"juego");

$resultado = mysqli_query($conexion,$sql) or die (mysqli_error($conexion));

return $resultado;
}
 ?>
