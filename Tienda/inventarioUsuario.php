  <html>
<?php
include_once("connectBD.php");


class InventarioArmas{

  public $nombre_arma;
  public $agilidad;
  public $fuerza;
  public $velocidad;


  function obtenerInventario($id_inventario){
   $Sentencia_sql="select i.inventario_id as id,i.inventario_armas_nombre as nombre, i.inventario_armas_velocidad as velocidad, i.inventario_armas_fuerza as fuerza, i.inventario_armas_agilidad as agilidad, t.armas_imagen as imagen
   from inventario_armas i, armas_tienda t where i.inventario_id=".$id_inventario." and t.armas_tienda_nombre=i.inventario_armas_nombre ;";

   $resultado = conectar($Sentencia_sql);


    ?>

    <link rel="stylesheet" href="estilo_Inventario.css">
    <body>
    <table class="grid-itemEstadisticas">
    <tr>
      <th>Nombre</th>
      <th>Velocidad</th>
      <th>Fuerza</th>
      <th>Agilidad</th>
      <th>Arma por defecto</th>
    </tr>

    <?php

    while ($inventario = mysqli_fetch_array($resultado)){?>
      <div class="Armas">
        <div class = "imagenesArmas"> <img src="<?php echo $inventario["imagen"]; ?>"> </div>
      </div>
    <?php
    $id=$inventario["id"];
    echo "<tr>";
    /*
      echo "<td>".$inventario["inventario_armas_nombre"]."</td>
      <td>".$inventario["inventario_armas_velocidad"]. "</td>
      <td>".$inventario["inventario_armas_fuerza"]."</td>
      <td>".$inventario["inventario_armas_agilidad"]."</td>";
*/

echo "<td>"; echo $inventario["nombre"]; echo "</td>";
echo "<td>"; echo $inventario["velocidad"]; echo "</td>";
echo "<td>"; echo $inventario["fuerza"]; echo "</td>";
echo "<td>"; echo $inventario["agilidad"]; echo "</td>";

    //    echo "<input type='radio' name='armasDefault' id='checkboxes' onClick=foo('".$inventario["inventario_armas_nombre"]."') >";

        echo "<td><a href='wea.php?nomArma=" . $inventario['nombre']."&&id=".$inventario["id"] ."'><input type='button' value='Elija arma' name='armasDefault'></a></td>";

        ?>
      </div>
      <?php

    echo "</tr>";

    }


    ?>

    </table>





<?php

}

}



$_SESSION['armaxdef'] = "<p class='error2'>Modificado con exito</p>";


 ?>
</body>
</html>
