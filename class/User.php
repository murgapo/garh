<?php

require_once "Connection.php";

class User extends Connect{

    public function addUser($data){
        $connection = Connect::connection();
        //Valida si el usuario ya existe
        if (self::repeatedUser($data['user'])) {
            return 2;
        } else {
            $sql = "INSERT INTO usuarios (nombre, puesto, email, usuario, password) VALUES (?, ?, ?, ?, ?)";
            $query = $connection->prepare($sql);
            $query->bind_param('sssss', $data['name'], $data['position'], $data['email'], $data['user'], $data['pass']);
            $success = $query->execute(); /*Se ejecuta la consulta SQL*/
            $query->close(); /*Se cierra la consulta SQL*/
            return $success;
        }
    }

    public function repeatedUser($user){
        $connection = Connect::connection();
        $sql = "SELECT usuario 
                FROM usuarios 
                WHERE usuario = '$user'";
        $result = mysqli_query($connection, $sql);
        $data = mysqli_fetch_array($result);

        if ($data['usuario'] != "" || $data['usuario'] == $user) {
            return 1;
        } else {
            return 0;
        }
    }

    public function login($user, $pass){
        $connection = Connect::connection();
        $sql = "SELECT count(*) AS userExists FROM usuarios WHERE usuario = '$user' AND password = '$pass'";
        $result = mysqli_query($connection, $sql);
        $answer = mysqli_fetch_array($result)['userExists'];

        if ($answer > 0) {
            $_SESSION['user'] = $user;
            $sql = "SELECT id_usuario FROM usuarios WHERE usuario = '$user' AND password = '$pass'";
            $result = mysqli_query($connection, $sql);
            $idUser = mysqli_fetch_row($result)[0];
            $_SESSION['idUser'] = $idUser;
            return 1;
        } else {
            return 0;
        }
    }
}   

?>