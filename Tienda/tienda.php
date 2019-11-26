<?php

//Va a obtener todo lo relacionado a la tienda que esta en la base de datos
  include_once("connectBD.php");
  require_once('usuario.php');
  session_start();
  $Sentencia_sql="select * from armas_tienda ;";
  $resultado = conectar($Sentencia_sql);

  $numero = mysqli_num_rows($resultado);
  $numeroColumnas = mysqli_num_fields($resultado);

  for ($i = 0; $i <= $numero; $i++) { //obtiene solo la columna imagen arma y precio asignandolo a un array para poder acceder a el despues
    $contenido_tienda = mysqli_fetch_array($resultado);
    for ($a = 0; $a < $numeroColumnas; $a++) {
    $Armas[$i][$a] = $contenido_tienda[$a];
    //$precio[$i] = $contenido_tienda["armas_precio"];
  }

  }

  $_SESSION["imgEspada"]= $Armas[0][5]; //en Armas[0] esta img/upg_sword.png y asi con los otrs
  $_SESSION["imgHacha"]= $Armas[1][5];
  $_SESSION["imgLanza"]= $Armas[2][5];
  $_SESSION["imgMartillo"]= $Armas[3][5];

  $_SESSION["precioEspada"]= $Armas[0][6];
  $_SESSION["precioHacha"]=$Armas[1][6];
  $_SESSION["precioLanza"]=$Armas[2][6];
  $_SESSION["precioMartillo"]=$Armas[3][6];


 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Tienda</title>
    <link rel="stylesheet" href="estilo-tienda.css">
  </head>
    <header>
      <div class="titulo">
        <img src="img/letra.png">
      </div>
      <div class="precio">

        <h2>
        <?php

        echo $_SESSION['ClaseUsuario']->usuario_dinero;
        ?>

        <div class="coinimagen"><img src="img/moneda.png" width="30" height="30"></div>
      </h2>
      </div>

  </header>
  <body>

    <div class="contenedor">
      <div class="grid-item"><img src= <?php echo $_SESSION["imgHacha"] ?>> <div style="text-align: center"> <h3><? echo $_SESSION["precioHacha"] ?></h3> </div> </div>
      <div class="grid-item"><img src=<?php echo $_SESSION["imgMartillo"] ?>> <div style="text-align: center"> <h3><? echo $_SESSION["precioMartillo"] ?></h3> </div></div>
      <div class="grid-item"><img src=<?php echo $_SESSION["imgEspada"] ?>> <div style="text-align: center"> <h3><? echo $_SESSION["precioEspada"] ?></h3> </div></div>
      <div class="grid-item"><img src=<?php echo $_SESSION["imgLanza"] ?>> <div style="text-align: center"> <h3><? echo $_SESSION["precioLanza"] ?></h3> </div></div>
    </div>

    <form class= "compras" method="post" action="verArma.php" >
    <div class="checkboxes">
       <div class ="hacha"> <input type="radio" name="armas" value="Hacha"></div>

       <div class="martillo"><input type="radio" name="armas" value="Martillo"></div>

       <div class="espada"><input type="radio" name="armas" value="Espada"></div>

       <div class="lanza"><input type="radio" name="armas" value="Lanza"></div>

    </div>
    <div class= "comprar" style="text-align: center">
    <input type="submit" name="comprar" value="Ver">
    </div>
    </form>
    <form method="post" action="comprarskin.php">
    <input type="submit" value="comprar skins"/>
  </form>
  </body>
  <footer>
     <button class="enlace" role="link" onclick="location.href='../Menu/menu.html'">Volver</button>
  </footer>
</html>
