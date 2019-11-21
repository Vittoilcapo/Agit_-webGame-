<?php
function conectar($sql){
<<<<<<< HEAD
$conexion = mysqli_connect("localhost:3306","root","juanmanuel2000") or die ("Problema con la conexion");
=======
$conexion = mysqli_connect("localhost:3306","root","root") or die ("Problema con la conexion");
>>>>>>> 1b97b6db62be8f9fb214219089162034440729ff
mysqli_select_db($conexion,"juego");

$resultado = mysqli_query($conexion,$sql) or die (mysqli_error($conexion));

return $resultado;
}
 ?>
