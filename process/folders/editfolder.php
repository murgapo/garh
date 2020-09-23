<?php
    require_once "../../class/Folders.php";
    $Folders = new Folders();
    echo json_encode($Folders->editFolder($_POST['idFolder']));

?>