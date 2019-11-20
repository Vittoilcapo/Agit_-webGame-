<?php
require_once 'inventarioUsuario.php';
require_once('usuario.php');

$usuario2 = new usuario;
$id_inventario = $usuario2->inventario_id;


$inventario = new InventarioArmas;
$inventario-> obtenerInventario($id_inventario);


 ?>
