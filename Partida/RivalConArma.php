<?php
include_once('rival.php');
include_once('../Tienda/usuario.php');
include_once('../Tienda/connectBD.php');
session_start();
$ClaseRival = $_SESSION['ClaseRival'];
$totalDeDaño = 0;
$VaApegar= 0;


$sql = "select inventario_armas_velocidad as velocidad, inventario_armas_fuerza as fuerza, inventario_armas_agilidad as agilidad from inventario_armas where armasDefault = 1 and inventario_id = ".$ClaseRival->inventario_id." ;";
$resultado = conectar($sql);

    while ($result = mysqli_fetch_array($resultado)) {
      $fuerza= $result["fuerza"];
      $velocidad = $result["velocidad"];
      $agilidad = $result['agilidad'];
    }

    function golpear($ClaseRival,$fuerzaArma){

          $puntoCritico = rand(1,5);

          $fuerzaRival = $ClaseRival->fuerza;

          $puntosDelGolpe = $puntoCritico * $fuerzaRival;

          $dañoDeGolpesMasArma = $puntosDelGolpe * $fuerzaArma;

          $dañoDeArma = $dañoDeGolpesMasArma - $puntosDelGolpe;


          return array($dañoDeGolpesMasArma, $dañoDeArma);
    }
    ///////////////////////////////////////////////////////////////////
    echo "El rival ataca con el arma...";
    echo "<br>";
    $velocidadRival= $ClaseRival->velocidad;
    $cantidadGolpes = rand(1,10);
    $cantGolpesA_pegar= $velocidadRival * $cantidadGolpes + $velocidad;
    ////////////voy a obtener la agilidad
    $agilidadUsuario = $_SESSION['ClaseUsuario']->agilidad;

    ////////////////////////////////////////////

    //////////////Calculo los golpes que va a esquivar//////////////////
    $cantidadGolpesTotalTotal = $cantGolpesA_pegar - $agilidadUsuario   ;

                    if ($cantidadGolpesTotalTotal <= 0) {
                      echo "<br>";
                      echo "No pegara, esquivan todos los golpes...";
                      echo "<br>";
                      ?>
                      <script type="text/javascript">

                          setTimeout(pegar,3000);

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

                                  setTimeout(pegar,3000);

                              </script>
                              <?php
                            }else {
    ////////////////////////////////// VA A HACER LOS GOLPES ////////////////////////
                                  $i = 1;
                                  $dañoDeArma = 0;
                                  $VaApegar = $cantidadGolpesTotalTotal - $golpesEsquivados;
                                        while ($i <= $VaApegar) {
                                          $dañoDeGolpes = golpear($ClaseRival,$fuerza);
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

            setTimeout(pegar,3000);

        </script>
        <?php
    }else {
            echo "<br>";
            echo "Daño total causado =". $totalDeDaño;
            echo "<br>";
            echo "<br>";
            echo "Daño de arma causado =". $dañoDeArma;
            echo "<br>";

            $_SESSION['vidaUsuario'] = $_SESSION['vidaUsuario'] - $totalDeDaño;

            $_SESSION['DañoTotal'] = $_SESSION['DañoTotal'] + $totalDeDaño;

            $DañoTotal = $_SESSION['DañoTotal'];

            $DañoTotalUsuario = $_SESSION['DañoTotalUsuario'];

                if ($_SESSION['vidaUsuario'] <= 0 ) {
                      ?>
                        <script type='text/javascript'>
                        window.location.href = 'pierdes.php?Ganador=Rival&Daño='+<?php echo $DañoTotalUsuario; ?>;
                        </script>
                        <?php
                }else {
                  ?>
                  <script type="text/javascript">
                  document.getElementById('vidaUsuario').value = "<?php echo $_SESSION['vidaUsuario']; ?>";

                  setTimeout(pegar,3000);

                  </script>
                  <?php
            }
    }

 ?>
