<?php
    // print_r($_FILES); para pruebas    
    session_start(); //Iniciar sesión       
    require_once "../../class/Files.php";    
    $Files = new Files(); //Instancia de la clase Files.php
    $idFolder = $_POST['carpetaArchivos'];
    $idUser = $_SESSION['idUser'];

    if ($_FILES["archivos"]['size'] > 0) {
        $carpetaUsuario = '../../server/'.$idUser; //Almacenamiento de archivos

        if (!file_exists($carpetaUsuario)) {
            mkdir($carpetaUsuario, 0777, true);
        }

        $totalArchivos = count($_FILES['archivos']['name']);

        for ($i=0; $i < $totalArchivos; $i++) { 

            $nombreArchivo = $_FILES['archivos']['name'][$i]; //Nombre del archivo
            $explode = explode('.', $nombreArchivo);
            $tipoArchivo = array_pop($explode); //Extensión del archivo
            $rutaAlmacenamiento = $_FILES['archivos']['tmp_name'][$i]; //Ruta de almacenamiento           
            $rutaFinal = $carpetaUsuario."/".$nombreArchivo;  //Almacenamiento de archivos
            
            $datosRegistroArchivo = array(
                                    "idUsuario" => $idUser,
                                    "idCarpeta" => $idFolder,
                                    "nombreArchivo" => $nombreArchivo,
                                    "tipoArchivo" => $tipoArchivo,
                                    "rutaArchivo" => $rutaFinal
            );

            if (move_uploaded_file($rutaAlmacenamiento, $rutaFinal)) {
                $respuesta = $Files -> agregarRegistroArchivo($datosRegistroArchivo);
            }                
        }
    echo $respuesta;
    } else {
        echo 0;
    }
