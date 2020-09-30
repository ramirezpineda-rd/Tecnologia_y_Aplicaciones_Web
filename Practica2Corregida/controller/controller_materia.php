<?php
    class MvcControllerMateria {
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
        public function registroMateriaController(){
            //Almaceno en un array los valores de la vista de registro
            $datosController = array("materia"=>$_POST["materiaRegistro"], 
                                "nombre"=>$_POST["nombreRegistro"],
                                "clave"=>$_POST["claveRegistro"],
                                "carrera"=>$_POST["carreraRegistro"]);
            //Enviamos los parámetros al Modelo para que procese el registro
            $respuesta = Datos2::registroMateriaModel($datosController, "materias");

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
            $respuesta = Datos2::vistaMateriaModel("materias");
            foreach ($respuesta as $row => $item){
                echo '<tr>
                    <td>'.$item["nombre"].'</td>
                    <td>'.$item["clave"].'</td>
                    <td>'.$item["carrera"].'</td>
                    <!--COLUMNA PARA EDITAR -->
                    <td><a href="index.php?action=editar&id='.$item["id"].'"><button>EDITAR</button></a></td>
                    <!--COLUMNA PARA BORRAR -->
                    <td><a href="index.php?action=materias&idBorrar='.$item["id"].'"><button>ELIMINAR</button></a></td>
                    
                </tr>';

            }
        }

        //MÉTODO LISTAR MATERIA PARA EDITAR
        public function editarMateriaController(){
            //Solicitar el id del usuarios a editar
            $datosController = $_GET["id"];
            //Enviamos al modelo el id para hacer la consulta y obtener sus datos
            $respuesta = Datos2::editarMateriaModel($datosController, "materias");
            //Recibimos respuesta del modelo e IMPRIMIMOS UNA FORM PARA EDITAR
            echo'<input type="hidden" value="'.$respuesta["id"].'"
                name="idEditar">
                <input type="text" value ="'.$respuesta["nombre"].'"
                name="nombreEditar" required>
                <input type="text" value="'.$respuesta["clave"].'"
                name="claveEditar" required>
                <input type="text" value="'.$respuesta["carrera"].'"
                name="emailEditar" required>
                <input type="submit" value= "Actualizar">';
        }
        //MÉTODO PARA ACTUALIZAR MATERIA
        public function actualizarMateriaController(){
            if(isset($_POST["materiaEditar"])){
                //Preparamos un array con los id de el form del controlador 
                //anterior para ejecutar la actualizacion en un modelo.
                $datosController=array("id"=>$_POST["idEditar"],
                                        "nombre"=>$_POST["nombreEditar"],
                                        "clave"=>$_POST["claveEditar"],
                                        "carrera"=>$_POST["carreraEditar"]);
                //Enviar el array a el modelo que generara el UPDATE
                $respuesta = Datos2::actualizarMateriaModel($datosController,"materias");
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
            $respuesta = Datos2::borrarMateriaModel($datosController, "materias");

            //Recibimos la respuesta del modelo de eliminación 
            if($respuesta == "success"){
                header("location:index.php?action=materias");
            }
            }
        }


    }

?>