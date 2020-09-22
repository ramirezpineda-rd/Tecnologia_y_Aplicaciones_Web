<?php
class Conexion{
    public function conectar(){
        $link = new PDO("mysql:host=locahost;dbname=practica2_bd", "root", "root");
        return $link;
    }
}

?>