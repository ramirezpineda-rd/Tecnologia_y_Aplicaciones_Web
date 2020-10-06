<?php
    session_start();
    if(!$_SESSION["validar"]){
        header("location:index.php?action=ingresar");
        exit();
    }

 //ISBN, nombre, autor, editorial, edición y año
?>

<h1>REGISTRAR LIBRO</h1>
<form method="POST">
    <input type="text" placeholder="ISBN" name="ISBNRegistro" required>
    <input type="text" placeholder="nombre" name="nombreRegistro" required>
    <input type="text" placeholder="autor" name="autorRegistro" required>
    <input type="text" placeholder="editorial" name="editorialRegistro" required>
    <input type="text" placeholder="edicion" name="edicionRegistro" required>
    <input type="text" placeholder="año" name="añoRegistro" required>
    <input type="submit" value="Enviar">
</form>

<?php
    $registroLibro = new MvcController();
    $registroLibro -> registroLibroController();
    
    //Verificar que la URL correcta
    if(isset($_GET["action"])){
        if($_GET["action"] == "ok"){
            echo "Registro exitoso";
        }
    }
?>

<h1>LIBROS</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ISBN</th>
                <th>Nombre de Libro</th>
                <th>Autor</th>
                <th>Editorial</th>
                <th>Edicion</th>
                <th>Año</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $vistaLibro = new MvcController();
                $vistaLibro->vistaLibroController();
                $vistaLibro->borrarLibroController();
            ?>
        </tbody>
    </table>
    <?php
        if(isset($_GET["action"])){
            if($_GET["action"] == "cambio"){
                echo "Cambio exitoso";
                
            }
        }
    ?>

