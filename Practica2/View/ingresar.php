<h1>INGRESAR</H1>
<form methodo="post">
    <input type="text" placeholder="Usuario" name="usuarioIngreso" required>
    <input type="password" placeholder="Contrasena" name="passwordIngreso" required>
    <input type="submit" value="Enviar">

</form>

<?php//Vincular la vista con el controlador
    $ingreso = new MvcController();
    $ingreso -> ingresoUsuarioController();
    
    //verificar la url correcta
    if (isset(_GET["action"])){
        if($_GET["action"]== "fallo"){
            echo "Fallo al ingresar";
        }
    }
?>