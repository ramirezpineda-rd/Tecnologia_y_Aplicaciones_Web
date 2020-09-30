<h1>REGISTRAR MATERIA</h1>
<form method="POST">
    <input type="text" placeholder="Nombre" name="nombreRegistro" required>
    <input type="password" placeholder="clave" name="claveRegistro" required>
    <input type="text" placeholder="carrera" name="carreraRegistro" required>
    <input type="submit" value="Enviar">
</form>



<?php
    $registro = new MvcController();
    $registro->registroMateriaController();

    //Verificar la URL correcta
    if(isset($_GET["action"])){
        if($_GET["action"] == "ok"){
            echo "Registro exitoso";
        }else{
            echo "Fallo";
        }
    }
?>
