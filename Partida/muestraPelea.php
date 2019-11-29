<?php
  include_once('../Tienda/usuario.php');
  include_once('rival.php');
  session_start();
  $id_rival = $_REQUEST['rivales'];
  $ClaseRival = new rival($id_rival);
  $_SESSION['ClaseRival'] = $ClaseRival;
  $ClaseUsuario = $_SESSION['ClaseUsuario'];




//Setea la vida
$_SESSION['vidaUsuario'] = 500;
$_SESSION['vidaRival'] = 500;

//funciones para hacer daño



 ?>


 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Fight!!</title>
     <link rel="stylesheet" href="estilo_pelea.css">
     <script type="text/javascript" src="ajax.js"></script>
     <link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet" >
   </head>
      <div class="ganaUsuario" id="GanaUsuario">
          <?php echo $ClaseUsuario->usuario_nombre ?>
      </div>
      <div class="ganaRival" id="GanaRival">
        <?php echo $ClaseRival->usuario_nombre ?>
      </div>
     <div class="marcoPrincipal">


          <button id="botonPelearUsuario" value="usuario" onclick="pegar()"></button>


          <button type="button" name="Rival" id="botonPelearRival" value="rival" onclick="pegar2()"></button>


        <div class="peleador1" id="Usuario">



        <?php
        echo $ClaseUsuario->usuario_nombre;
        //echo "<img src = '".$ClaseUsuario->imagen."' id='skinUsuario'";

        ?></div>

        <div class="arma1"></div>

        <div class="log1" id="logUsuario">

        </div>
        <div class="fight"><img src="fight.png" id="fight"></div>

        <div class="contenedorDePeleador2">
        <div class="peleador2" id="rival">

          <?php
         echo $ClaseRival->usuario_nombre;
         //echo "<img src = '".$ClaseRival->imagen."' id= 'skinRival'";
         ?></div>
       </div>

        <div class="arma2"></div>
        <div class="log2" id="logRival"></div>

     </div>
 </html>

 <?php
 $quienGano = $_SESSION['QuienGano'];
if ($quienGano == "usuario") {
  echo "GANO USUARIO";
}else {
  echo "GANO RIVAL";
}


  ?>
