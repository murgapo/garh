<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registrar usuario</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="librarys/bootstrap4/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Registrar usuario</h1>
        <hr>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form id="FrmRegister" method="POST" onsubmit="return addNewUser()" autocomplete="off">
                    <label>Nombre personal</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required=""></input>
                    <label>Puesto/Departamento</label>
                    <input type="text" name="puesto" id="puesto" class="form-control" required=""></input>
                    <label>Correo electrónico</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="@tecnolac.com.gt" required=""></input>
                    <label>Nombre de usuario</label>
                    <input type="text" name="user" id="user" class="form-control" required=""></input>
                    <label>Contraseña</label>
                    <input type="password" name="pass" id="pass" class="form-control" required=""></input>
                    <br>
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <button class="btn btn-primary">Registrar usuario</button>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="index.php" class="btn btn-success">Iniciar sesión</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
    <script src="librarys/jquery.min.js"></script>
    <script src="librarys/sweetalert.min.js"></script>
   
    <script type="text/javascript">
        function addNewUser() {
            $.ajax({
                method: "POST",
                data: $('#FrmRegister').serialize(),
                url: "process/user/register/addUser.php",
                success: function(answer) {
                    answer = answer.trim(); /*La función trim() quita los espacios del lado izquierdo y derecho*/
                    if (answer == 1) {
                        $("#FrmRegister")[0].reset();
                        swal("Exito", "El usuario ha sido agregrado", "success"); /*Función de JQuery*/
                    } else if (answer == 2) {
                        swal("Uups", "Este usuario ya existe, intente con otro","info"); /*Función de JQuery*/
                    } else {
                        swal("Uups", "Ocurrió un error", "error"); /*Función de JQuery*/
                    }
                }
            });

            return false;
        }
    </script>
</body>

</html>