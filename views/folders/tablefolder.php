<?php
session_start();
require_once "../../class/Connection.php";
$idUser = $_SESSION['idUser'];
$connection = new Connect();
$connection = $connection->connection();
?>

<div class="table-responsive">
    <table class="table table-hover table-dark table-sm" id="tableFolderDataTable">
        <thead>
            <tr style="text-align: center">
                <th>Nombre de carpeta</th>
                <th>Fecha/Hora de creación</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>

        </thead>
        <tbody>

            <?php
            $sql = "SELECT id_carpeta, nombre_carpeta, fecha_creacion FROM carpetas WHERE id_usuario = '$idUser'";
            $result = mysqli_query($connection, $sql);
            while ($show = mysqli_fetch_array($result)) {
                $idFolder = $show['id_carpeta'];
            ?>

                <tr style="text-align: center">
                    <td>
                        <?php
                        echo $show['nombre_carpeta']
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $show['fecha_creacion']
                        ?>
                    </td>
                    <!-- Botón para editar carpetas -->
                    <td>
                        <span class="btn btn-warning btn-sm" 
                            onclick="editFolder('<?php echo $idFolder ?>')" 
                            data-toggle="modal" data-target="#modalEditarCarpeta">
                            <span class="far fa-edit"></span>
                        </span>
                    </td>
                    <!-- Botón para eliminar carpetas -->
                    <td>
                        <span class="btn btn-danger btn-sm" 
                            onclick="deleteFolder('<?php echo $idFolder ?>')">
                            <span class="far fa-trash-alt"></span>
                        </span>
                    </td>
                </tr>

            <?php
            } //Aquí se cierra el WHILE
            ?>
        </tbody>
    </table>
</div>

<!-- Cambiar el formato de la tabla -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#tableFolderDataTable').dataTable();
    });
</script>