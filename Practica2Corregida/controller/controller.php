<?php
    class MvcController {
        //Método para llamar a la plantilla template
        public function plantilla(){
            include "view/template.php";
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
                                "contrasena"=>$_POST["passwordRegistro"], 
                                "email"=>$_POST["emailRegistro"]);
            //Enviamos los parámetros al Modelo para que procese el registro
            $respuesta = Datos::registroUsuarioModel($datosController, "usuarios");

            //Recibir la repuesta del modelo para saber que sucedió (success o error) 
            if($respuesta == "success"){
                header("location:index.php?action=ok");
            }else{
                //header("location:index.php");    
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

        //MÉTODO LISTAR USUARIOS PARA EDITAR// no manda parametros, porque recibe para editar.
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
                if($respuesta=="success"){
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

        /////////////////////////METODOS DE CARRERA/////////////////////////
        
         //Método para registro de usuarios
         public function registroCarreraController(){
             //Almaceno en un array los valores de la vista de registro
             $datosController = array("carrera"=>$_POST["carreraRegistro"],
                                 "nombre"=>$_POST["nombreRegistro"]);
             //Enviamos los parámetros al Modelo para que procese el registro
             $respuesta = Datos::registroCarreraModel($datosController, "carreras");
 
             //Recibir la repuesta del modelo para saber que sucedió (success o error) 
             if($respuesta == "success"){
                 header("location:index.php?action=ok");
             }else{
                 //header("location:index.php");    
             }
         }
 
       
         //Método VISTA CARRERA
         public function vistaCarreraController(){
             //Envio al Modelo la variable de control y la tabla a donde se hará la consulta.
             $respuesta = Datos::vistaCarreraModel("carreras");
             foreach ($respuesta as $row => $item){
                 echo '<tr>
                     <td>'.$item["nombre"].'</td>
                     <!--COLUMNA PARA EDITAR -->
                     <td><a href="index.php?action=editar_carrera&id_carrera='.$item["id_carrera"].'"><button>EDITAR</button></a></td>
                     <!--COLUMNA PARA BORRAR -->
                     <td><a href="index.php?action=carreras&idBorrar='.$item["id_carrera"].'"><button>ELIMINAR</button></a></td>
                     
                 </tr>';
 
             }
         }
 
         //MÉTODO LISTAR CARRERA PARA EDITAR
         public function editarCarreraController(){
             //Solicitar el id del usuarios a editar
             $datosController = $_GET["id_carrera"];
             //Enviamos al modelo el id para hacer la consulta y obtener sus datos
             $respuesta = Datos::editarCarreraModel($datosController, "carreras");
             //Recibimos respuesta del modelo e IMPRIMIMOS UNA FORM PARA EDITAR
             echo'<input type="hidden" value="'.$respuesta["id_carrera"].'"
                 name="id_carreraEditar">
                 <input type="text" value ="'.$respuesta["nombre"].'"
                 name="nombreEditar" required>
                 <input type="submit" value= "Actualizar">';
         }
         //MÉTODO PARA ACTUALIZAR CARRERA
         public function actualizarCarreraController(){
             if(isset($_POST["carreraEditar"])){
                 //Preparamos un array con los id de el form del controlador 
                 //anterior para ejecutar la actualizacion en un modelo.
                 $datosController=array("id_carrera"=>$_POST["id_carreraEditar"],
                                         "nombre"=>$_POST["nombreEditar"]);
                 //Enviar el array a el modelo que generara el UPDATE
                 $respuesta = Datos::actualizarCarreraModel($datosController,"carreras");
                 //Recibimos respuesta del modelo para determinar si se llevo a cabo el UPDATE de manera correcta
                 if($respuesta=="success"){
                     header("location:index.php?action=cambio");
                 }else{
                     echo "error";
                 }                                    
             }
         }
 
         //Borrado de usuarios
         public function borrarCarreraController(){
             if(isset($_GET["idBorrar"])){
                 $datosController = $_GET["idBorrar"];
 
                 //Mandar ID  al controlador para que ejecute el DELETE.
             $respuesta = Datos::borrarCarreraModel($datosController, "carreras");
 
             //Recibimos la respuesta del modelo de eliminación 
             if($respuesta == "success"){
                 header("location:index.php?action=carreras");
             }
             }
         }


         //////////////////////////METODOS PARA MATERIAS///////////////////////////
 
         //Método para registro de usuarios
         public function registroMateriaController(){
             //Almaceno en un array los valores de la vista de registro
             $datosController = array("materia"=>$_POST["materiaRegistro"], 
                                 "nombre"=>$_POST["nombreRegistro"],
                                 "clave"=>$_POST["claveRegistro"],
                                 "carrera"=>$_POST["carreraRegistro"]);
             //Enviamos los parámetros al Modelo para que procese el registro
             $respuesta = Datos::registroMateriaModel($datosController, "materias");
 
             //Recibir la repuesta del modelo para saber que sucedió (success o error) 
             if($respuesta == "success"){
                 header("location:index.php?action=ok");
             }else{
                 //header("location:index.php");    
             }
         }
 
       
         //Método VISTA MATERIA
         public function vistaMateriaController(){
             //Envio al Modelo la variable de control y la tabla a donde se hará la consulta.
             $respuesta = Datos::vistaMateriaModel("materias");
             foreach ($respuesta as $row => $item){
                 echo '<tr>
                     <td>'.$item["nombre"].'</td>
                     <td>'.$item["clave"].'</td>
                     <td>'.$item["carrera"].'</td>
                     <!--COLUMNA PARA EDITAR -->
                     <td><a href="index.php?action=editar_materia&id_materia='.$item["id_materia"].'"><button>EDITAR</button></a></td>
                     <!--COLUMNA PARA BORRAR -->
                     <td><a href="index.php?action=materias&idBorrar='.$item["id_materia"].'"><button>ELIMINAR</button></a></td>
                     
                 </tr>';
 
             }
         }
 
         //MÉTODO LISTAR MATERIA PARA EDITAR
         public function editarMateriaController(){
             //Solicitar el id del usuarios a editar
             $datosController = $_GET["id_materia"];
             //Enviamos al modelo el id para hacer la consulta y obtener sus datos
             $respuesta = Datos::editarMateriaModel($datosController, "materias");
             //Recibimos respuesta del modelo e IMPRIMIMOS UNA FORM PARA EDITAR
             echo'<input type="hidden" value="'.$respuesta["id_materia"].'"
                 name="id_materiaEditar">
                 <input type="text" value ="'.$respuesta["nombre"].'"
                 name="nombreEditar" required>
                 <input type="text" value="'.$respuesta["clave"].'"
                 name="claveEditar" required>
                 <input type="text" value="'.$respuesta["carrera"].'"
                 name="carreraEditar" required>
                 <input type="submit" value= "Actualizar">';
         }
         //MÉTODO PARA ACTUALIZAR MATERIA
         public function actualizarMateriaController(){
             if(isset($_POST["materiaEditar"])){
                 //Preparamos un array con los id de el form del controlador 
                 //anterior para ejecutar la actualizacion en un modelo.
                 $datosController=array("id_materia"=>$_POST["id_materiaEditar"],
                                         "nombre"=>$_POST["nombreEditar"],
                                         "clave"=>$_POST["claveEditar"],
                                         "carrera"=>$_POST["carreraEditar"]);
                 //Enviar el array a el modelo que generara el UPDATE
                 $respuesta = Datos::actualizarMateriaModel($datosController,"materias");
                 //Recibimos respuesta del modelo para determinar si se llevo a cabo el UPDATE de manera correcta
                 if($respuesta=="success"){
                     header("location:index.php?action=cambio");
                 }else{
                     echo "error";
                 }                                    
             }
         }
 
         //Borrado de materias
         public function borrarMateriaController(){
             if(isset($_GET["idBorrar"])){
                 $datosController = $_GET["idBorrar"];
 
                 //Mandar ID  al controlador para que ejecute el DELETE.
             $respuesta = Datos::borrarMateriaModel($datosController, "materias");
 
             //Recibimos la respuesta del modelo de eliminación 
             if($respuesta == "success"){
                 header("location:index.php?action=materias");
             }
             }
         }
 

    }

?>