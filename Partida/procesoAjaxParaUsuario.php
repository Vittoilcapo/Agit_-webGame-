<?php

include_once('rival.php');
include_once('../Tienda/usuario.php');
session_start();
$ClaseUsuario = $_SESSION['ClaseUsuario'];
$totalDeDaño = 0;
$VaApegar= 0;

///////////////////////aca va a pegar/////////////////////////////
function golpear($ClaseUsuario){

      $puntoCritico = rand(1,5);

      $fuerzaUsuario = $ClaseUsuario->fuerza;

      $puntosDelGolpe = $puntoCritico * $fuerzaUsuario;

      return $puntosDelGolpe;
}
///////////////////////////////////////////////////////////////////
echo "Tu turno de atacar...";
echo "<br>";
$velocidadUsuario= $ClaseUsuario->velocidad;
$cantidadGolpes = rand(1,10);
$cantGolpesA_pegar= $velocidadUsuario * $cantidadGolpes;
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
                              $VaApegar = $cantidadGolpesTotalTotal - $golpesEsquivados;
                                    while ($i <= $VaApegar) {
                                      $dañoDeGolpes = golpear($ClaseUsuario);
                                      $totalDeDaño = $totalDeDaño + $dañoDeGolpes;
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
    $_SESSION['vidaRival'] = $_SESSION['vidaRival'] - $totalDeDaño;

    $_SESSION['DañoTotalUsuario'] = $_SESSION['DañoTotal'] + $totalDeDaño;

    $DañoTotal = $_SESSION['DañoTotalUsuario'];

    if ($_SESSION['vidaRival'] <= 0 ) {
      ?>
      <script type='text/javascript'>

      window.location.href = 'insertarDatosPartida.php?Ganador=Usuario&Daño='+<?php echo $DañoTotal; ?>;

      </script>";
      <?php
    }else{
    echo "la vida del rival es:";
    echo "<br>";
    echo $_SESSION['vidaRival'];
    ?>
    <script type="text/javascript">

        setTimeout(pegar2,3000);

    </script>
    <?php
    }
}
///////////////////////////////////////////////////////////////////////////
 ?>
