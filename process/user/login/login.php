<?php
    session_start(); //Iniciar sesión
    require_once "../../../class/User.php";
    $user = $_POST['login']; //Esto viene del formulario index.php
    $pass = sha1($_POST['password']); //Esto viene del formulario index.php
    $userObject = new User();
    echo $userObject->login($user, $pass);
?>