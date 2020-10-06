<?php 
class Paginas{
	public function enlacesPaginasModel($enlaces){
		if($enlaces == "ingresar" || $enlaces == "usuarios" || $enlaces == "editar" || $enlaces == "salir"
		|| $enlaces == "libros" || $enlaces == "editarLibro")
		{ 
		   $module =  "View/".$enlaces.".php";
		} 
		else if($enlaces == "index"){
			$module ="View/registrar.php";
		}
		else if($enlaces == "ok"){
			$module ="View/registrar.php";
		}
		else if($enlaces == "fallo"){
			$module ="View/ingresar.php";
		}
		else if($enlaces == "cambio"){
			$module ="View/usuarios.php";
		}
		else{
			$module ="View/registrar.php";
		}
		return $module;
	}
}

?>