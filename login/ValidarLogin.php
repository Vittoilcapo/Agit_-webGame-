<?php
session_start();
include_once('../Tienda/usuario.php');
include_once("../Tienda/connectBD.php");
$_SESSION['usuario']=$_REQUEST['campo_mail_html'];
$_SESSION['password']=$_REQUEST['campo_password_html'];

$sql="select usuario_mail, usuario_id from usuario where usuario_mail='".$_REQUEST['campo_mail_html']."' and usuario_password='".$_REQUEST['campo_password_html']."';";

$resultado = conectar($sql);

$exito=false;
while($reg=mysqli_fetch_array($resultado)){
  $exito=true;
  $usuario_id = $reg["usuario_id"];

}

if ($exito==true){

  include_once('..\Tienda\usuario.php');
  $user = new usuario;
  $user->setUsuario($usuario_id);
  $_SESSION['ClaseUsuario'] = $user;

  header ("location: /Juego/Menu/menu.html");



}else{

  echo "login incorrecto";
}

?>
