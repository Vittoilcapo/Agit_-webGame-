<?php
include_once('../Tienda/usuario.php');
session_start();
$mail = $_SESSION['mailIn'];
$fuerza = rand(1, 5);
$velocidad = rand(1, 5);
$agilidad = rand(1, 5);

if ( isset( $_GET['boxeadorcomprar'] )){
$comprar = 1;

}elseif (isset( $_GET['caballerocomprar'])) {
$comprar = 2;

}elseif (isset( $_GET['raccooncomprar'])) {
$comprar = 3;

}


//$conexion=mysqli_connect("localhost","root","root")or
//die ("Problema con la conexion");
//mysqli_select_db($conexion,"juego");

//if (mysqli_query($conexion, $sql)) {
  //    echo "Registrado correctamente";
    //  header('Location: menu.php');
//}else{
  //    echo "Error: " . "<br>" . "Error al registrarte";
//}

include_once("../Tienda/connectBD.php");
//$sql="update `juego`.`usuario` SET `macaco_id` = '$comprar' WHERE (`usuario_mail` = '$mail');";

$sql="update `juego`.`usuario` SET `macaco_id` = '$comprar' WHERE (`usuario_mail` = '$mail');";
$resultado= conectar($sql);
$id_usuario = $_SESSION['id_usuario'];
if ($resultado) {
      echo "Compra realizada con exito";
      //$sql="update `juego`.`usuario` SET `macaco_id` = '$comprar' WHERE (`usuario_mail` = '$mail');";
      $sql="insert into `juego`.`estadisticas` (`usuario_mail`,`usuario_id`, `estadisticas_velocidad`, `estadisticas_fuerza`, `estadisticas_agilidad`) VALUES ('$mail','$id_usuario', '$velocidad', '$fuerza', '$agilidad');";
      $resultado= conectar($sql);
      $sql="insert into `juego`.`inventario_skin` (`inventario_id`, `inventario_skin_foto`) VALUES ('$id_usuario','../Tienda/img/enanoboca.png');";
      $resultado= conectar($sql);
      echo "<script language=JavaScript> alert('Registrado con exito'); window.location.href = 'entradaPrincipal.php';</script>";

}


  ?>
