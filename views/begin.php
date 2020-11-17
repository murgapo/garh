<?php
session_start(); //Inicio de sesión
if (isset($_SESSION['user'])) {
    include "header.php";
?>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="titulos">Gestor de Archivos</h1>
                <h3 class="titulos">Recursos Humanos</h3>
            </div>
        </div>
    </div>

    <!-- *** Reloj *** -->
    <div class="wrap">
        <div class="widget">
            <div class="fecha">
                <p id="diaSemana" class="diaSemana"></p>
                <p id="dia" class="dia"></p>
                <p>de </p>
                <p id="mes" class="mes"></p>
                <p>del </p>
                <p id="year" class="year"></p>
            </div>
            <div class="reloj">
                <p id="horas" class="horas"></p>
                <p>:</p>
                <p id="minutos" class="minutos"></p>
                <p>:</p>
                <div class="caja-segundos">
                    <p id="ampm" class="ampm"></p>
                    <p id="segundos" class="segundos"></p>
                </div>
            </div>
        </div>
        <div class="version">
            <p>Versión 1.1</p>
        </div>

    </div>


<?php
    include "footer.php";
} else {
    header("location:../index.php");
}
?>