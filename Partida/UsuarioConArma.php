<?php

include_once('rival.php');
include_once('../Tienda/usuario.php');
include_once('../Tienda/connectBD.php');
session_start();
$ClaseUsuario = $_SESSION['ClaseUsuario'];
$totalDeDaño = 0;
$VaApegar= 0;

$sql = "select inventario_armas_velocidad as velocidad, inventario_armas_fuerza as fuerza, inventario_armas_agilidad as agilidad from inventario_armas where armasDefault = 1 and inventario_id = ".$ClaseUsuario->inventario_id." ;";
$resultado = conectar($sql);

    while ($result = mysqli_fetch_array($resultado)) {
      $fuerza= $result["fuerza"];
      $velocidad = $result["velocidad"];
      $agilidad = $result['agilidad'];
    }

///////////////////////aca va a pegar/////////////////////////////
function golpear($ClaseUsuario,$fuerzaArma){

      $puntoCritico = rand(1,5);

      $fuerzaUsuario = $ClaseUsuario->fuerza;

      $puntosDelGolpe = $puntoCritico * $fuerzaUsuario;

      $dañoDeGolpesMasArma = $puntosDelGolpe * $fuerzaArma;

      $dañoDeArma = $dañoDeGolpesMasArma - $puntosDelGolpe;


      return array($dañoDeGolpesMasArma, $dañoDeArma);
}
///////////////////////////////////////////////////////////////////
echo "Tu turno de atacar con tu arma...";
echo "<br>";
$velocidadUsuario= $ClaseUsuario->velocidad;
$cantidadGolpes = rand(1,10);
$cantGolpesA_pegar= $velocidadUsuario * $cantidadGolpes + $velocidad;
////////////voy a obtener la agilidad
$agilidadRival = $_SESSION['ClaseRival']->agilidad;

////////////////////////////////////////////

//////////////Calculo los golpes que va a esquivar//////////////////
$cantidadGolpesTotalTotal = $cantGolpesA_pegar - $agilidadRival   ;

                if ($cantidadGolpesTotalTotal <= 0) {
                  echo "<br>";
                  echo "No pegaras, te esquivan todos los golpes...";
                  echo "<br>";
                  ?>
                  <script type="text/javascript">

                      setTimeout(pegar2,3000);

                  </script>
                  <?php
                  $golpesEsquivados = 0;
                }else {
                  $golpesEsquivados = $cantGolpesA_pegar - $cantidadGolpesTotalTotal;

////////////////////////////////////////////////////////////////
                  echo "Pega ".$cantidadGolpesTotalTotal." golpes" ;
                  echo "<br>";
                  echo "Esquiva ".$golpesEsquivados." golpes" ;
                  echo "<br>";



                        if ($golpesEsquivados == $cantidadGolpesTotalTotal ) {
                          echo "<br>";
                          echo "EL GOLPE FUE ESQUIVADO COMPLETAMENTE";
                          echo "<br>";
                          ?>
                          <script type="text/javascript">

                              setTimeout(pegar2,3000);

                          </script>
                          <?php
                        }else {
////////////////////////////////// VA A HACER LOS GOLPES ////////////////////////
                              $i = 1;
                              $dañoDeArma = 0;
                              $VaApegar = $cantidadGolpesTotalTotal - $golpesEsquivados;
                                    while ($i <= $VaApegar) {
                                      $dañoDeGolpes = golpear($ClaseUsuario,$fuerza);
                                      $totalDeDaño = $totalDeDaño + $dañoDeGolpes[0];
                                      $dañoDeArma = $dañoDeArma + $dañoDeGolpes[1];
                                      $i++;
                                    }
                                }
                  }


if ($totalDeDaño==0) {
    echo "<br>";
    echo "No infigiste daño";
    echo "<br>";
    ?>
    <script type="text/javascript">

        setTimeout(pegar2,3000);

    </script>
    <?php
}else {
    echo "<br>";
    echo "Daño total causado =". $totalDeDaño;
    echo "<br>";
    echo "<br>";
    echo "Daño de arma causado =". $dañoDeArma;
    echo "<br>";
    $_SESSION['vidaRival'] = $_SESSION['vidaRival'] - $totalDeDaño;

    $_SESSION['DañoTotalUsuario'] = $_SESSION['DañoTotalUsuario'] + $totalDeDaño;

    $DañoTotal = $_SESSION['DañoTotalUsuario'];

    if ($_SESSION['vidaRival'] <= 0 ) {
      ?>
      <script type='text/javascript'>

      window.location.href = 'insertarDatosPartida.php?Ganador=Usuario&Daño='+<?php echo $DañoTotal; ?>;

      </script>
      <?php
    }else{
    ?>

    <script type="text/javascript">
        document.getElementById('vidaRival').value = "<?php echo $_SESSION['vidaRival']; ?>";
        setTimeout(pegar2,3000);

    </script>

    <?php
    }
}
///////////////////////////////////////////////////////////////////////////
 ?>
