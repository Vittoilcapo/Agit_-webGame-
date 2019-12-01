<?php
  include_once('../Tienda/usuario.php');
  include_once('rival.php');
  include_once('../Tienda/connectBD.php');
  session_start();
  $id_rival = $_REQUEST['rivales'];
  $ClaseRival = new rival($id_rival);
  $_SESSION['ClaseRival'] = $ClaseRival;
  $ClaseUsuario = $_SESSION['ClaseUsuario'];




//Setea la vida

$_SESSION['vidaRival'] = 10000;
$_SESSION['vidaUsuario'] = 10000;

$_SESSION['DañoTotal'] = 0;
$_SESSION['DañoTotalUsuario'] = 0;

// OBTIENE LA ARMA DE EL RIVAL


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

     <div class="marcoPrincipal">
        <div class="peleador1" id="Usuario">
          <?php
          echo $ClaseUsuario->usuario_nombre;
          //echo "<img src = '".$ClaseUsuario->imagen."' id='skinUsuario'";
          ?>
          <div class="arma1" id="arma1" style="display: block;"></div>
          <meter min="0" max="10000" value="10000" id="vidaUsuario">
      </div>

        <div class="log1" id="logUsuario">

        </div>
        <div class="fightDiv"><p id="fight"> FIGHT </p></div>

        <div class="contenedorDePeleador2">
          <div class="log2" id="logRival">

          </div>
       </div>
        <div class="peleador2" id="rival">
          <?php
         echo $ClaseRival->usuario_nombre;
         //echo "<img src = '".$ClaseRival->imagen."' id= 'skinRival'";
         ?>
         <div class="arma2" id="arma2" style="display: block;"></div>
         <meter min="0" max="10000" value="10000" id="vidaRival">
       </div>

       </div>

        <button class='botonPelearUsuario' value='usuario' onclick='pegar()'>EMPEZAR</button>;



 </html>
<?php
 $sql = "select armas_imagen from armas_tienda a join inventario_armas i where a.armas_tienda_nombre = i.inventario_armas_nombre and i.armasDefault = 1 and i.inventario_id = ".$id_rival.";";
 $resultado = conectar($sql);
 $ArmaRival = mysqli_fetch_array($resultado);
         if (trim($ArmaRival['armas_imagen']) == "") {
           ?>
           <script type="text/javascript">
             document.getElementById("arma2").style.display = 'none';
           </script>
           <?php
         }else {
           ?>
           <script type="text/javascript">
             document.getElementById("arma2").innerHTML = "<img src='<?php echo $ArmaRival['armas_imagen']; ?>' id='armaUsuario'>";
           </script>
           <?php
         }

 // OBTIENE LA ARMA DE EL USUARIO

 $sql = "select armas_imagen from armas_tienda a join inventario_armas i where a.armas_tienda_nombre = i.inventario_armas_nombre and i.armasDefault = 1 and i.inventario_id = ".$ClaseUsuario->usuario_id.";";
 $resultado = conectar($sql);
 $ArmaUsuario = mysqli_fetch_array($resultado);
       if (trim($ArmaUsuario['armas_imagen']) == "") {
         ?>
         <script type="text/javascript">
           document.getElementById("arma1").style.display = 'none';
         </script>
         <?php
       }else {
         ?>
         <script type="text/javascript">
           document.getElementById("arma1").innerHTML = "<img src='<?php echo $ArmaUsuario['armas_imagen']; ?>' id='armaUsuario'>";
         </script>
         <?php
       }
?>
