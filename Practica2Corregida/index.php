<?php
    //Invoca al controlador y modelo solicitado
    require_once "model/enlaces.php"; 
    require_once "model/crud.php";
    require_once "controller/controller.php";
    
    //Se crea un nuevo controlador llamando a la plantilla que mostrará al usuario

    $mvc = new MvcController();
    $mvc -> plantilla();

?>