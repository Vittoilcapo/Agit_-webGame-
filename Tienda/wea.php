

<?php
session_start();
include_once('connectBD.php');
$nombre_arma = $_GET['inventarioNombre'];


$id_inventario = $_SESSION['id_inventario'];


    $Sentencia_sql="update inventario_armas set armasDefault=1 where inventario_id =".$id_inventario." and inventario_armas_nombre = '".$nombre_arma."';";
    $Sentencia_sql2="update inventario_armas SET armasDefault=0 WHERE inventario_id =" .$id_inventario. " and armasDefault=1;";
    conectar($Sentencia_sql);
        conectar($Sentencia_sql);
    echo "cambiado con exito";





?>
