<html>

<head>
    <meta charset="UTF-8">
    <title>Registrarse</title>
    <link rel="stylesheet" href="css/login-estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            background-color: #303641;
        }
    </style>
</head>

<body>
    <div id="container-register">
        <div id="title">
            <i class="material-icons lock">lock</i> Register
        </div>

        <form method="post" action="proceso_registro.php">
            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">email</i>
                </div>
                <input id="email" placeholder="Email" type="email" required class="validate" autocomplete="off" name="campo_mail_ingresado" >
            </div>

            <div class="clearfix"></div>

            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">face</i>
                </div>
                <input id="username" placeholder="Username" type="text" required class="validate" autocomplete="off" name= "campo_usuario_html">
            </div>

            <div class="clearfix"></div>

            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">vpn_key</i>
                </div>
                <input id="password" placeholder="Password" type="password" required class="validate" autocomplete="off" name= "campo_password_html">
            </div>

            <input type="submit" value="Registrar" />
        </form>


        <div class="register">
            Ya tienes una cuenta?

        </div>
        <div><a href="entradaPrincipal.php"><button id="register-link">Log In</button></a></div>
    </div>
    <footer>
      <div id= "error">
        <?php session_start();?>
          <p><?php echo $_SESSION['error']; ?> </p>
      </div>
    </footer>
</body>

</html>
