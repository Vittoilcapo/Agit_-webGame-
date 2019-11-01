<?php

//Va a obtener todo lo relacionado a la tienda que esta en la base de datos
  include("connectBD.php");
  session_start();



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
      <div class="grid-item"><img src= <?php
      if ($_REQUEST["armas"] == "hacha"){
        echo $_SESSION["imgHacha"];
      }elseif ($_REQUEST["armas"] == "martillo") {
        echo $_SESSION["imgMartillo"];
      }elseif ($_REQUEST["armas"] == "espada") {
        echo $_SESSION["imgEspada"];
      }else {
        echo $_SESSION["imgLanza"];
      }
        ?>> <div style="text-align: center"> <h3><?php
        if ($_REQUEST["armas"] == "hacha"){
          echo $_SESSION["precioHacha"];
        }elseif ($_REQUEST["armas"] == "martillo") {
          echo $_SESSION["precioMartillo"];
        }elseif ($_REQUEST["armas"] == "espada") {
          echo $_SESSION["precioEspada"];
        }else {
          echo $_SESSION["precioLanza"];
        }
          ?></h3> </div> </div>
    </div>


  </body>
  <footer><a href="/JuegoWeb/login/menu.html"> </a></footer>
</html>
