<?php
    //Invoca al controlador y modelo solicitado
    require_once "Model/enlaces.php";
    require_once "Model/crud.php";
    require_once "Controller/Controller.php";
    //Se crea un nuevo controlador llamando a la plantilla que mostrará al usuario
    $mvc = new MvcController();
    $mvc->plantilla();

?>