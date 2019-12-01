<?php
include_once('rival.php');
include_once('../Tienda/usuario.php');
include_once('../Tienda/connectBD.php');
session_start();

$DañoTotal = $_GET['Daño'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>YOU LOSE</title>
    <link rel="stylesheet" href="estilo-Ganador.css">
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet" >
  </head>
  <header>
    <p id = "win">TU PIERDES</p>
  </header>
  <body>

    <div class="datosGanados">
      <table>
        <br>
        <tr>PUNTOS GANADOS: 0</tr>
        <br>
        <tr> <img src="monedas.png" id="coin"> + 0</tr>
        <br>
        <tr> <img src="damage.png" id="damage"> + <?php echo $DañoTotal; ?></tr>
        <br>
        <tr><a href ="../Menu/menu.php"><img src = 'volver.png' id="volver"></a></tr>
      </table>
    </div>
    <div class="gif-newells"><img src = "newells.gif" id="imagen"></div>
  </body>

</html>
