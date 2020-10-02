<h1>REGISTRAR CARRERA</h1>
<form method="POST">
    <input type="text" placeholder="nombre" name="nombreRegistro" required>
    <input type="submit" value="Enviar">
</form>



<?php
    $registrodeCarrera = new MvcControllerCarrera();
    $registrodeCarrera->registroCarreraController();

    //Verificar la URL correcta
    if(isset($_GET["action"])){
        if($_GET["action"] == "ok"){
            echo "Registro exitoso";
        }else{
            echo "Fallo";
        }
    }
?>
