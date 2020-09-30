<?php
    require_once "conexion.php";
    //Modelo que permite mostrar el enlace de las paginas con las vistas
    class Datos extends Conexion {
        //Método del modelo de registro de usuarios (Recibe datos del controlador)
        public function registroMateriaModel($datosModel, $tabla){
            //Prepara el modelo para hacer los inserts a la BD
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id,nombre,clave,carrera) VALUES (:id,:nombre,:clave,:carrera)");
            //Prepare() prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute.
            
            //bindParam() Vincula el valor de una variable de PHP a un parámetro de sustitución con nombre o signo de interrogacion correspondiente. Es la sentencia usada para preparar un query de SQL.
            $stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_STR); 
            $stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR); 
            $stmt->bindParam(":clave", $datosModel["clave"], PDO::PARAM_STR); 
            $stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_STR); 
            //Verificar ejecución del Query
            if($stmt->execute()){
                return "success";
            }else{
                return "error";
            }
            //Cerrar las funciones de la sentencia de PDO
            $stmt->close();
        }



        //MÉTODO PARA VISTA MATERIAS (TABLA)
        public function vistaMateriaModel($tabla){
            $stmt = Conexion::conectar()->prepare("SELECT id, nombre, clave, carrera FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt->close();
        }

        //Método para SELECCIONAR materias
        public function editarCarreraModel($datosModel, $tabla){
            $stmt = Conexion::conectar()->prepare("SELECT id, nombre, clave, carrera FROM $tabla
            where id = :id");
            $stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
        }
        //Método para ACTUALIZAR materias (UPDATE)
        public function actualizarMateriaModel($datosModel, $tabla){
            //Preparar el Query
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id= :id, nombre= :nombre, clave= :clave, carrera= :carrera WHERE id = :id");
            //Ejecutar el QUERY
            $stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":clave", $datosModel["clave"], PDO::PARAM_STR);
            $stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_STR);

            //Preparar respuesta
            if($stmt->execute()){
                return "success";
            }else{
                return "error";
            }
            //Cerrar la conexión por PDO
            $stmt->close();


        }
        //Borrar MATERIAS
        public function borrarMateriasModel($datosModel, $tabla){
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