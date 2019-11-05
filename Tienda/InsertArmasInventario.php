<?php

  include_once("connectBD.php");
  session_start();
  require 'usuario.php';
  $user = new usuario;
  $user-> setUsuario(); //esta funcion luego va a tener que ir cuando se crean los usuarios

  $inventario_id = $user->inventario_id;
  $dinero = $user->usuario_dinero;

  $arma = $_SESSION["nombre_arma"];
  $fuerza = $_SESSION["fuerza"];
  $velocidad = $_SESSION["velocidad"];
  $agilidad = $_SESSION["Agilidad"];

  $precioArma = $_GET['precio'];

  if ($dinero < $precioArma){
    echo "usted no tiene suficiente dinero para comprar este Item";
  }else{
  $sql="insert inventario_armas values ('".$inventario_id."','".$arma."','".$velocidad."','".$fuerza."','".$agilidad."')";
  $resultado= conectar($sql);
  if ($resultado) {
        echo "Compra realizada con exito";
        $user->usuario_dinero = $dinero - $precioArma;
        $sql="update usuario SET usuario_dinero=".$user->usuario_dinero." WHERE usuario_id='".$user->usuario_id."';";
        $resultado= conectar($sql);

}
}
?>
