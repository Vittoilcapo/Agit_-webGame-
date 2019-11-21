<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Peleadores</title>
    <link rel="stylesheet" href="estilo_pelea.css">
  </head>
    <header>
      <h1>Eliga contra quien quiere pelear</h1>
      <div class="precio">
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
    <div class= "comprar" style="text-align: center"><input type="submit" name="comprar" value="Ver"></div>
    </form>

  </body>
  <footer><a href="/Juego/Menu/menu.html"> </a></footer>
</html>
