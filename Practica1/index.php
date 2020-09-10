<?php
//Invoca al controlador y modelo solicitado
    require_once "controllers/controller.php";
    require_once "model/model.php";
    //Se crea un nuevo controlador llamando a la plantilla que mostrara el usuario
    $mvc= new MvcController();
    $mvc-> plantilla();
?>