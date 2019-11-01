<?php
function conectar($sql){
$conexion = mysqli_connect("localhost:3306","root","root") or die ("Problema con la conexion");
mysqli_select_db($conexion,"juego");

$resultado = mysqli_query($conexion,$sql) or die ("problema en el select".mysqli_error($conexion));

return $resultado;
}
 ?>
