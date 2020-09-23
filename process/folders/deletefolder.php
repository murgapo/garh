<?php
    session_start(); //Iniciar sesión
    require_once "../../class/Folders.php"; //Invocar a la clase Folders.php
    $Folders = new Folders(); //Crear objeto del tipo Folders
    echo $Folders->deleteFolder($_POST['idFolder']);
?>