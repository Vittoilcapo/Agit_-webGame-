

<?php
session_start();
include_once('connectBD.php');
include_once('inventarioUsuario.php');

//echo $_SESSION['modificado'];

//$nombre_arma = $_GET['inventarioNombre'];

/*
$id_inventario = $_SESSION['id_inventario'];


    $Sentencia_sql="update inventario_armas set armasDefault=1 where inventario_id =".$id_inventario." and inventario_armas_nombre = '".$nombre_arma."';";

    conectar($Sentencia_sql);

//    $Sentencia_sql2="update inventario_armas SET armasDefault=0 WHERE inventario_id =" .$id_inventario. " and armasDefault=1;";
  //      conectar($Sentencia_sql2);
    echo "cambiado con exito";



*/

$consulta=Consultar($_GET['nomArma'],$_GET['id']);

function Consultar($nombre,$id){

  $sql="select i.inventario_id as id,i.inventario_armas_nombre as nombre, i.armasDefault as arma, i.inventario_armas_velocidad, i.inventario_armas_fuerza, i.inventario_armas_agilidad, t.armas_imagen from
  inventario_armas i, armas_tienda t where i.inventario_id =".$id." and i.inventario_armas_nombre='" . $nombre . "';";
$result=conectar($sql);


  $mostrar=mysqli_fetch_assoc($result);

  return [
//$inventario["inventario_armas_nombre"],$inventario["inventario_armas_velocidad"],$inventario["inventario_armas_fuerza"],$inventario["inventario_armas_agilidad"]
$mostrar["nombre"],$mostrar["id"],$mostrar["arma"]
  ];
}

//$modificar="update `juego`.`inventario_armas` SET `armasdefault` =0 WHERE (`inventario_id`=8) and (`inventario_armas_nombre` = 'Hacha');";


  $modificar="update inventario_armas set armasdefault=1 where inventario_armas_nombre='" . $consulta[0] . "' and inventario_id=" . $consulta[1] . ";";
  conectar($modificar);

$modificar2="update inventario_armas set armasdefault=0 where inventario_armas_nombre!='" . $consulta[0] . "' and inventario_id=" . $consulta[1] . ";";
conectar($modificar2);
//include_once 'inventarioUsuario.php';
//include_once ("inventarioUsuario.php");
//include_once 'inventarioUsuario.php';
//$_SESSION['modificado'] = "<p class='modificadocss'>Modificado con éxito</p>";

//include_once 'inventarioUsuario.php';
header ("inventarioUsuario.php");
//$_SESSION['mensaje'] = $mensaje;
  //echo $_SESSION['mensaje'];
//echo "modificado";

//  $_SESSION['modificado'] = "<p class='modificado'>Modificado con éxito</p>";


/*
echo $consulta[1];
echo $consulta[0];
*/

?>
