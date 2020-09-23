<?php
    session_start();

    require_once "../../class/Folders.php";
    
    $Folders = new Folders;

    $data = array(
            "idUser" => $_SESSION['idUser'],
            "folder" => $_POST['folder']
    );

    echo $Folders->addFolder($data);

?>