<?php
session_start();


if (trim($_GET['nombreusuario']=="")) {
  echo "falta asignar nombre a su luchador";
?>
<!DOCTYPE html>
<br>
<br>
<a href="seleccionbruto.php"> atras </a>
<?php
}else{

if ( isset( $_GET['boxeadorcomprar'] )){
$comprar = 1;

}elseif (isset( $_GET['caballerocomprar'])) {
$comprar = 2;

}elseif (isset( $_GET['raccooncomprar'])) {
$comprar = 3;

}
echo $comprar;
$usuario =$_GET['nombreusuario'];
echo $usuario;
}


$conexion=mysqli_connect("localhost","root","root")or
die ("Problema con la conexion");
mysqli_select_db($conexion,"juego");

$sql=" select usuario_nombre from usuario where usuario_nombre='".$usuario."';";
$existeUsuario=mysqli_query($conexion,$sql) or die ("problema en el select".mysqli_error($conexion));

$existe=false;

while($exist=mysqli_fetch_array($existeUsuario)){
  $existe=true;
}

if ($existe==true){

  $error_clave = "El usuario ya esta registardo";
  $_SESSION['error']=$error_clave;
  header('Location: seleccionbruto.php');

}else{
  $sql= "insert into usuario values ('".$usuario."','".$clave."','".$mail."');"; //aca va a haber quilombo
  if (mysqli_query($conexion, $sql)) {
        echo "Registrado correctamente";
        header('Location: seleccionbruto.php');
  }else{
        echo "Error: " . "<br>" . "Error al registrarte";
  }
  mysqli_close($conexion);

}

  ?>
