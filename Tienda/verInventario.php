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
     <script>
           function foo(nombre_arma) {
          var selection = document.getElementById("checkboxes");
          

          if (selection.checked) {
              window.location.href = ('wea.php?inventarioNombre='+nombre_arma);
          }

      }
     </script>
   </head>
   <footer>
     <button class="enlace" role="link" onclick="location.href='../Menu/menu.html'">Volver</button>
   </footer>
 </html>
