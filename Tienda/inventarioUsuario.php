<?php
include_once("connectBD.php");
class InventarioArmas{

  public $nombre_arma;
  public $agilidad;
  public $fuerza;
  public $velocidad;


  function obtenerInventario($id_inventario){
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

        <?php
        echo "<input type='radio' name='armasDefault' id='checkboxes' value='".$inventario["inventario_armas_nombre"]."' onclick='foo()'>";
        ?>


        </form>
      </div>
      <?php
      echo "</td>";
    echo "</tr>";

    }
    ?>

    </table>


    <script type="text/javascript">

    var checkbox = document.getElementById("checkboxes");
    function foo(){
      if(checkbox.checked){
        <?php setearArmaDefault($id_inventario);
        echo "hola";
        ?>
      };
    };
    </script>

<?php

}

}
function setearArmaDefault($id_inventario){
  if ("Martillo" == "Martillo" ){
    $Sentencia_sql="update inventario_armas set ArmaDefault = '1' where (inventario_id =".$id_inventario.") and (inventario_armas_nombre = Martillo);";
    $resultado = conectar($Sentencia_sql);
    echo "cambiado con exito";
  }else if ("Espada" == "Espada") {
    $Sentencia_sql="update inventario_armas set ArmaDefault = '1' where (inventario_id =".$id_inventario.") and (inventario_armas_nombre = Espada);";
    $resultado = conectar($Sentencia_sql);
    echo "cambiado con exito";
  }else if ($nombreArma == "Lanza") {
    $Sentencia_sql="update inventario_armas set ArmaDefault = '1' where (inventario_id =".$id_inventario.") and (inventario_armas_nombre = Lanza);";
    $resultado = conectar($Sentencia_sql);
  }else{
    $Sentencia_sql="update inventario_armas set ArmaDefault = '1' where (inventario_id =".$id_inventario.") and (inventario_armas_nombre = Hacha);";
    $resultado = conectar($Sentencia_sql);
  }
}

 ?>
