<?php
session_start();
$_SESSION['usuario']=$_REQUEST['campo_usuario_html'];
$_SESSION['password']=$_REQUEST['campo_password_html'];
$_SESSION['mail']=$_REQUEST['campo_mail_html'];

$conexion=mysqli_connect("127.0.0.1","root","root") or
die("problema en la conexion");

Mysqli_select_db($conexion,"php") or die("Error en seleccion de la base de datos");

$registro=mysqli_query($conexion,"insert into usuario values('".$_REQUEST['campo_usuario_html']."','".$_REQUEST['campo_password_html']."','".$_REQUEST['campo_mail_html']."');")
or die ("problema en el insert".mysqli_error($conexion));


?>
