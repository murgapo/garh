<?php
session_start(); //Inicio de sesión
if (isset($_SESSION['user'])) {
    include "header.php";
?>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Administrar Carpetas</h1>

            <div class="row">
                <div class="col-sm-4">
                    <span class="btn btn-primary" data-toggle="modal" data-target="#modalAgregaCarpeta">
                        <span class="fas fa-plus-circle"></span> Agregar nueva Carpeta
                    </span>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-sm-12">
                    <div id="tableFoldersManager"></div>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal para agregar una nueva Carpeta -->
    <div class="modal fade" id="modalAgregaCarpeta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar nueva Carpeta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="frmFolders">
                        <label for="nameFolder">Nombre de la Carpeta:</label>
                        <input type="text" name="nameFolder" id="nameFolder" class="form-control">
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnSaveFolder">Guardar</button>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal para actualizar una Carpeta-->
    <div class="modal fade" id="modalEditarCarpeta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Carpeta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="frmUpdateFolder">
                        <input type="text" id="idFolder" name="idFolder" hidden="">
                        <label for="updateFolder">Carpeta</label>
                        <input type="text" id="updateFolder" name="updateFolder" class="form-control">
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCloseUpdateFolder">Cerrar</button>
                    <button type="button" class="btn btn-warning" id=btnUpdateFolder>Actualizar</button>
                </div>

            </div>
        </div>
    </div>

    <?php
    include "footer.php";
    ?>

    <!-- Dependencia de Carpetas, todas las funciones js de carpetas  -->
    <script src="../js/folders.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#tableFoldersManager').load("folders/tablefolder.php");

            //Programar el boton Guardar
            $('#btnSaveFolder').click(function() {
                addFolder(); //Llama a la función addFolder (JavaScript)
            });

            //Programar el botón Actualizar
            $('#btnUpdateFolder').click(function() {
                updateFolder(); //Llama a la función updateFolder (JavaScript)
            });

        });
    </script>

<?php
} else {
    header("location:../index.php");
}
?>