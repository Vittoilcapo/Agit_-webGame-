<?php
include_once('usuario.php');
session_start();
include_once("connectBD.php");

$inventario_id = $_SESSION['ClaseUsuario']->inventario_id;
$dinerouser = $_SESSION['ClaseUsuario']->usuario_dinero;
//include_once ('comprarskin.php');

/*
echo "$";
echo $dinerouser;
echo "<br>";
*/

if ($_REQUEST["skin"] == "newells"){
  $precio=2000;
  $skin="newells";
//session_destroy();
  //echo "<br>";
}elseif ($_REQUEST["skin"] == "enanoboca") {
  $precio=1500;

  $skin="boca";
  //session_destroy();
  //echo "<br>";

}elseif ($_REQUEST["skin"] == "chinwenwencha") {
  $precio=1000;

  $skin="chinwenwencha";
  //session_destroy();
  //echo "<br>";
}




$Sentencia_sql="select inventario_skin_foto from inventario_skin where inventario_id=".$inventario_id." and inventario_skin_foto like '%" . $skin . "%';";
$resultado = conectar($Sentencia_sql);

if(mysqli_num_rows($resultado) > 0){
  include_once 'comprarskin.php';


  echo $_SESSION['skinInvalido'];
}else if ($dinerouser < $precio){
include_once 'comprarskin.php';



  echo "No tienes suficiente dinero para este skin ya que dispones de $ " . $dinerouser;

  }else{
    /*
$num1=10;
$num2=5;
$resultado=$num1-$num2;
echo "resultado es " . $resultado;

    */
  $sql="insert into inventario_skin values (".$inventario_id.",'../Tienda/img/".$skin.".png');";
  $resultado= conectar($sql);
  if ($resultado) {

        $_SESSION['ClaseUsuario']->usuario_dinero = $dinerouser - $precio;
        $sql="update usuario SET usuario_dinero=".$_SESSION['ClaseUsuario']->usuario_dinero." WHERE usuario_id=".$_SESSION['ClaseUsuario']->usuario_id.";";
        $resultado= conectar($sql);
include_once 'comprarskin.php';
        echo $_SESSION['skinValido'];

}


}

/*
if ($dinerouser < $precio) {
  echo "Dinero insuficiente";
}else {

  $sql="select inventario_skin_foto from inventario_skin where inventario_id=".$inventario_id.";";
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
          $_SESSION['ClaseUsuario']->usuario_dinero = $dinerouser - $precio;

          $sql="update usuario SET usuario_dinero=".$_SESSION['ClaseUsuario']->usuario_dinero." WHERE usuario_id=".$_SESSION['ClaseUsuario']->usuario_id.";";
          $dinero= conectar($sql);
          echo "Su compra ha sido realizada con exito";

}
}
}
*/
  ?>
