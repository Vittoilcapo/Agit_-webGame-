<?php
  include_once('rival.php');
  include_once('../Tienda/usuario.php');
  session_start();
  $id_rival = $_REQUEST['rivales'];
  $ClaseRival = new rival($id_rival);
  $ClaseUsuario = $_SESSION['ClaseUsuario'];





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
          echo "<img src = '".$ClaseUsuario->imagen."' id='skinUsuario'";
           ?>

        </div>
        <div class="arma1">

        </div>
        <div class="log1">


        </div>
        <div class="fight"><img src="fight.png" id="fight"></div>

      
        <div class="peleador2">

          <?php
          echo $ClaseRival->usuario_nombre;
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
