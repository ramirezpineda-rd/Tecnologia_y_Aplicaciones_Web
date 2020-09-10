<?php
    class MvcController{

        //Metodo para llamar a la plantilla template
        public function plantilla(){
            include "views/template.php";

        }

        //Metodo para mostrar el contenido de las paginas de las plantillas
        public function enlacesPaginasController(){
            //Verificar la variable "action" que viene desde los URL's de navegacion.
            if(isset($_GET["action"])){
                $enlacesController = $_GET["action"];    
            }
            else{
                $enlacesController = "index";
            }
            //Mandar el parametro de "enlacesController" al modelo "EnlacesPaginas" en su
            //propiedad "enlacesPaginasModel"
            $respuesta = EnlacesPaginas::enlacesPaginasModel($enlacesController);
            include $respuesta;
        }
    }
?>