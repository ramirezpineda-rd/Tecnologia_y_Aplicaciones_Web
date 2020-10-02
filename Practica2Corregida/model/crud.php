<?php
    require_once "conexion.php";
    //Modelo que permite mostrar el enlace de las paginas con las vistas
    class Datos extends Conexion {
        //Método del modelo de registro de usuarios (Recibe datos del controlador)
        public function registroUsuarioModel($datosModel, $tabla){
            //Prepara el modelo para hacer los inserts a la BD
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario,contrasena,email) VALUES (:usuario,:contrasena,:email)");
            //Prepare() prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute.
            
            //bindParam() Vincula el valor de una variable de PHP a un parámetro de sustitución con nombre o signo de interrogacion correspondiente. 
            //Es la sentencia usada para preparar un query de SQL.
            $stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR); 
            $stmt->bindParam(":contrasena", $datosModel["contrasena"], PDO::PARAM_STR); 
            $stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR); 
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
        public function ingresoUsuarioModel($datosModel, $tabla){
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
        public function vistaUsuariosModel($tabla){
            $stmt = Conexion::conectar()->prepare("SELECT id, usuario, contrasena, email FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt->close();
        }

        //Método para SELECCIONAR usuarios
        public function editarUsuarioModel($datosModel, $tabla){
            $stmt = Conexion::conectar()->prepare("SELECT id, usuario, contrasena, email FROM $tabla
            where id = :id");
            $stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
        }
        //Método para ACTUALIZAR usuarios (UPDATE)
        public function actualizarUsuarioModel($datosModel, $tabla){
            //Preparar el Query
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario= :usuario, contrasena= :contrasena, email = :email WHERE id = :id");
            //Ejecutar el QUERY
            $stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
            $stmt->bindParam(":contrasena", $datosModel["contrasena"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
            $stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_STR);

            //Preparar respuesta
            if($stmt->execute()){
                return "success";
            }else{
                return "error";
            }
            //Cerrar la conexión por PDO
            $stmt->close();


        }
        //Borrar USUARIOS
        public function borrarUsuariosModel($datosModel, $tabla){
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



        /////////////METODOS PARA CARRERA///////////////

        public function registroCarreraModel($datosModel, $tabla){
            //Prepara el modelo para hacer los inserts a la BD
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_carrera,nombre) VALUES (:id_carrera,:nombre)");
            //Prepare() prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute.
            
            //bindParam() Vincula el valor de una variable de PHP a un parámetro de sustitución con nombre o signo de interrogacion correspondiente. Es la sentencia usada para preparar un query de SQL.
            $stmt->bindParam(":id_carrera", $datosModel["id_carrera"], PDO::PARAM_STR); 
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
            $stmt = Conexion::conectar()->prepare("SELECT id_carrera, nombre FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt->close();
        }

        //Método para SELECCIONAR usuarios
        public function editarCarreraModel($datosModel, $tabla){
            $stmt = Conexion::conectar()->prepare("SELECT id_carrera, nombre FROM $tabla
            where id_carrera = :id_carrera");
            $stmt->bindParam(":id_carrera", $datosModel, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
        }
        //Método para ACTUALIZAR usuarios (UPDATE)
        public function actualizarCarreraModel($datosModel, $tabla){
            //Preparar el Query
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_carrera= :id_carrera, nombre= :nombre, clave= :clave, materia= :materia 
            WHERE id_carrera = :id_carrera");
            //Ejecutar el QUERY
            $stmt->bindParam(":id_carrera", $datosModel["id_carrera"], PDO::PARAM_STR);
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
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_carrera = :id_carrera");
            $stmt->bindParam(":id_carrera", $datosModel, PDO::PARAM_STR);
        
            //EJECUTAR
            if($stmt->execute()){
                return "success";
            }else{
                return "error";
            }

            $stmt->close();
        }

        ////////////////////METODOS PARA MATERIAS/////////////////////
        
        //Método del modelo de registro de usuarios (Recibe datos del controlador)
        public function registroMateriaModel($datosModel, $tabla){
            //Prepara el modelo para hacer los inserts a la BD
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_materia,nombre,clave,carrera) VALUES (:id_materia,:nombre,:clave,:carrera)");
            //Prepare() prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute.
            
            //bindParam() Vincula el valor de una variable de PHP a un parámetro de sustitución con nombre o signo de interrogacion correspondiente. Es la sentencia usada para preparar un query de SQL.
            $stmt->bindParam(":id_materia", $datosModel["id_materia"], PDO::PARAM_STR); 
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
            $stmt = Conexion::conectar()->prepare("SELECT id_materia, nombre, clave, carrera FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt->close();
        }

        //Método para SELECCIONAR materias
        public function editarMateriaModel($datosModel, $tabla){
            $stmt = Conexion::conectar()->prepare("SELECT id_materia, nombre, clave, carrera FROM $tabla
            where id_materia = :id_materia");
            $stmt->bindParam(":id_materia", $datosModel, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
        }
        //Método para ACTUALIZAR materias (UPDATE)
        public function actualizarMateriaModel($datosModel, $tabla){
            //Preparar el Query
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_materia= :id_materia, nombre= :nombre, clave= :clave, carrera= :carrera WHERE 
            id_materia = :id_materia");
            //Ejecutar el QUERY
            $stmt->bindParam(":id_materia", $datosModel["id_materia"], PDO::PARAM_STR);
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
        public function borrarMateriaModel($datosModel, $tabla){
            //Preparar el QUERY para eliminar
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_materia = :id_materia");
            $stmt->bindParam(":id_materia", $datosModel, PDO::PARAM_STR);
        
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