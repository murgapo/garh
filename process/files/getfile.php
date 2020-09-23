<?php
    session_start();
    require_once "../../class/Files.php";
    $Files = new Files(); //Instancia de la clase Files.php
    $codigoArchivo = $_POST['codigoArchivo'];
    echo $Files->obtenerRutaArchivo($codigoArchivo);
?>