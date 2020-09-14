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
    }
?>