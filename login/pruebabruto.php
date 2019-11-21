<?php
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
    //  header('Location: menu.html');
//}else{
  //    echo "Error: " . "<br>" . "Error al registrarte";
//}

include_once("../Tienda/connectBD.php");
//$sql="update `juego`.`usuario` SET `macaco_id` = '$comprar' WHERE (`usuario_mail` = '$mail');";

$sql="update `juego`.`usuario` SET `macaco_id` = '$comprar' WHERE (`usuario_mail` = '$mail');";
$resultado= conectar($sql);
if ($resultado) {
      echo "Compra realizada con exito";
      //$sql="update `juego`.`usuario` SET `macaco_id` = '$comprar' WHERE (`usuario_mail` = '$mail');";
      $sql="insert into `juego`.`estadisticas` (`usuario_mail`, `estadisticas_velocidad`, `estadisticas_fuerza`, `estadisticas_agilidad`) VALUES ('$mail', '$velocidad', '$fuerza', '$agilidad');";
      $resultado= conectar($sql);
      header("Location:\juego-07-11\Menu\menu.html");

}


  ?>
