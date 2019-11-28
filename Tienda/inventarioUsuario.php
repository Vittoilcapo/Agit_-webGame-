<?php
class InventarioArmas{

  public $nombre_arma;
  public $agilidad;
  public $fuerza;
  public $velocidad;


  function obtenerInventario($id_inventario){
  setearArmaDefault($id_inventario);
  include_once("connectBD.php");
   $Sentencia_sql="select i.inventario_armas_nombre, i.inventario_armas_velocidad, i.inventario_armas_fuerza, i.inventario_armas_agilidad, t.armas_imagen from
   inventario_armas i join armas_tienda t where i.inventario_id =".$id_inventario." and t.armas_tienda_nombre = i.inventario_armas_nombre ;";

   $resultado = conectar($Sentencia_sql);


    ?>
    <link rel="stylesheet" href="estilo_Inventario.css">
    <table class="grid-itemEstadisticas">
    <tr>
      <th>Nombre</th>
      <th>Velocidad</th>
      <th>Fuerza</th>
      <th>Agilidad</th>
      <th>ArmaDefault</th>
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
      echo "<td>";?>
      <div class ='check'>
        <form action="inventarioUsuario.php" method="post">
        <input type='radio' name='armasDefault' value="<?php $inventario["inventario_armas_nombre"]?>">

        <input type="submit" class="setear" value="Setear Arma Default"/>


        </form>
      </div>"
      <?php
      echo "</td>";
    echo "</tr>";

    }
    ?>

    </table>

    <?php




}

}
function setearArmaDefault($id_inventario){
  if ($_POST['armasDefault'] == "Martillo" ){
    $Sentencia_sql="update inventario_armas set ArmaDefault = '1' where (inventario_id =".$id_inventario.") and (inventario_armas_nombre = Martillo);";
    $resultado = conectar($Sentencia_sql);
  }else if () {
    $Sentencia_sql="update inventario_armas set ArmaDefault = '1' where (inventario_id =".$id_inventario.") and (inventario_armas_nombre = Espada);";
    $resultado = conectar($Sentencia_sql);
  }else if () {
    $Sentencia_sql="update inventario_armas set ArmaDefault = '1' where (inventario_id =".$id_inventario.") and (inventario_armas_nombre = Lanza);";
    $resultado = conectar($Sentencia_sql);
  }else{
    $Sentencia_sql="update inventario_armas set ArmaDefault = '1' where (inventario_id =".$id_inventario.") and (inventario_armas_nombre = Hacha);";
    $resultado = conectar($Sentencia_sql);
  }
}

}




 ?>
