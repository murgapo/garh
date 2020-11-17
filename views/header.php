<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="../img/favicon.png">
    <title>Gestor de archivos RRHH</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../librarys/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" href="../librarys/fontawesome/css/all.css">
    <link rel="stylesheet" href="../librarys/datatables/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../css/begin.css" type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Oswald&display=swap">
</head>

<body style="background-color: #e9ecef">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
            <a class="navbar-brand" href="begin.php">
                <h2>Tecnolac S.A.</h2>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">

                    <!-- Botón Inicio -->
                    <li class="nav-item active">
                        <a class="nav-link" href="begin.php"> <span class="fas fa-home"></span> Inicio
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>

                    <!-- Botón Carpetas -->
                    <li class="nav-item">
                        <a class="nav-link" href="folders.php"><span class="fas fa-folder-open"></span> Carpetas</a>
                    </li>

                    <!-- Botón Archivos -->
                    <li class="nav-item">
                        <a class="nav-link" href="files.php"><span class="fas fa-copy"></span> Archivos</a>
                    </li>

                    <!-- Botón Salir -->
                    <li class="nav-item">
                        <a class="nav-link" href="../process/user/close.php"> <span class="fas fa-power-off"></span> Salir</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>