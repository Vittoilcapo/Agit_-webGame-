<?php

  include_once("connectBD.php");
  include_once('usuario.php');
  session_start();

   //esta funcion luego va a tener que ir cuando se crean los usuarios

  $inventario_id = $_SESSION['ClaseUsuario']->inventario_id;
  $dinero = $_SESSION['ClaseUsuario']->usuario_dinero;

  $arma = $_SESSION["nombre_arma"];
  $fuerza = $_SESSION["fuerza"];
  $velocidad = $_SESSION["velocidad"];
  $agilidad = $_SESSION["Agilidad"];

  $precioArma = $_GET['precio'];

//verifica que no tenga el arma repetida
$Sentencia_sql="select inventario_armas_nombre from inventario_armas where inventario_id =".$inventario_id." and inventario_armas_nombre ='".$arma."';";
$resultado = conectar($Sentencia_sql);

if(mysqli_num_rows($resultado) > 0){
  echo "usted ya tiene esa arma";
}else if ($dinero < $precioArma){

    echo "usted no tiene suficiente dinero para comprar este Item";
  }else{
    /*
$num1=10;
$num2=5;
$resultado=$num1-$num2;
echo "resultado es " . $resultado;

    */
  $sql="insert into inventario_armas values ('".$inventario_id."','".$arma."','".$velocidad."','".$fuerza."','".$agilidad."')";
  $resultado= conectar($sql);
  if ($resultado) {

        $_SESSION['ClaseUsuario']->usuario_dinero = $dinero - $precioArma;
        $sql="update usuario SET usuario_dinero=".$_SESSION['ClaseUsuario']->usuario_dinero." WHERE usuario_id='".$_SESSION['ClaseUsuario']->usuario_id."';";
        $resultado= conectar($sql);
        echo "Compra realizada con exito";
}


}
?>
