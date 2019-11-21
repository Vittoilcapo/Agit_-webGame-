<?php
include_once('usuario.php');
session_start();
require_once 'inventarioUsuario.php';


$class = $_SESSION['ClaseUsuario'];
$id_inventario = $class->inventario_id;



$inventario = new InventarioArmas;
$inventario-> obtenerInventario($id_inventario);


 ?>
