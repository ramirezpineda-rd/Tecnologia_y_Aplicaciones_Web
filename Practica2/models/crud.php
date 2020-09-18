<?php
    require_once"conexion.php"
    //Modelo que permite mostrar el enlace de las paginas con las vistas
        class Datos extends Conexion{
            //Metodo del modelo de registro de usuario (Recibe datos del controlador)
            public function registroUsuarioModel ($datosModel, $tabla)

            //METODO INGRESO USUARIO
            public function ingresoUsuarioModel($datosModel,$tabla){
                //Preparamos el PDO
                $stmt=Conexion::conectar()->prepare("SELECT usuario, contrasena FROM $tabla WHERE usuario = :usuario");
                //Recibimos el valor "usuario" desde el array almacenado del controlador
                $stmt->bindParam(":usuario", $datosModel["usuario"],PDO::PARAM_STR);
                //ejecutamos la consulta en PDO
                $sstm->excute();
                //Retornamos el fetch que es el que obtiene una fila o posici[on de un array
                return $stnt->fetch();
                //Cerramos el PDO
                sstm->close();          
        }









            //METODO PARA VISTA USUARIO (TABLA)
            public function vistaUsuariosModel($tabla){
                $stmt = Conexion::conectar()->prepare("SELECT id, usuario, contrasena, email FROM $tabla");
                $stmt->execute();
                return $stnt->fetchAll();
                $stmt->close;
            }
        
    }
?>