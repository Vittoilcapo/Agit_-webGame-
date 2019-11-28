<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta charset="utf-8">
<link rel="stylesheet" href="css/seleccionbruto.css">
  <head>
    <title>Seleccionar campeones</title>

<form method="get" action="verskin.php">



<br>
<br>
<article>
    <div id="newells">
          <img src="img\newells.jpg" width="250" height="200"/>
          <br>
          <input id="botonnewells"  type="submit"  name="skin" value="newells" />

                </div>



            <div id="enanoboca">
                      <img src="img\enanoboca.png" width="250" height="200"/>
                      <br>
                      <input id="botonenano"  type="submit"  name="skin" value="enanoboca" />

                            </div>




                <div id="chinwenwencha">
                      <img src="img\chinwenwencha.jpg" width="250" height="200"/>
                                  <br>
                                <input id="botonchinwenwencha"  type="submit"  name="skin" value="chinwenwencha"/>

                                        </div>

</form >

<form method="post" action="tienda.php">
<input id="botonvolver"  type="submit"  name="volver" value="Volver"/>
</form>
<?php
require_once('usuario.php');
session_start();
include_once("connectBD.php");

echo $_SESSION['ClaseUsuario']->usuario_dinero;

/*$var=$_REQUEST[$usuario_dinero];
echo $var;*/
?>
</article>







  </head>
  <body>

  </body>
</html>
