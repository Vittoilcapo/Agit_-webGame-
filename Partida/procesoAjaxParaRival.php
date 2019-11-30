<?php

include_once('rival.php');
include_once('../Tienda/usuario.php');
session_start();
$ClaseRival = $_SESSION['ClaseRival'];
$totalDeDaño = 0;
$VaApegar= 0;


///////////////////////aca va a pegar/////////////////////////////
function golpear($ClaseRival){

      $puntoCritico = rand(1,5);

      $fuerzaRival = $ClaseRival->fuerza;

      $puntosDelGolpe = $puntoCritico * $fuerzaRival;

      return $puntosDelGolpe;
}
///////////////////////////////////////////////////////////////////
echo "El rival ataca...";
echo "<br>";
$velocidadRival= $ClaseRival->velocidad;
$cantidadGolpes = rand(1,10);
$cantGolpesA_pegar= $velocidadRival * $cantidadGolpes;
////////////voy a obtener la agilidad
$agilidadUsuario = $_SESSION['ClaseUsuario']->agilidad;

////////////////////////////////////////////

//////////////Calculo los golpes que va a esquivar//////////////////
$cantidadGolpesTotalTotal = $cantGolpesA_pegar - $agilidadUsuario   ;

                if ($cantidadGolpesTotalTotal <= 0) {
                  echo "<br>";
                  echo "No pegara, esquivan todos los golpes...";
                  echo "<br>";
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
                        }else {
////////////////////////////////// VA A HACER LOS GOLPES ////////////////////////
                              $i = 1;
                              $VaApegar = $cantidadGolpesTotalTotal - $golpesEsquivados;
                                    while ($i <= $VaApegar) {
                                      $dañoDeGolpes = golpear($ClaseRival);
                                      $totalDeDaño = $totalDeDaño + $dañoDeGolpes;
                                      $i++;
                                    }
                                }
                  }


if ($totalDeDaño==0) {
    echo "<br>";
    echo "No infigiste daño";
    echo "<br>";
}else {
    echo "<br>";
    echo "Daño total causado =". $totalDeDaño;
    echo "<br>";

    $_SESSION['vidaUsuario'] = $_SESSION['vidaUsuario'] - $totalDeDaño;

    ?>
    <script type="text/javascript">
        document.getElementById('ganaRival').style.display = 'block';
    </script>

    <?php


}
echo $_SESSION['vidaUsuario'];
///////////////////////////////////////////////////////////////////////////
 ?>
