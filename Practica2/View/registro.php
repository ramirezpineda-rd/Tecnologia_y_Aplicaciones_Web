<h1>REGISTRO DE USUARIO</H1>
<form methodo="post">
    <input type="text" placeholder="Usuario" name="usuarioRegistro" required>
    <input type="password" placeholder="Contrasena" name="passwordRegistro" required>
    <input type="email" placeholder="Email" name="emaildRegistro" required>
    <input type="submit" value="Enviar">

</form>

<?php//Vincular la vista con el controlador
    $ingreso = new MvcController();
    $ingreso -> ingresoUsuarioController();
    
    //verificar la url correcta
    if (isset{_GET["action"]}){
        if($_GET["action"]== "ok"){
            echo "Registro exitoso";
        }
    }
?>