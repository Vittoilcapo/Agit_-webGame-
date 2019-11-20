<?php
session_start();
require(__DIR__.'/../../Juego/Tienda/usuario.php');
include_once("connectBD.php");
$_SESSION['usuario']=$_REQUEST['campo_mail_html'];
$_SESSION['password']=$_REQUEST['campo_password_html'];

$sql=" select usuario_mail, usuario_id from usuario where usuario_mail='".$_REQUEST['campo_mail_html']."' and usuario_password='".$_REQUEST['campo_password_html']."';";

$resultado = conectar($sql);

$exito=false;
while($reg=mysqli_fetch_array($resultado)){
  $exito=true;
  $usuario_id = $reg["usuario_id"];
}

if ($exito==true){

  $user = new usuario;
  $user-> setUsuario($usuario_id);

header ("location: /Juego/Menu/menu.html");



}else{

  echo "login incorrecto";
}

?>
