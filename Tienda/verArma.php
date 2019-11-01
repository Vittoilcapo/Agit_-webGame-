<?php

//Va a obtener todo lo relacionado a la tienda que esta en la base de datos
  include("connectBD.php");
  session_start();
  $Sentencia_sql="select armas_tienda_agilidad, armas_tienda_fuerza, armas_tienda_velocidad from armas_tienda where armas_tienda_nombre = '".$_REQUEST["armas"]."';";
  $resultado = conectar($Sentencia_sql);


   //obtiene solo la columna imagen arma y precio asignandolo a un array para poder acceder a el despues
     while ($estadisiticas = mysqli_fetch_array($resultado)){
       $_SESSION["fuerza"] = $estadisiticas["armas_tienda_fuerza"];
       $_SESSION["velocidad"] = $estadisiticas["armas_tienda_velocidad"];
       $_SESSION["Agilidad"] = $estadisiticas["armas_tienda_agilidad"];
     }

 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Tienda</title>
    <link rel="stylesheet" href="estilo-tienda.css">
  </head>
  <header> <h2></h2> </header>
  <body>
    <div class="titulo">
      <img src="img/letra.png">
    </div>
    <div class="contenedor">
      <div class="grid-itemCargado"><img src= <?php
      if ($_REQUEST["armas"] == "Hacha"){
        echo $_SESSION["imgHacha"];
      }elseif ($_REQUEST["armas"] == "Martillo") {
        echo $_SESSION["imgMartillo"];
      }elseif ($_REQUEST["armas"] == "Espada") {
        echo $_SESSION["imgEspada"];
      }else {
        echo $_SESSION["imgLanza"];
      }
        ?>> <div style="text-align: center"> <h3><?php
        if ($_REQUEST["armas"] == "Hacha"){
          echo $_SESSION["precioHacha"];
        }elseif ($_REQUEST["armas"] == "Martillo") {
          echo $_SESSION["precioMartillo"];
        }elseif ($_REQUEST["armas"] == "Espada") {
          echo $_SESSION["precioEspada"];
        }else {
          echo $_SESSION["precioLanza"];
        }
          ?></h3> </div> </div>

          <div class="grid-itemEstadisticas">
          <table class="">
          <tr>
            <th>Agilidad</th>
            <th>Fuerza</th>
            <th>Velocidad</th>
          </tr>
          <tr>
            <td><?php echo $_SESSION["Agilidad"]; ?></td>
            <td><?php echo $_SESSION["fuerza"]; ?></td>
            <td><?php echo $_SESSION["velocidad"]; ?></td>
          </tr>
          </table>
          </div>
          </div>


  </body>
  <footer><a href="/JuegoWeb/login/menu.html"> </a></footer>
</html>
