<?php
session_start();

if ( isset( $_GET['boxeadorcomprar'] )){
$comprar = 1;
echo $comprar;
exit;
}elseif (isset( $_GET['caballerocomprar'])) {
$comprar = 2;
echo $comprar;
}elseif (isset( $_GET['raccooncomprar'])) {
$comprar = 3;
echo $comprar;
}
  ?>
