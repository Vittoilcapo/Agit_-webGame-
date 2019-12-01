<?php
include_once('../Tienda/usuario.php');
session_start();

include_once("../Tienda/connectBD.php");

$usuario_id = $_SESSION['ClaseUsuario']->usuario_id;


$sql2="select usuario_nivel from usuario where usuario_id=$usuario_id;";
$resultado=conectar($sql2);

while ($mostrar2=mysqli_fetch_array($resultado)){
  $nivel=$mostrar2[0];
  echo "Nivel: ".$nivel;
}
echo "<br>";

$sql="select puntosParaNivel from usuario where usuario_id=$usuario_id;";
$resultado=conectar($sql);

while ($mostrar=mysqli_fetch_array($resultado)){
  $puntosNivel=$mostrar[0];
  echo "Progreso: ".$puntosNivel."/1000";
}


?>


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Menú</title>
    <link rel="stylesheet" href="estilos_menu.css">
    <center>

</center>
  </head>
  <body>
<center>
  <div class="contenedor_menu">
    <div>
      <h1 class="title"> MENU</h1>
</div>
    <form method="post" action="/Juego/Partida/elegirPeleador.php">
      <input type="submit" value="Jugar"  class="btnJugar">
      <br>
      <br>
    </form>

    <form method="post" action="/Juego/Tienda/tienda.php">
        <input type="submit" value="Tienda"  class="btnTienda">

    <br>
    <br>
    </form>

    <form method="post" action="ayuda.html" >
    <input type="submit" value="Ayuda" class="btnAyuda">
      <br>
      <br>
  </form>

  <form method="post" action="/Juego/Tienda/verInventario.php" >
  <input type="submit" value="Inventario" class="btnInventario">
    <br>
    <br>
</form>

  <form method="post" action="/Juego/login/entradaPrincipal.php" >
  <input type="submit" value="Salir" class="btnSalir">
</form>

</div>
  <center>
  </body>
</html>
