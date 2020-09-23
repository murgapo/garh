<?php
    session_start(); //Inicio de sesión
    if (isset($_SESSION['user'])) {
        include "header.php";
?>

    <div class="container">
        <div class="row">
            <div class="col-sm-12"></div>
        </div>
    </div>

<?php
        include "footer.php";
    }else {
        header("location:../index.php");
    }
?>