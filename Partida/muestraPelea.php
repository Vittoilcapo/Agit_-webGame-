<?php
  include_once('../Tienda/usuario.php');
  include_once('rival.php');
  include_once('../Tienda/usuario.php');
  session_start();
  $id_rival = $_REQUEST['rivales'];
  $ClaseRival = new rival($id_rival);
  $ClaseUsuario = $_SESSION['ClaseUsuario'];


//Setea la vida
$vidaUsuario = 5000;
$vidaRival = 5000;


//funciones para hacer daño
function golpe($ClaseUsuario,$ClaseRival){

  $puntoCritico = rand(1,5);
  $fuerzaUsuario = $ClaseUsuario->fuerza;

  $agilidadRival = $ClaseRival->agilidad;

  $puntosDelGolpe = $puntoCritico * $fuerzaUsuario;

  return $puntosDelGolpe;


}


 ?>


 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Fight!!</title>
     <link rel="stylesheet" href="estilo_pelea.css">
   </head>
   <body>
     <div class="marcoPrincipal">

        <div class="peleador1">

          <?php
          echo $ClaseUsuario->usuario_nombre;
          echo "<br>";
          echo $vidaUsuario;
          echo "<img src = '".$ClaseUsuario->imagen."' id='skinUsuario'";
           ?>

        </div>
        <div class="arma1">

        </div>
        <div class="log1">
          <?php
              echo "El usuario ataca...";
              echo "<br>";
              $velocidadUsuario= $ClaseUsuario->velocidad;
              $cantidadGolpes = rand(1,5);
              $cantGolpesTotal= $velocidadUsuario * $cantidadGolpes;
              echo "Pegara ".$cantGolpesTotal." golpes" ;
              echo "<br>";
              $totalDeDaño= 0;

              for ($i=0; $i <= $cantGolpesTotal ; $i++) {
                $dañoDeGolpes = golpe($ClaseUsuario,$ClaseRival);
                $totalDeDaño = $totalDeDaño + $dañoDeGolpes;
              }
              echo "<br>";
              echo $totalDeDaño;
              $vidaRival = $vidaRival - $totalDeDaño;
              

           ?>

        </div>
        <div class="fight"><img src="fight.png" id="fight"></div>


        <div class="peleador2">

          <?php
          echo $ClaseRival->usuario_nombre;
          echo "<br>";
          echo $vidaRival;
          ?>
          <div class="skin">
          <?php
          echo "<img src = '".$ClaseRival->imagen."' id= 'skinRival'";
           ?>
           </div>

        </div>
        <div class="arma2">

        </div>
        <div class="log2">


        </div>

     </div>
   </body>
 </html>
