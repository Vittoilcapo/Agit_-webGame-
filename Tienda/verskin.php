<?php
require_once('usuario.php');
session_start();
include_once("connectBD.php");

$inventario_id = $_SESSION['ClaseUsuario']->inventario_id;
$dinerouser = $_SESSION['ClaseUsuario']->usuario_dinero;
echo "$";
echo $dinerouser;
echo "<br>";


if ($_REQUEST["skin"] == "newells"){
  $precio=2000;
  $skin="newells";

  echo "<br>";
}elseif ($_REQUEST["skin"] == "enanoboca") {
  $precio=1500;

  $skin="boca";
  echo "<br";

}elseif ($_REQUEST["skin"] == "chinwenwencha") {
  $precio=1000;

  $skin="chinwenwencha";
  echo "<br>";
}


if ($dinerouser < $precio) {
  echo "Dinero insuficiente";
}else {

  $sql="select tienda_skin_nombre from inventario_skin where tienda_skin_nombre='".$skin."';";
  $resultado= conectar($sql);
  $error = false;
  while ($estadisiticas = mysqli_fetch_array($resultado)){
    $error = true;
  }
  if ($error==true){
    echo "<script language=JavaScript> alert('Usted ya tiene esa skin.'); window.location.href = 'comprarskin.php';</script>";
  }else{
      $sql="insert into inventario_skin values (".$inventario_id.",'".$skin."');";
      $resultado= conectar($sql);
      if ($resultado) {

        //    echo "Compra realizada con exito";
          $dinerousuario = $dinerouser - $precio;

          $sql="update usuario SET usuario_dinero=".$dinerousuario." WHERE usuario_id=".$_SESSION['ClaseUsuario']->usuario_id.";";
          $dinero= conectar($sql);
          echo "Su compra ha sido realizada con exito";
}
}
}

  ?>
