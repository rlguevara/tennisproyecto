<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "ingresar" || $enlaces == "estadisticas" || $enlaces == "usuarios" || $enlaces == "perfil" || $enlaces == "salir"){

			$module =  "views/modules/".$enlaces.".php";
		
		}

		else if($enlaces == "index"){

			$module =  "views/modules/login.php";
		
        }
		else{

			$module =  "views/modules/login.php";

		}
		
		return $module;

	}

}

?>