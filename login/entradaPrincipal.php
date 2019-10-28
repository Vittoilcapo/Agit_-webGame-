<html>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/login-estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            background-color: #303641;
        }
    </style>
</head>

<body>
    <div id="container-login">
        <div id="title">
            <i class="material-icons lock">lock</i> Login
        </div>

        <form>
            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">face</i>
                </div>
                <input id="username" placeholder="Username" type="text" required class="validate" autocomplete="off" name="campo_mail_html">
            </div>

            <div class="clearfix"></div>

            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">vpn_key</i>
                </div>
                <input id="password" placeholder="Password" type="password" required class="validate" autocomplete="off" name="campo_password_html">
            </div>

            <input type="submit" value="Log In" />
        </form>

        <div class="forgot-password">
            <a href="#">Forgot your password? NO ANDA</a>
        </div>

        <div class="register">
            No tienes una cuenta aun?
            <a href="registrarPrincipal.php"><button id="register-link">Registrarse</button></a>
        </div>
    </div>
    <footer>
      <div id= "error">
        <?php session_start();
        $_SESSION['error'] = ""?>
          <p><?php echo $_SESSION['error']; ?> </p>
      </div>
    </footer>
</body>

</html>
