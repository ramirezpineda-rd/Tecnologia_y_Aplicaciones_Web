<?php
    //Modelo que permite mostrat el enlace de las paginas con las vistas
    class EnlacesPaginas{
        public function enlacesPaginasModel(enlacesModel){
            //Retorno de los valores de la variable a traves del GET
            if(enlacesModel == "nosotros" || $enlacesModel == "servicios" ||
            $enlacesModel == "contactenos"){
                //Mostrar la vista correspondiente segun la opcion seleccionada, y se manda
                //al contenedor la respuesta
                $module = "views/" .$enlacesModel. ".php";
            }
            else if (enlacesModel == "index"){
                $module = "views/inicio.php";
            }
            //Validar que si escriben basura en la URL en el parametro de la variable action,
            //redireccionar a inicio.php
            else{
                $module = "views/inicio.php";
            }
            return $module;
        }
    }
?>