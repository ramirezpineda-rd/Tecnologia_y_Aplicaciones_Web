<?php
    session_start();
    if(!$_SESSION["validar"]){
        header("location:index.php?action=ingresar");
        exit();
    }


?>
<h1>EDITAR</h1>
<form method="POST">
    <?php
        $editarUsuario = new MvcController();
        $editarUsuario -> editarUsuarioController();
        $editarUsuario -> actualizarUsuarioController();

    ?>

</form>