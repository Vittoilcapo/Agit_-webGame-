<?php
include_once('rival.php');
include_once('../Tienda/usuario.php');
include_once('../Tienda/connectBD.php');
session_start();
$ganador = $_GET['Ganador'];
$DañoTotal = $_GET['Daño'];
if ($ganador == 'Rival') {
  header('location: pierdes.php?Daño='.$DañoTotal.'');
}else {



$ClaseUsuario = $_SESSION['ClaseUsuario'];


function obtenerPuntosNivel($ClaseUsuario){

  $sql = "select puntosParaNivel from usuario where usuario_id =".$ClaseUsuario->usuario_id.";";
  $resultado = conectar($sql);

  $result = mysqli_fetch_array($resultado);
  $puntosParaNivel = $result['puntosParaNivel'];

  return $puntosParaNivel;
}
 /////// LE SUMA EL DINERO GANADO
$sql = "update usuario set usuario_dinero = usuario_dinero +20 where (usuario_id = ".$ClaseUsuario->usuario_id.");";
$resultado = conectar($sql);
/////////////////////////////////
 ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>YOU WIN</title>
    <link rel="stylesheet" href="estilo-Ganador.css">
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet" >
  </head>
  <header>
    <p id = "win">TU GANAS !!!</p>
  </header>
  <body>

    <div class="datosGanados">
      <table>
        <br>
        <tr>PUNTOS GANADOS: 100</tr>
        <br>
        <tr> <img src="monedas.png" id="coin"> + 20</tr>
        <br>
        <tr> <img src="damage.png" id="damage"> + <?php echo $DañoTotal; ?></tr>
        <br>
        <?php
        /////////////////////////////////////////ESTO ES LO DE LOS NIVELES //////////////////////////////////////
            $puntos = obtenerPuntosNivel($ClaseUsuario);
            $puntosTotales = $puntos + 100;
            if ($puntosTotales >= 1000) {
                  $sql = "update usuario set usuario_nivel = usuario_nivel +1 where (usuario_id = ".$ClaseUsuario->usuario_id.");";
                  $resultado = conectar($sql);

                      if ($resultado) {
                        $sql = "update usuario set puntosParaNivel = 0 where (usuario_id =".$ClaseUsuario->usuario_id.");";
                        $resultado = conectar($sql);
                        $sql = "select usuario_nivel from usuario where usuario_id =".$ClaseUsuario->usuario_id.";";
                        $resultado = conectar($sql);
                        $result = mysqli_fetch_array($resultado );
                        $sql = "update estadisticas set puntoDisponibles = puntoDisponibles + 1 where (usuario_id = ".$ClaseUsuario->usuario_id.");";
                        $resultado = conectar($sql);
                        ?>

                        <tr> <img src='levelUp.png' id='levelUp'> Nuevo nivel : <?php echo $result['usuario_nivel']; ?></tr>

                        <?php
              }

            }else {
                    $sql = "update usuario set puntosParaNivel = puntosParaNivel + 100 where (usuario_id = ".$ClaseUsuario->usuario_id." );";
                    $resultado = conectar($sql);
                    $sql = "select usuario_nivel from usuario where usuario_id =".$ClaseUsuario->usuario_id.";";
                    $resultado = conectar($sql);
                    $result = mysqli_fetch_array($resultado);

                    echo "<tr>Nivel :".$result['usuario_nivel']."</tr>";
                    echo "<br>";
                    echo "<tr>Puntos actuales:".$puntos = obtenerPuntosNivel($ClaseUsuario)."</tr>";
                    ?>
                    <br>
                    <tr><a href ="../Menu/menu.php"><img src = 'volver.png' id="volver"></a></tr>
                    <?php

            }
         ?>
      </table>
    </div>
    <div class="gif-newells"><img src = "newells.gif" id="imagen"></div>
  </body>

</html>
<?php
}
?>
