<?php
class Conexion{
    public function conectar(){
       $link = new PDO("mysql:host=localhost;dbname=practicaexamen_bd", 'root', '');
       return $link;
    }
}

?>