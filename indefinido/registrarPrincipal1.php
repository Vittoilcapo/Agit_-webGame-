<!DOCTYPE html>
<body>
<form method="post" action="proceso_registro.php">

  R E G I S T R A R M E
  <br>
  <br>
            ingrese su usuario

  <input type="text" name="campo_usuario_html">
  <br>
  ingresar password

  <input type="password" name="campo_password_html">
  <br>
  ingrese correo
  <input type="text" name="campo_mail_ingresado">
  <br>
  <input type="submit" value="registrar">
  <br>
<a href="entradaPrincipal.php"> volver al menu </a>
</body>

<footer>
  <div id= "error">
    <?php session_start();?>
      <p><?php echo $_SESSION['error']; ?> </p>
  </div>
</footer>

</form>
