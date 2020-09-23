<?php

    class Connect{
        public function connection(){
            $server = "localhost";
            $user = "tecnolac";
            $pass = "e:/L8s";
            $data = "gestor";
            $conn = mysqli_connect($server, $user, $pass, $data);
            $conn->set_charset('utf8mb4'); //Para que maneje correctamente las tildes al ingresar datos a la DB
            return $conn;
        }
    }

?>