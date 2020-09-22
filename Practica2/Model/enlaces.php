<?php
    class Paginas{
        public function enlacesPaginasModel($enlaces){
            if($enlaces == "ingresar" || $enlaces == "usuarios" || $enlaces == "editar"
            || $enlaces == "salir"){
                //controlar en una variable
                $module = "views/".$enlaces.".php"//concatenado
            }
            else if ($enlaces == "index"){
                $module = "views/modules/registro.php"

            }
            //Cuando es ok
            else if($enlaces == "ok"){
                $module = "views/modules/registro.php";
            }
            else if($enlaces == "fallo"){
                $module = "views/modules/ingresar.php";
            }
            else if($enlaces == "cambio"){
                $module = "views/modules/uduarios.php";
            }
            else{
                $module = "views/modules/registro.php";
            }
            return $module;
        }
    }

?>