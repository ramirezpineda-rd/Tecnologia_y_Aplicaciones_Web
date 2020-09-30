<?php
    require_once "conexion.php";
    //Modelo que permite mostrar el enlace de las paginas con las vistas
    class Datos1 extends Conexion {
        //Método del modelo de registro de usuarios (Recibe datos del controlador)
        public function registroCarreraModel($datosModel, $tabla){
            //Prepara el modelo para hacer los inserts a la BD
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id,nombre) VALUES (:id,:nombre)");
            //Prepare() prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute.
            
            //bindParam() Vincula el valor de una variable de PHP a un parámetro de sustitución con nombre o signo de interrogacion correspondiente. Es la sentencia usada para preparar un query de SQL.
            $stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_STR); 
            $stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR); 
            
            //Verificar ejecución del Query
            if($stmt->execute()){
                return "success";
            }else{
                return "error";
            }
            //Cerrar las funciones de la sentencia de PDO
            $stmt->close();
        }


        //MÉTODO PARA VISTA CARRERAS (TABLA)
        public function vistaCarreraModel($tabla){
            $stmt = Conexion::conectar()->prepare("SELECT id, nombre FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt->close();
        }

        //Método para SELECCIONAR usuarios
        public function editarCarreraModel($datosModel, $tabla){
            $stmt = Conexion::conectar()->prepare("SELECT id, nombre FROM $tabla
            where id = :id");
            $stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
        }
        //Método para ACTUALIZAR usuarios (UPDATE)
        public function actualizarCarreraModel($datosModel, $tabla){
            //Preparar el Query
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id= :id, nombre= :nombre, clave= :clave, materia= :materia WHERE id = :id");
            //Ejecutar el QUERY
            $stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);

            //Preparar respuesta
            if($stmt->execute()){
                return "success";
            }else{
                return "error";
            }
            //Cerrar la conexión por PDO
            $stmt->close();


        }
        //Borrar CARRERAS
        public function borrarCarreraModel($datosModel, $tabla){
            //Preparar el QUERY para eliminar
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
            $stmt->bindParam(":id", $datosModel, PDO::PARAM_STR);
        
            //EJECUTAR
            if($stmt->execute()){
                return "success";
            }else{
                return "error";
            }

            $stmt->close();
        }
    }
?>