<?php
    class MvcController {
        //Método para llamar a la plantilla template
        public function plantilla(){
            include "View/template.php";
        }
        //Método para mostrar los enlaces de la página
        public function enlacesPaginasController(){
           if(isset($_GET['action'])){
                $enlaces = $_GET['action'];
           }else{
                $enlaces = "index";
           }
           $respuesta=Paginas::enlacesPaginasModel($enlaces);
           include $respuesta;
        }

        //Listado, editar, crear, eliminar.

        //Método para registro de usuarios
        public function registroUsuarioController(){
            //Almaceno en un array los valores de la vista de registro
            if(isset($_POST["usuarioRegistro"])){       
                $datosController = array("usuario"=>$_POST["usuarioRegistro"],
                                        "contrasena"=>$_POST["passwordRegistro"], 
                                        "email"=>$_POST["emailRegistro"]);
                //Enviamos los parámetros al Modelo para que procese el registro
                $respuesta = Datos::registroUsuarioModel($datosController, "usuarios");

                    //Recibir la repuesta del modelo para saber que sucedió (success o error) 
                if($respuesta == "success"){
                    header("location:index.php?action=ok");
                }else{
                    header("location:index.php");    
                }
            }
        }

        //Método para INGRESO DE USUARIOS
        public function ingresoUsuarioController(){
            if(isset($_POST["usuarioIngreso"])){
                $datosController = array("usuario"=>$_POST["usuarioIngreso"],
                                         "password"=>$_POST["passwordIngreso"]);
                //Mandar valores del array al modelo
                $respuesta = Datos::ingresoUsuarioModel($datosController,"usuarios");
                
                //Recibe respuesta del modelo 
                if($respuesta["usuario"] == $_POST["usuarioIngreso"] && $respuesta["contrasena"] == $_POST["passwordIngreso"]){
                    session_start();
                    $_SESSION["validar"] = true;
                    header("location:index.php?action=usuarios");
                }else{
                    header("location:index.php?action=fallo");
                }
            }
        }


        //Método VISTA USUARIOS
        public function vistaUsuariosController(){
            //Envio al Modelo la variable de control y la tabla a donde se hará la consulta.
            $respuesta = Datos::vistaUsuariosModel("usuarios");
            foreach ($respuesta as $row => $item){
                echo '<tr>
                    <td>'.$item["usuario"].'</td>
                    <td>'.$item["contrasena"].'</td>
                    <td>'.$item["email"].'</td>
                    <!--COLUMNA PARA EDITAR -->
                    <td><a href="index.php?action=editar&id='.$item["id"].'"><button>EDITAR</button></a></td>
                    <!--COLUMNA PARA BORRAR -->
                    <td><a href="index.php?action=usuarios&idBorrar='.$item["id"].'"><button>ELIMINAR</button></a></td>
                    
                </tr>';

            }
        }

        //MÉTODO LISTAR USUARIOS PARA EDITAR
        public function editarUsuarioController(){
            //Solicitar el id del usuarios a editar
            $datosController = $_GET["id"];
            //Enviamos al modelo el id para hacer la consulta y obtener sus datos
            $respuesta = Datos::editarUsuarioModel($datosController, "usuarios");
            //Recibimos respuesta del modelo e IMPRIMIMOS UNA FORM PARA EDITAR
            echo'<input type="hidden" value="'.$respuesta["id"].'"
                name="idEditar">
                <input type="text" value ="'.$respuesta["usuario"].'"
                name="usuarioEditar" required>
                <input type="text" value="'.$respuesta["contrasena"].'"
                name="passwordEditar" required>
                <input type="text" value="'.$respuesta["email"].'"
                name="emailEditar" required>
                <input type="submit" value= "Actualizar">';
        }
        //MÉTODO PARA ACTUALIZAR USUARIOS
        public function actualizarUsuarioController(){
            if(isset($_POST["usuarioEditar"])){
                //Preparamos un array con los id de el form del controlador 
                //anterior para ejecutar la actualizacion en un modelo.
                $datosController=array("id"=>$_POST["idEditar"],
                                        "usuario"=>$_POST["usuarioEditar"],
                                        "contrasena"=>$_POST["passwordEditar"],
                                        "email"=>$_POST["emailEditar"]);
                //Enviar el array a el modelo que generara el UPDATE
                $respuesta = Datos::actualizarUsuarioModel($datosController,"usuarios");
                //Recibimos respuesta del modelo para determinar si se llevo a cabo el UPDATE de manera correcta
                if($respuesta == "success"){
                    header("location:index.php?action=cambio");
                }else{
                    echo "error";
                }                                    
            }
        }

        //Borrado de usuarios
        public function borrarUsuarioController(){
            if(isset($_GET["idBorrar"])){
                $datosController = $_GET["idBorrar"];
                //Mandar ID  al controlador para que ejecute el DELETE.
                $respuesta = Datos::borrarUsuariosModel($datosController, "usuarios");
                //Recibimos la respuesta del modelo de eliminación 
                if($respuesta == "success"){
                    header("location:index.php?action=usuarios");
                }
            }
        }

        //nombre, autor, editorial, edición y año


        ////////////METODOS PARA REGISTRAR LIBROS/////////////////

        public function registroLibroController(){
        //Almaceno en un array los valores de la vista de registro
            if(isset($_POST["nombreRegistro"])){       
                $datosController = array("ISBN"=>$_POST["ISBNRegistro"],
                                     "nombre"=>$_POST["nombreRegistro"],
        							 "autor"=>$_POST["autorRegistro"],
        							 "editorial"=>$_POST["editorialRegistro"],
        							 "edicion"=>$_POST["edicionRegistro"],
        							 "anio"=>$_POST["anioRegistro"]);
                //Enviamos los parámetros al Modelo para que procese el registro
                $respuesta = Datos::registroLibroModel($datosController, "libros");

                //Recibir la repuesta del modelo para saber que sucedió (success o error) 
                if($respuesta == "success"){
                header("location:index.php?action=libros");
                }else{
                header("location:index.php");    
                }
            }
        }
     public function vistaLibroController(){
            //Envio al Modelo la variable de control y la tabla a donde se hará la consulta.
            $respuesta = Datos::vistaLibroModel("libros");
            foreach ($respuesta as $row => $item){
                echo '<tr>
                    <td>'.$item["ISBN"].'</td>
                    <td>'.$item["nombre"].'</td>
                    <td>'.$item["autor"].'</td>
                    <td>'.$item["editorial"].'</td>
                    <td>'.$item["edicion"].'</td>
                    <td>'.$item["anio"].'</td>
                    <!--COLUMNA PARA EDITAR -->
                    <td><a href="index.php?action=editarLibro&id_libro='.$item["id_libro"].'"><button>EDITAR</button></a></td>
                    <!--COLUMNA PARA BORRAR -->
                    <td><a href="index.php?action=libros&idBorrarLibro='.$item["id_libro"].'"><button>ELIMINAR</button></a></td>   
                </tr>';

            }
        }

         public function editarLibroController(){
            //Solicitar el id del libro a editar
            $datosController = $_GET["id_libro"];
            //Enviamos al modelo el id para hacer la consulta y obtener sus datos
            $respuesta = Datos::editarLibroModel($datosController, "libros");
            //Recibimos respuesta del modelo e IMPRIMIMOS UNA FORM PARA EDITAR
            echo'<input type="hidden" value="'.$respuesta["id_libro"].'"
                name="id_libroEditar">
                <input type="varchar" value ="'.$respuesta["ISBN"].'"
                name="ISBNEditar" required>
                <input type="varchar" value ="'.$respuesta["nombre"].'"
                name="nombreEditar" required>
                <input type="varchar" value ="'.$respuesta["autor"].'"
                name="autorEditar" required>
                <input type="varchar" value ="'.$respuesta["editorial"].'"
                name="editorialEditar" required>
                <input type="varchar" value ="'.$respuesta["edicion"].'"
                name="edicionEditar" required>
                <input type="int" value ="'.$respuesta["anio"].'"
                name="anioEditar" required>
                <input type="submit" value= "Actualizar">';
        }

        //nombre, autor, editorial, edición y año
        public function actualizarLibroController(){
            if(isset($_POST["nombreEditar"])){
                //Preparamos un array con los id de el form del controlador 
                //anterior para ejecutar la actualizacion en un modelo.
                $datosController=array("id_libro"=>$_POST["id_libroEditar"],
                                        "ISBN"=>$_POST["ISBNEditar"],
                                        "nombre"=>$_POST["nombreEditar"],
                                        "autor"=>$_POST["autorEditar"],
                                        "editorial"=>$_POST["editorialEditar"],
                                        "edicion"=>$_POST["edicionEditar"],
                                        "anio"=>$_POST["anioEditar"],);
                //Enviar el array a el modelo que generara el UPDATE
                $respuesta = Datos::actualizarLibroModel($datosController,"libros");
                //Recibimos respuesta del modelo para determinar si se llevo a cabo el UPDATE de manera correcta
                if($respuesta=="success"){
                    header("location:index.php?action=libros");
                }else{
                    echo "error";
                }                                    
            }
        }

        public function borrarLibroController(){
            if(isset($_GET["id_libro"])){
                $datosController = $_GET["id_libro"];
                    //Mandar ID  al controlador para que ejecute el DELETE.
                $respuesta = Datos::borrarLibroModel($datosController, "libros");

            //Recibimos la respuesta del modelo de eliminación 
            if($respuesta == "success"){
                    header("location:index.php?action=libros");
            }
            }
        }

    }
?>
