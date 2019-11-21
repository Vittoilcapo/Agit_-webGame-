<?php
session_start();
$_SESSION['usuario']=$_REQUEST['campo_mail_html'];
$_SESSION['password']=$_REQUEST['campo_password_html'];

$conexion=mysqli_connect("localhost","root","juanmanuel2000") or
die("problema en la conexion");

Mysqli_select_db($conexion,"juego") or die("Error en seleccion de la base de datos");


$sql=" select * from usuario where usuario_mail='".$_REQUEST['campo_mail_html']."' and usuario_password='".$_REQUEST['campo_password_html']."';";

$registro=mysqli_query($conexion,$sql) or die ("problema en el select".mysqli_error($conexion));
$exito=false;
while($reg=mysqli_fetch_array($registro)){
  $exito=true;
}

if ($exito==true){

  header ("Location:\Juego_GitHub\Menu\menu.html");



}else{
include_once 'entradaPrincipal.php';
            echo $_SESSION['errorlog'];


}

?>
