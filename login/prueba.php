<?php
session_start();
$mail = 'pepito@gmail.com';

$fuerza = rand(1, 5);
$velocidad = rand(1, 5);
$agilidad = rand(1, 5);

echo "Fuerza:" .$fuerza;
echo "<br>";
echo "Agilidad:" .$agilidad;
echo "<br>";
echo "Velocidad:" .$velocidad;
echo "<br>";

/*$conexion=mysqli_connect("localhost","root","root")or die ("Problema con la conexion");
mysqli_select_db($conexion,"juego");
$sql="insert into `juego`.`estadisticas` (`usuario_mail`, `estadisticas_velocidad`, `estadisticas_fuerza`, `estadisticas_agilidad`) VALUES ('$mail', '$velocidad', '$fuerza', '$agilidad');";

if (mysqli_query($conexion, $sql)) {
      echo "Registrado correctamente";
      header('Location: menu.html');
}else{
      echo "Error: " . "<br>" . "Error al registrarte";
}
*/
include_once("connectBD.php");
$sql="update `juego`.`usuario` SET `macaco_id` = '$comprar' WHERE (`usuario_mail` = '$mail');";
$resultado= conectar($sql);
 ?>
