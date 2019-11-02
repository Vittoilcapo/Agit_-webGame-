<?php
  include_once("connectBD.php");
  session_start();

  require 'usuario.php';
  $user = new usuario;
  $user-> setUsuario(); //esta funcion luego va a tener que ir cuando se crean los usuarios

  $inventario_id = $user->inventario_id;

  $arma = $_SESSION["nombre_arma"];
  $fuerza = $_SESSION["fuerza"];
  $velocidad = $_SESSION["velocidad"];
  $agilidad = $_SESSION["Agilidad"];


?>
