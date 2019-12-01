<?php
include_once('../Tienda/usuario.php');
session_start();
include_once('../Tienda/connectBD.php');
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Peleadores</title>
    <link rel="stylesheet" href="estilo_pelea.css">
  </head>
    <header>
      <h1 style="text-align: center">Eliga contra quien quiere pelear</h1>
  </header>
  <body>

    <div class="contenedor">
      <?php
        $sql ="select u.usuario_id, u.usuario_nombre, u.usuario_nivel, i.inventario_skin_foto, e.estadisticas_velocidad, e.estadisticas_fuerza, e.estadisticas_agilidad from usuario u inner join inventario_skin i inner join estadisticas e
              where u.inventario_id = i.inventario_id and e.usuario_mail = u.usuario_mail and u.usuario_id <>".$_SESSION['ClaseUsuario']->usuario_id.";"; // obtengo a los rivales disponibles
              /*
                FALTA QUE SOLO OBTENGA A LOS QUE SON PARECIDOS A SU NIVEL
              */
        $resultado = conectar($sql);
        $numero = mysqli_num_rows($resultado);

        while ($result = mysqli_fetch_array($resultado)){
          $Armas[] = $result["usuario_id"];
          echo "<div class='rivales'><h4>".$result["usuario_nombre"]."</h4> <h3>".$result["usuario_nivel"]."</h3><img src=".$result["inventario_skin_foto"]."></div>";

        }

      ?>
    </div>

    <form class= "skins" method="post" action="muestraPelea.php" >
    <div class="checkboxes">
      <?php
      for ($i = 0; $i < count($Armas); $i++) {
      echo "<div class ='check'> <input type='radio' name='rivales' value=".$Armas[$i]."></div>";
      }
      ?>
    </div>
    <div class= "btnPelar" style="text-align: center"><input type="submit" name="Pelear" value="Pelear"></div>
    </form>

  </body>
  <footer><a href="/Juego/Menu/menu.php"> </a></footer>
</html>
