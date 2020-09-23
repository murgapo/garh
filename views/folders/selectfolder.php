<?php
    session_start(); //Iniciar sesión
    require_once "../../class/Connection.php";    
    $conn = new Connect(); //Instanciar la conexión
    $connection = $conn->connection();
    $idUser = $_SESSION['idUser'];
    $sql = "SELECT id_carpeta, nombre_carpeta FROM carpetas WHERE id_usuario = '$idUser'";
    $resultado = mysqli_query($connection, $sql);
?>

<select name="carpetaArchivos" id="carpetaArchivos" class="form-control">

    <?php
        while ($mostrar = mysqli_fetch_array($resultado)) {   
            $idFolder = $mostrar['id_carpeta'];                
    ?>

            <option value="<?php echo $idFolder ?>">
                <?php
                    echo $mostrar['nombre_carpeta'];
                ?>
            </option>

    <?php
        }
    ?>
    
</select>