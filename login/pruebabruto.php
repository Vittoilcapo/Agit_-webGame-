<?php
session_start();
$mail = $_SESSION['mailIn'];


if ( isset( $_GET['boxeadorcomprar'] )){
$comprar = 1;

}elseif (isset( $_GET['caballerocomprar'])) {
$comprar = 2;

}elseif (isset( $_GET['raccooncomprar'])) {
$comprar = 3;

}
$conexion=mysqli_connect("localhost","root","root")or
die ("Problema con la conexion");
mysqli_select_db($conexion,"juego");
$sql="update `juego`.`usuario` SET `macaco_id` = '$comprar' WHERE (`usuario_mail` = '$mail');";

if (mysqli_query($conexion, $sql)) {
      echo "Registrado correctamente";
      header('Location: menu.html');
}else{
      echo "Error: " . "<br>" . "Error al registrarte";
}
  ?>
