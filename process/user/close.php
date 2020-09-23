<?php
    session_start(); //Iniciar sesión
    session_destroy();  //Cerrar sesión
    header("location:../../index.php");
?>