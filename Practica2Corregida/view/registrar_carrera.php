<h1>REGISTRAR CARRERA</h1>
<form method="POST">
    <input type="text" placeholder="Nombre de la carrera" name="carreraRegistro" required>
    <input type="submit" value="Enviar">
</form>



<?php
    $registrodeCarrera = new MvcController();
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
