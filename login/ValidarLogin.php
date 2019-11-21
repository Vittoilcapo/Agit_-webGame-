<?php
include_once('../Tienda/usuario.php');
session_start();
include_once("../Tienda/connectBD.php");
$_SESSION['usuario']=$_REQUEST['campo_mail_html'];
$_SESSION['password']=$_REQUEST['campo_password_html'];


$conexion=mysqli_connect("localhost","root","root","juego") or
die("problema en la conexion");

$sql="select usuario_mail, usuario_id from usuario where usuario_mail='".$_REQUEST['campo_mail_html']."' and usuario_password='".$_REQUEST['campo_password_html']."';";


$resultado = conectar($sql);


$sql=" select * from usuario where usuario_mail='".$_REQUEST['campo_mail_html']."' and usuario_password='".$_REQUEST['campo_password_html']."';";

$registro=mysqli_query($conexion,$sql) or die ("problema en el select".mysqli_error($conexion));

$exito=false;
while($reg=mysqli_fetch_array($resultado)){
  $exito=true;
  $usuario_id = $reg["usuario_id"];

}

if ($exito==true){

  $user = new usuario;
  $user->setUsuario($usuario_id);
  $_SESSION['ClaseUsuario'] = $user;

  header ("location: /Juego/Menu/menu.html");




}else{

    include_once 'entradaPrincipal.php';
    echo $_SESSION['errorlog'];


}

?>
