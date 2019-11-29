<?php
$_SESSION['dineroUsuario'] = "<p class='dinero'>Dispones de $</p>";
//include_once("../login/ValidarLogin.php");
//$usuario=$_SESSION['ClaseUsuario'];
//echo $usuario;
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta charset="utf-8">
<link rel="stylesheet" href="seleccionSkin.css">
  <head>
    <title>Seleccionar campeones</title>


  </head>
    <body class="fondoSkin">
<center>

<form method="get" action="verskin.php">



<br>
<br>

    <div id="newells">
          <img src="img\newellspng.png" width="250" height="200"/>

          <input id="botonnewells"  type="submit"  name="skin" value="newells" />


                      <img src="img\enanoboca.png" width="250" height="200"/>

                      <input id="botonenano"  type="submit"  name="skin" value="enanoboca" />


                      <img src="img\chinwenwenchapng.png" width="250" height="200"/>

                                <input id="botonchinwenwencha"  type="submit"  name="skin" value="chinwenwencha"/>

                                        </div>

</form >

<form method="post" action="tienda.php">
<input id="botonvolver"  type="submit"  name="volver" value="Volver"/>
</form>
<center>
<?php

//session_start();
$_SESSION['skinInvalido'] = "<p class='error1'>Usted ya compró este skin</p>";

$_SESSION['skinValido'] = "<p class='valido'>Compra realizada con éxito</p>";
?>
</center>

  </body>


</html>
