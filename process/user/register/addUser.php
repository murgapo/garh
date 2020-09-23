<?php

    require_once "../../../class/User.php";

    $pass = sha1($_POST['pass']); //Encriptar la contraseña
    $data = array(
        "name" => $_POST['nombre'],
        "position" => $_POST['puesto'],
        "email" => $_POST['email'],
        "user" => $_POST['user'],
        "pass" => $pass 
    );

    $user = new User();
    echo $user->addUser($data);

?>
