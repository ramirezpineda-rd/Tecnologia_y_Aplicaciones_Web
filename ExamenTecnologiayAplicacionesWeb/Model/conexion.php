<?php
class Conexion{
    public function conectar(){
       $link = new PDO("mysql:host=localhost;dbname=parcialruben", 'root', '');
       return $link;
    }
}

?>