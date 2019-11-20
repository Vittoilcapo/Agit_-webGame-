<?php
session_start();
$_SESSION['usuario']=$_REQUEST['campo_usuario_html'];
$_SESSION['clave']=$_REQUEST['campo_password_html'];
$_SESSION['mailIn']=$_REQUEST['campo_mail_ingresado'];



$clave = $_SESSION['clave'];
$usuario = $_SESSION['usuario'];
$mail = $_SESSION['mailIn'];

// verificamos que el nombre del usuario contenga mas de 5 caracteres
if(strlen($usuario) < 5){
      $error_clave = 'El usuario debe tener al menos 5 caracteres';
      $_SESSION['error']=$error_clave;
      header("Location: registrarPrincipal.php");

// verificamos que la password que se ingresa sea mayor a 6 caracteres
  }else if(strlen($clave) < 6){
      $error_clave = 'La clave debe tener al menos 6 caracteres';
      $_SESSION['error']=$error_clave;
      header("Location: registrarPrincipal.php");

// verificamos que la password que se ingresa sea menor a 16 caracteres
   }else if(strlen($clave) > 16){
      $error_clave = "La clave no puede tener más de 16 caracteres";
      $_SESSION['error']=$error_clave;
      header("Location: registrarPrincipal.php");

// verificamos que la password contenga al menos una letra minuscula
   }else if (!preg_match('`[a-z]`',$clave)){
      $error_clave = "La clave debe tener al menos una letra minúscula";
      $_SESSION['error']=$error_clave;
      header("Location: registrarPrincipal.php");

// verificamos que la password tenga al menos un caracter numerico
   }else if (!preg_match('`[0-9]`',$clave)){
      $error_clave = "La clave debe tener al menos un caracter numérico";
      $_SESSION['error']=$error_clave;
      header("Location: registrarPrincipal.php");

// is_valid_email es una funcion declarada abajo que sirve para ver si el mail tiene los caracteres correctos
    }else if (is_valid_email($mail) != true){
         $error_clave = "El mail no es valido";
         $_SESSION['error']=$error_clave;
         header("Location: registrarPrincipal.php");
}else{


$conexion=mysqli_connect("localhost","root","root")or
die ("Problema con la conexion");
mysqli_select_db($conexion,"juego");

$sql=" select usuario_mail from usuario where usuario_mail='".$mail."';";
$existeUsuario=mysqli_query($conexion,$sql) or die ("problema en el select".mysqli_error($conexion));

$existe=false;

while($exist=mysqli_fetch_array($existeUsuario)){
  $existe=true;
}

if ($existe==true){

  $error_clave = "El e-Mail ya esta registardo";
  $_SESSION['error']=$error_clave;
  header('Location: registrarPrincipal.php');

}else{
  include_once 'connectBD.php';

  $sql = "insert into inventario values();";
  $resultado = conectar($sql); // inserta un inventario nuevo para el usuario
  $sql = "select max(inventario_id) AS id from inventario;"; // obtiene que inventario se asigno
  $resultado = conectar($sql);


  while($result=mysqli_fetch_array($resultado)){

    $id_user = $result["id"];

  }



  $conexion=mysqli_connect("localhost","root","root","juego")or
  die ("Problema con la conexion");
  $sql= "insert into usuario (usuario_id, usuario_dinero, usuario_nivel, inventario_id, usuario_nombre, usuario_mail, usuario_password) values (".$id_user.", 100 ,1 ,".$id_user.",'" . $usuario . "','" . $mail . "','" . $clave. "');";
  if (mysqli_query($conexion, $sql)) { //EL NIVEL VA A SER 1 Y EL DINERO 100 AL PRINCIPIO
        echo "Registrado correctamente";
        header('Location: seleccionbruto.php');
        //hacer sentencias mysql para obtener que id usario se le puso, para despues crear el inventario del usuario
  }else{
        echo "Error: " . "<br>" . "Error al registrarte";
  }
  mysqli_close($conexion);

}
}
 function is_valid_email($mail){
  $matches = null;
  return (1 === preg_match('/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/', $mail, $matches));
}

?>
