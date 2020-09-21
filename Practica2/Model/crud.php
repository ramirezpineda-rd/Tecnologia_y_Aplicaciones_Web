<?php
    require_once "conexion.php";
    //Modelo que permite mostrar el enlace de las paginas con las vistas
    class Datos extends Conexion{
        //Método del modelo de registro de usuarios (Recibe datos del controlador)
        public function registroUsuarioModel($datosModel, $tabla){
            //Prepara el modelo para hacer los inserts a la BD
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario,contrasena,email) VALUES (:usuario,:password,:email)");
            //Prepare() prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute.
            
            
            //bindParam() Vincula el valor de una variable de PHP a un parámetro de sustitución con nombre o signo de interrogacion correspondiente. Es la sentencia usada para preparar un query de SQL.
            $stm->bindParam(":usuario",$datosModel["usuario"],PDO::PARAM_STR); 
            $stm->bindParam(":password",$datosModel["contrasena"],PDO::PARAM_STR); 
            $stm->bindParam(":email",$datosModel["email"],PDO::PARAM_STR); 
            //Verificar ejecución del Query
            if($stmt->execute()){
                return "success";
            }else{
                return "error";
            }

            //Cerrar las funciones de la sentencia de PDO
            $stmt->close();

        }
        //Método ingreso usuario
        public function ingresoUsuariosModel($datosModel, $tabla){
            //Preparar el PDO
            $stmt=Conexion::conectar()->prepare("SELECT usuario, contrasena FROM $tabla WHERE usuario = :usuario");
            $stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
            //Ejecutamos la consulta en PDO
            $stmt->execute();
            //Retornamos el fetch que es el que obtiene una fila o posicion de un array
            return $stmt->fetch();
            //Cerramos el PDO
            $stmt->close();

        }
        //MÉTODO PARA VISTA USUARIOS (TABLA)
        public function vistausuariosModel($tabla){
            $stmt = Conexion::conectar()->prepare("SELECT id, usuarios, contrasena, email FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt->close();

            
        }

        //Método para SELECCIONAR usuarios
        public function editarUsuarioModel($datosModel, $tabla){
            $stmt = Conexion::conectar()->prepare("SELECT id, usuarios, contrasena, email FROM $tabla
            where id = :id");
            $stmt->bindParam(":id", $datosModel, PDO:PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
        }
        //Método para ACTUALIZAR usuarios (UPDATE)
        

    }
?>