<?php

session_start(); //Inicia sesión

if (isset($_SESSION['user'])) {
    include "header.php"; //Inserta el encabezado en la página
?>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Gestor de Archivos</h1>
            <span class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarArchivos">
                <span class="fas fa-plus-circle"></span> Agregar Archivos
            </span>
            <hr>
            <div id="tableFilesManager"></div>
        </div>
    </div>

    <!-- Modal para agregar archivos-->
    <div class="modal fade" id="modalAgregarArchivos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Archivos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmAgregarArchivos" enctype="multipart/form-data" method="POST">
                        <label>Seleccione Carpeta:</label>
                        <div id="cargarCarpetas"></div>
                        <br>
                        <label>Seleccione archivos:</label>
                        <input type="file" name="archivos[]" id="archivos[]" class="form-control" multiple="">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnGuardarArchivos">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal visualizar archivos -->
    <div class="modal fade" id="visualizarArchivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Vista Previa de Archivo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="archivoObtenido">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>

    <?php
    include "footer.php"; //Insertar Pie de Página
    ?>

    <script src="../js/files.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#tableFilesManager').load("files/tablefile.php");
            $('#cargarCarpetas').load("folders/selectfolder.php");
            $('#btnGuardarArchivos').click(function() {
                agregarArchivos(); //Llama a la función JS
            });
        });
    </script>

<?php

} else {
    header("location:../index.php");
}

?>