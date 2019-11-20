<?php
require 'inventarioUsuario.php';
require 'usuario.php';

$user = new usuario;
$id_inventario = $user->inventario_id;


$inventario = new InventarioArmas;
$inventario-> obtenerInventario($id_inventario);


 ?>
