<?php
    //Invoca al controlador y modelo solicitado
    require_once "model/enlaces.php"; 
    require_once "model/crud.php";
    require_once "controller/controller.php";
    require_once "model/crud_carreras.php";
    require_once "controller/controller_carrera.php";
    require_once "controller/controller_materia.php";
    require_once "model/crud_materias.php";
    
    //Se crea un nuevo controlador llamando a la plantilla que mostrará al usuario

    $mvc = new MvcController();
    $mvc -> plantilla();

?>