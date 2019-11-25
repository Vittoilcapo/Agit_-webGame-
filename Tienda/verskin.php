<?php
require_once('usuario.php');
session_start();
include_once("connectBD.php");

$inventario_id = $_SESSION['ClaseUsuario']->inventario_id;
$dinerousuario = $_SESSION['ClaseUsuario']->usuario_dinero;
echo "$";
echo $dinerousuario;
echo "<br>";


if ($_REQUEST["skin"] == "newells"){
  $precio="20000";
  $skin="newells";
  echo "vamooooooo newells";
  echo "<br>";
}elseif ($_REQUEST["skin"] == "enanoboca") {
  $precio="1500";

  $skin="boca";
  echo "vamo bokita";
  echo "<br";

}elseif ($_REQUEST["skin"] == "chinwenwencha") {
  $precio="1000";

  $skin="chinwenwencha";
  echo "te la tomaste toda";
  echo "<br>";
}

if ($dinerousuario < $precio) {
  echo "pica de aca logi";
  echo "<br>";
  echo "anda a trabajar";
}else {
  echo "su compra ha sido realizada con exito";

  $sql="insert inventario_skin values ('".$inventario_id."',".$skin."')";
  $resultado= conectar($sql)or die ("algo anda mal");
}
  if ($resultado) {
        echo "Compra realizada con exito";
        $user->usuario_dinero = $dinero - $precio;
        echo $usuario_dinero;
        $sql="update usuario SET usuario_dinero=".$_SESSION['ClaseUsuario']->usuario_dinero." WHERE usuario_id='".$_SESSION['ClaseUsuario']->usuario_id."';";
        $resultado= conectar($sql);


}

  ?>
