<?php
    class MvcController{

        //Metodo para llamar a la plantilla template
        public function plantilla(){
            include "views/template.php";

        }

        //Metodo para mostrar los enlaces de la pagina
        public function enlacesPaginasController(){
            //Verificar la variable "action" que viene desde los URL's de navegacion.
            if(isset($_GET["action"])){
                $enlaces = $_GET["action"];    
            }
            else{
                $enlaces = "index";
            }
            //Mandar el parametro de "enlacesController" al modelo "EnlacesPaginas" en su
            //propiedad "enlacesPaginasModel"
            $respuesta = Paginas::enlacesPaginasModel($enlaces);
            include $respuesta;
        }
    }
?>