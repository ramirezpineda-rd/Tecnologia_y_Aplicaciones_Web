<h1>REGISTRAR</h1>
<form method="POST">
    <input type="text" placeholder="Usuario" name="usuarioRegistro" required>
    <input type="password" placeholder="Contraseña" name="passwordRegistro" required>
    <input type="email" placeholder="Email" name="emailRegistro" required>
    <input type="submit" value="Enviar">
</form>



<?php
    $registro = new MvcController();
    $registro->registroUsuarioController();

    //Verificar la URL correcta
    if(isset($_GET["action"])){
        if($_GET["action"] == "ok"){
            echo "Registro exitoso";
        }else{
            echo "Fallo";
        }
    }
?>
