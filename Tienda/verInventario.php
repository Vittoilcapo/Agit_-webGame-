<?php
include_once('usuario.php');
session_start();
require_once 'inventarioUsuario.php';


  $class = $_SESSION['ClaseUsuario'];
  $_SESSION['id_inventario'] = $class->inventario_id;



$inventario = new InventarioArmas;
$inventario-> obtenerInventario($_SESSION['id_inventario']);


 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>inventario</title>
     <link rel="stylesheet" href="estilo_Inventario.css">
     <script>
           function foo(nombre_arma) {
          var selection = document.getElementById("checkboxes");


          if (selection.checked) {
            alert("hola");
              window.location.href = ('wea.php?inventarioNombre='+nombre_arma);
          }

      }
     </script>
     <form method="post" action="\Juego\Tienda\subirpuntos.php">
       <input class="btnPuntos" type="submit" value="Subir puntos">
    </form>
   </head>
   <?php
    // $_SESSION['modificado'] = "<p class='modificado'>Modificado con éxito</p>";
//echo $_SESSION['modificado'];
    ?>
   <footer>
     <button class="enlace" role="link" onclick="location.href='../Menu/menu.php'">Volver</button>
   </footer>
 </html>
