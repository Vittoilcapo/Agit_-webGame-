<?php
class InventarioArmas{

  public $nombre_arma;
  public $agilidad;
  public $fuerza;
  public $velocidad;


  function obtenerInventario($id_inventario){
  include_once("connectBD.php");
   $Sentencia_sql="select i.inventario_armas_nombre, i.inventario_armas_velocidad, i.inventario_armas_fuerza, i.inventario_armas_agilidad, t.armas_imagen from
   inventario_armas i join armas_tienda t where i.inventario_id =".$id_inventario." and t.armas_tienda_nombre = i.inventario_armas_nombre ;";

   $resultado = conectar($Sentencia_sql);


    ?>
    <link rel="stylesheet" href="estilo_inventario.css">
    <table class="grid-itemEstadisticas">
    <tr>
      <th>Nombre</th>
      <th>Velocidad</th>
      <th>Fuerza</th>
      <th>Agilidad</th>
    </tr>
    <?php
    while ($inventario = mysqli_fetch_array($resultado)){?>
      <div class="Armas">
        <div class = "imagenesArmas"> <img src="<?php echo $inventario["armas_imagen"] ?>"> </div>
      </div>
    <?php
    echo "<tr>";
      echo "<td>".$inventario["inventario_armas_nombre"]."</td>
      <td>".$inventario["inventario_armas_velocidad"]. "</td>
      <td>".$inventario["inventario_armas_fuerza"]."</td>
      <td>".$inventario["inventario_armas_agilidad"]."</td>";
    echo "</tr>";
    }
    ?>

    </table>

    <?php




}

}
class InventarioSkins{
    //aca vamos a tener que cargar las cosas de skins
}




 ?>
