<?php

    session_start(); //Iniciar sesión
    require_once "../../class/Files.php";
    $Files = new Files(); //Instancia de la clase Files.php
    $codigoArchivo = $_POST['codigoArchivo'];
    $codigoUsuario = $_SESSION['idUser'];
    $nombreArchivo = $Files->obtenerNombreArchivo($codigoArchivo);
    $rutaEliminarArchivo = "../../server/" . $codigoUsuario . "/" . $nombreArchivo;
             
    if (unlink($rutaEliminarArchivo)) {
        echo $Files->eliminarRegistroArchivo($codigoArchivo);
    } else {
        echo 0;
    }
    
?>
