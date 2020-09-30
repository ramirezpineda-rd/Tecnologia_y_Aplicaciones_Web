<?php 
class Paginas{
	public function enlacesPaginasModel($enlaces){
		if($enlaces == "ingresar" || $enlaces == "usuarios" || $enlaces == "editar" || $enlaces == "salir"
		|| $enlaces == "carreras" || $enlaces == "registrarCarrera" || $enlaces == "editarCarrera" || $enlaces == "materias"
		|| $enlaces == "registrarMateria" || $enlaces == "editarMateria"){
			$module =  "view/".$enlaces.".php";
		} 
		else if($enlaces == "index"){
			$module ="view/registrar.php";
		}
		else if($enlaces == "ok"){
			$module ="view/registro.php";
		}
		else if($enlaces == "fallo"){
			$module ="view/ingresar.php";
		}
		else if($enlaces == "cambio"){
			$module ="view/usuarios.php";
		}
		else{
			$module ="view/registrar.php";
		}
		return $module;
	}
}

?>