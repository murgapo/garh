<?php
session_start(); //Inicia sesión
require_once "../../class/Connection.php";
$conexion = new Connect(); //Variable de conexión a la DB
$connection = $conexion->connection();
$idUser = $_SESSION['idUser']; //Variable que trae el Usuario que inició sesión
$sql = "SELECT 
                id_archivo as codigoArchivo,
                usuarios.nombre as nombreUsuario,
                carpetas.nombre_carpeta as nombreCarpeta,
                nombre_archivo as nombreArchivo,
                fecha_registro as fechaRegistro,
                ruta as rutaArchivo,
                tipo as extension
            FROM
                archivos
                    INNER JOIN
                usuarios ON archivos.id_usuario = usuarios.id_usuario
                    INNER JOIN
                carpetas ON archivos.id_carpeta = carpetas.id_carpeta
                    AND archivos.id_usuario = '$idUser'";
$resultado = mysqli_query($connection, $sql);
?>

<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table table-hover table-dark table-sm" id="tableFileDataTable">
                <thead>
                    <tr style="text-align: center">
                        <th>Carpeta</th>
                        <th>Nombre de archivo</th>
                        <th>Fecha de registro</th>
                        <th>Visualizar</th>
                        <th>Descargar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Inicia código PHP -->
                    <?php

                    // Arreglo para validar extensiones permitidas en el visualizador

                    $extensionesValidas = array('png', 'jpg', 'jpeg', 'pdf', 'xml', 'txt', 'docx', 'doc');

                    while ($mostrar = mysqli_fetch_array($resultado)) {
                        $rutaDescarga = "../server/" . $idUser . "/" . $mostrar['nombreArchivo'];
                        $nombreArchivo = $mostrar['nombreArchivo'];
                        $codigoArchivo = $mostrar['codigoArchivo'];
                    ?>

                        <tr style="text-align: center">
                            <td>
                                <?php
                                echo $mostrar['nombreCarpeta'];
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $mostrar['nombreArchivo'];
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $mostrar['fechaRegistro'];
                                ?>
                            </td>
                            <td>
                                <!-- Validar la Extensión del archivo -->
                                <?php
                                for ($i = 0; $i < count($extensionesValidas); $i++) {
                                    if ($extensionesValidas[$i] == $mostrar['extension']) {
                                ?>
                                        <!-- Botón para visualizar archivos -->
                                        <span class="btn btn-info btn-sm"
                                                data-toggle="modal"
                                                data-target="#visualizarArchivo"
                                                onclick="obtenerArchivoID('<?php echo $codigoArchivo ?>')">
                                            <span class=" far fa-eye"></span>
                                        </span>
                                <?php
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <!-- Enlace para descargar archivos -->
                                <a href="<?php echo $rutaDescarga; ?>" download="<?php echo $nombreArchivo; ?>" class="btn btn-success btn-sm">
                                    <span class="fas fa-download"></span>
                                </a>
                            </td>
                            <td>
                                <!-- Botón para eliminar archivos -->
                                <span class="btn btn-danger btn-sm" onclick="eliminarArchivos ('<?php echo $codigoArchivo; ?>')">
                                    <span class="far fa-trash-alt"></span>
                                </span>
                            </td>
                        </tr>

                    <?php
                    }
                    ?>
                    <!-- Finaliza código PHP -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Cambiar el formato de la tabla -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#tableFileDataTable').dataTable();
    });
</script>