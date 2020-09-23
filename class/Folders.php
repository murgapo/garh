<?php
    require_once "Connection.php";
    class Folders extends Connect{
        public function addFolder($data){
            $connection = Connect::connection();
            $sql = "INSERT INTO carpetas(id_usuario, nombre_carpeta) VALUES (?, ?)";
            $query = $connection->prepare($sql);
            $query->bind_param("is", $data['idUser'], $data['folder']);
            $answer = $query->execute(); //Ejecuta la consulta
            $query->close(); //Cierra la conexión
            return $answer;
        }

        //Método para eliminar carpetas
        public function deleteFolder($idFolder){
            $connection = Connect::connection();
            $sql = "DELETE FROM carpetas WHERE id_carpeta = ?";
            $query = $connection->prepare($sql);
            $query->bind_param('i', $idFolder);
            $answer = $query->execute(); //Ejecuta la consulta
            $query->close(); //Cierra la conexión
            return $answer;
        }

        //Método para obtener datos de la carpeta
        public function editFolder($idFolder){
            $connection = Connect::connection();
            $sql = "SELECT id_carpeta, nombre_carpeta FROM carpetas WHERE id_carpeta = '$idFolder'";
            $result = mysqli_query($connection, $sql);
            $folder = mysqli_fetch_array($result);
            $data = array("idFolder" => $folder['id_carpeta'], "folderName" => $folder['nombre_carpeta']);
            return $data;
        }

        //Método para actualizar carpetas
        public function updateFolder($data){
            $connection = Connect::connection();
            $sql = "UPDATE carpetas SET nombre_carpeta = ? WHERE id_carpeta = ?";
            $query = $connection->prepare($sql);
            $query->bind_param("si", $data['folderName'], $data['idFolder']);
            $answer = $query->execute(); //Ejecuta la consulta SQL
            $query->close(); //Cierra la conexión a la DB
            return $answer;
        }

    }
?>