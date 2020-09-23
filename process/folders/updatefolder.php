<?php
    require_once "../../class/Folders.php";
    $Folders = new Folders(); //Creamos un objeto del tipo Folders
    $data = array("idFolder" => $_POST['idFolder'], "folderName" => $_POST['updateFolder']);
    echo $Folders->updateFolder($data);
?>