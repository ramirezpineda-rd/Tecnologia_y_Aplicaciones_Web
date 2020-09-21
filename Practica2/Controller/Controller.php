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

        //Método para registro de usuarios
        public function registroUsuarioController(){
            //Almaceno en un array los valores de la vista de registro
            $datosController = array("usuario"=>$_POST["usuarioRegistro"],
                                "password"=>$_POST["passwordRegistro"], 
                                "email"=>$_POST["emailRegistro"]);
            //Enviamos los parámetros al Modelo para que procese el registro
            $respuesta = Datos::registroUsuarioModel($datosController, "usuarios");

            //Recibir la repuesta del modelo para saber que sucedió (succes o error) 
            if($respuesta == "success"){
                header("location:index.php?action=ok");
            }else{
                header("location:index.php");    
            }
        }

        //Método para INGRESO DE USUARIOS
        public function ingresaUsuarioController(){
            if(isset($_POST["usuarioIngreso"])){
                $datosController = array("usuario"=>$_POST["usuarioIngreso"],
                                    "password"=>$_POST["passwordIngreso"]);
                //Mandar valores del array al modelo
                $respuesta = Datos::ingresoUsuarioModel($datosController,"usuarios");

                //Recibe respuesta del modelo 
                if($respuesta["usuario"]==$_POST["usuarioIngreso"] && $respuesta["password"]==$_POST["passwordIngreso"] ){
                    session_start();

                    $_SESSION["validar"]=true;

                    header("location::index.php?action=usuarios");
                }else{
                    header("location:index.php?action=fallo");
                }
            }
        }


        //Método VISTA USUARIOS
        public function vistaUsuariosController(){
            //Envio al Modelo la variable de control y la tabla a donde se hará la consulta.
            $respuesta = Datos::vistausuariosModel("usuarios");

            foreach ($respuesta as $row => $item){
                echo '<tr>
                    <td>'.$item["usuarios"].'</td>
                    <td>'.$item["contrasena"].'</td>
                    <td>'.$item["email"].'</td>
                    <!--COLUMNA PARA EDITAR -->
                    <td><a href="index.php?action=editar&id='.$item["id"].'"><button>EDITAR</button></a></td>
                    <!--COLUMNA PARA BORRAR -->
                    <td><a href="index.php?action=usuarios&idBorrar='.$item["id"].'"><button>ELIMINAR</button></a></td>
                    
                </tr';
            }
        }

        //MÉTODO LISTAR USUARIOS
        public function editarUsuarioController(){
            //Solicitar el id del usuarios a editar
            $datosController = $_GET("id");
            //Enviamos al modelo el id para hacer la consulta y obtener sus datos
            $respuesta = Datos::editarUsuariosModel($datosController, "usuarios");
            //Recibimos respuesta del modelo e IMPRIMIMOS UNA FORM PARA EDITAR
            echo '<input type="hidden" value ="'.$respuesta["id"].'"
            name="idEditar">
                <input type="text value ="'.$respuesta["usuarios"].'"
                name="usuarioEditar" required>
                <input type="text' value ="'.$respuesta["password"].'"
                name="passwordEditar" required>
                <input type="text' value ="'.$respuesta["email"].'"name="emailEditar">
                <input type="submit" value "Actualizar">'";
        }
        //MÉTODO PARA ACTUALIZAR USUARIOS
        public function actualizarUsuariosController(){
            if(isset($_POST["usuarioEditar"])){
                //Preparamos un array con los id de el form del controlador 
                //anterior para ejecutar la actualizacion en un modelo.
                $datosController=array("id"=>$_POST["idEditar"],
                                                    "usuario"=>$_POST["usuarioEditar"],
                                                    "password"=>$_POST["passwordEditar"],
                                                    "email"=>$_POST["emailEditar"]);
                //Enviar el array a el modelo que generara el UPDATE
                $respuesta = Datos::actualizarUsuarioModel($datosController,"usuarios");
                //Recibimos respuesta del modelo para determinar si se llevo a cabo el UPDATE de manera correcta
                if($respuesta=="success"){
                    header("location:index.php?action=cambio");
                }else{
                    echo "error";
                }                                    
            }
        }

    }

?>