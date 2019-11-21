<?php
session_start();
require 'inventarioUsuario.php';
require('usuario.php');

$usuario = new usuario;
$usuario->setUsuario($_SESSION['usuario_id']);
$id_inventario = $usuario->inventario_id;



$inventario = new InventarioArmas;
$inventario-> obtenerInventario($id_inventario);


 ?>
