<?php
session_start();
$_SESSION['usuario']=$_REQUEST['campo_mail_html'];
$_SESSION['password']=$_REQUEST['campo_password_html'];

$conexion=mysqli_connect("127.0.0.1","vitto","1234") or die("problema en la conexion");

Mysqli_select_db($conexion,"juego") or die("Error en seleccion de la base de datos");

if ($_REQUEST['campo_mail_html'] == null || $_REQUEST['campo_password_html'] == null){
	echo "Campo Contraseña o Usuario vacio";
	header('Location: entradaPrincipal.php');
}


$sql=" select email from usuario where email='".$_REQUEST['campo_mail_html']."' and pass='".$_REQUEST['campo_password_html']."';";

$registro=mysqli_query($conexion,$sql) or die ("problema en el select".mysqli_error($conexion));
$exito=false;

while($reg=mysqli_fetch_array($registro)){
  $exito=true;
}

if ($exito==true){

  INCLUDE_ONCE 'menu.html';

}else{

  echo "login incorrecto";
}

?>
