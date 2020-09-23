<!DOCTYPE html>
<html lang="es">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="librarys/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">

            <!-- Icon -->
            <div class="fadeIn first">
                <img src="img/logosj.png" id="icon" alt="San Julián" />
                <h1>Gestor de Archivos RH</h1>
            </div>

            <!-- Login Form -->
            <form method="POST" id="FrmLogin" onsubmit="return userLogin()" autocomplete="off">
                <input type="text" id="login" class="fadeIn second" name="login" placeholder="Usuario" required="">
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="Contraseña" required="">
                <input type="submit" class="fadeIn fourth" value="ENTRAR">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="register.php">Registrar usuario</a>
            </div>

        </div>
    </div>

    <script src="librarys/jquery.min.js"></script>
    <script src="librarys/sweetalert.min.js"></script>
    
    <script type="text/javascript">

        function userLogin() {
            $.ajax({
                type: "POST",
                data: $('#FrmLogin').serialize(),
                url:"process/user/login/login.php",
                success: function(answer) {

                    answer = answer.trim(); //Quitar espacios del lado izquierdo o derecho
                    if (answer == 1) {
                        window.location = "views/begin.php"
                    }else{
                        swal("Uups", "¡Ocurrió un error!", "error");
                    }
                }
            });

            return false; /*Detener el flujo*/

        }

    </script>

</body>

</html>