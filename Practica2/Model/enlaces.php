<?php
    class Paginas{
        public function enlacesPaginasModel($enlaces){
            if($enlaces == "ingresar" || $enlaces == "usuarios" || $enlaces == "editar"
            || $enlaces == "salir"){
                //controlar en una variable
                $module = "view/".$enlaces.".php";//concatenado
            }
            else if ($enlaces == "index"){
                $module = "view/modules/registro.php";

            }
            //Cuando es ok
            else if($enlaces == "ok"){
                $module = "view/registro.php";
            }
            else if($enlaces == "fallo"){
                $module = "view/ingresar.php";
            }
            else if($enlaces == "cambio"){
                $module = "view/uduarios.php";
            }
            else{
                $module = "view/registro.php";
            }
            return $module;
        }
    }

?>