<?php
 
use function PHPSTORM_META\type;

require_once "Connection.php";

class Files extends Connect
{
    public function agregarRegistroArchivo($data)
    {
        $connection = Connect::connection();
        $sql = "INSERT INTO archivos (id_usuario, id_carpeta, nombre_archivo, tipo, ruta) VALUES (?, ?, ?, ?, ?)";
        $query = $connection->prepare($sql);
        $query->bind_param(
            "iisss",
            $data['idUsuario'],
            $data['idCarpeta'],
            $data['nombreArchivo'],
            $data['tipoArchivo'],
            $data['rutaArchivo']
        );
        $respuesta = $query->execute(); //Ejecuta consulta SQL
        $query->close(); //Cierra conexión
        return $respuesta;
    }

    public function obtenerNombreArchivo($codigoArchivo)
    {
        $connection = Connect::connection();
        $sql = "SELECT nombre_archivo FROM archivos WHERE id_archivo = '$codigoArchivo'";
        $resultado = mysqli_query($connection, $sql);
        return mysqli_fetch_array($resultado)['nombre_archivo'];
    }

    public function eliminarRegistroArchivo($codigoArchivo)
    {
        $connection = Connect::connection();
        $sql = "DELETE FROM archivos WHERE id_archivo = ?";
        $query = $connection->prepare($sql);
        $query->bind_param('i', $codigoArchivo);
        $respuesta = $query->execute();
        $query->close();
        return $respuesta;
    }

    public function obtenerRutaArchivo($codigoArchivo)
    {
        $connection = Connect::connection();
        $sql = "SELECT nombre_archivo, tipo FROM archivos WHERE id_archivo = '$codigoArchivo'";
        $resultado = mysqli_query($connection, $sql);
        $datos = mysqli_fetch_array($resultado);
        $nombreArchivo = $datos['nombre_archivo'];
        $extension = $datos['tipo'];
        return self::extensionArchivo($nombreArchivo, $extension);
    }

    public function extensionArchivo($nombre, $extension)
    {
        $idUser = $_SESSION['idUser']; //Variable que trae el Usuario que inició sesión
        $ruta = "../server/".$idUser."/".$nombre;
        switch ($extension) {
            case 'png':
                return '<img style="width:100%" src="'.$ruta.'">';
                break;
            case 'jpg':
                return '<img style="width:100%" src="' . $ruta . '">';
                break;
            case 'jpeg':
                return '<img style="width:100%" src="' . $ruta . '">';
                break;
            case 'pdf':
                return '<embed src="' . $ruta . '#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="420px" />';
                break;
            case 'xml':
                return '<embed src="' . $ruta . '#toolbar=0&navpanes=0&scrollbar=0" type="text/xml" width="100%" height="420px" />';
                break;
            case 'txt':
                return '<embed src="' . $ruta . '#toolbar=0&navpanes=0&scrollbar=0" type="text/text" width="100%" height="420px" />';
                break;
            case 'docx':
                $url = file_get_contents("https://onlinedocumentviewer.com/Viewer/?output=html&udptype=trap&udpmsgid=" . $ruta . "&content=udpmessage");
                echo $url;
                //return '<iframe src="https://onlinedocumentviewer.com/Viewer/?'.$url.'" width="100%" height="400px"></iframe>';           
                break;              
            default:
                # code...
                break;
        }
    }    
}
?>