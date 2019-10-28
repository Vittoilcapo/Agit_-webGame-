<!doctype html>

<html lang="es">

  <head>
    <meta charset="utf-8"
    <title>Ryan Login</title>
    <link rel="stylesheet" href="style.css">

  </head>

  <body>
    <form method="post" action="entrada.php">
    <link rel=stylesheet type="text/css" href=css/estilos.css>
    <div class="estilo_login">
      <div class="formulario">
     ingrese su correo

      <input type="text" name="campo_mail_html">
      <br>
      ingresar password

      <input type="password" name="campo_password_html">

  <br>
      <input type="submit" value="confirmar">
      <br>
      <a href="registrarPrincipal.php"> regitrarme </a>
    </div>
    </div>
    </form>

  </body>
  <footer>
    <div id= "error">
      <?php session_start();
      $_SESSION['error'] = ""?>
        <p><?php echo $_SESSION['error']; ?> </p>
    </div>
  </footer>
</html>
