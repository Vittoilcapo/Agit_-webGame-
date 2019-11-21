<?php
session_start();
require_once(__DIR__.'/../../Juego/Tienda/usuario.php');
include_once("connectBD.php");
$_SESSION['usuario']=$_REQUEST['campo_mail_html'];
$_SESSION['password']=$_REQUEST['campo_password_html'];


$conexion=mysqli_connect("localhost","root","root","juego") or
die("problema en la conexion");

$sql="select usuario_mail, usuario_id from usuario where usuario_mail='".$_REQUEST['campo_mail_html']."' and usuario_password='".$_REQUEST['campo_password_html']."';";


$resultado = conectar2($sql);


$sql=" select * from usuario where usuario_mail='".$_REQUEST['campo_mail_html']."' and usuario_password='".$_REQUEST['campo_password_html']."';";

$registro=mysqli_query($conexion,$sql) or die ("problema en el select".mysqli_error($conexion));

$exito=false;
while($reg=mysqli_fetch_array($resultado)){
  $exito=true;
  $_SESSION['usuario_id'] = $reg["usuario_id"];

}

if ($exito==true){


  header ("Location:\Juego_GitHub\Menu\menu.html");

  require_once('C:\xampp\htdocs\Juego\Tienda\usuario.php');
  $user = new usuario;
  $user->setUsuario($_SESSION['usuario_id']);

  header ("location: /Juego/Menu/menu.html");




}else{
            include_once 'entradaPrincipal.php';


            echo $_SESSION['errorlog'];


}

?>
