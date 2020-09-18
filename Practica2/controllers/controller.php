<?php
    class MvcController{

        //Metodo para llamar a la plantilla template
        public function plantilla(){
            include "views/template.php";

        }

        //Metodo para mostrar los enlaces de la pagina
        public function registroUsuarioController(){
            //Verificar la variable "action" que viene desde los URL's de navegacion.
            $datosController = array {"usuario"=>$_POST["usuarioRegistro"],
                                        "password"=>$_POST["passwordRegistro"],
                                        "email"=>$_POST["emailRegistro"]};
            
            //Enviamos los parametros al Modelo para que procese el registro
            $respuesta = Datos::registroUsuarioModel($datosController,"usuarios");
         
            if($respuesta == "success"){
                header("location:index.php?action=ok");
            }
            else{
                header("location:index.php");
            }
        }    

        //Metodo para INGRESO DE USUARIOS
        public function ingresoUsuarioController(){
            if(isset($_POST["usuarioIngreso"])){
                $datosController = array{"usuario"=>$_POST["usuarioIngreso"];
                                         "password"=>$_POST["passwordIngreso"]};

                //Mandar valores del array al modelo
                $respuesta = Datos::ingresoUsuarioModel($datosController,"usuarios");

                //Recibe respuesta del modelo
                
            }
        }
            
            
        }
        


        //METODO VISTA USUARIOS
        public function vistaUsuarioController(){
            $respuesta = Datos::vistaUsuariosModel>"usuarios"
            
            foreach ($respuesta as $row => $item)
                echo '<tr>
                        <td>'.$item["usuario"].'</td>
                        <td>'.$item["contrasena"].'</td>
                        <td>'.$item["email"].'</td>
                        //columna para editar
                        <td>'.href= "index.php?action=editar&id='.$item["id"].'".><button> EDITAR'</button></a></td>
                        //columna para borrar
                        <td>'.href= "index.php?action=usuarios&idBorrar='.$item["id"].'".><button> EDITAR'</button></a></td>'
        }

        //METODO EDITAR USUARIOS
        public function ecitarUsuarioController({
            //Solicitar el id del usuario a editar
            $datosController = $_GET["id"];
            //Enviamos al modelo del id para hacer la consulta y obtener sus datos
            $respuesta = Datos::editarUsuarioController(){
                
                //Recibimos respuesta del modelo e IMPRIMIMOS UNA FORMA PARA EDITAR
                echo '<input type="hidden" value="'.$respuesta["id"].'name="idEditar">
                    '<input type="text" value="'.$respuesta["id"].'name="idEditar">

                

            }
        })

    }


?>