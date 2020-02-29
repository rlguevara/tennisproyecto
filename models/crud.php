<?php

#EXTENSIÓN DE CLASES: Los objetos pueden ser extendidos, y pueden heredar propiedades y métodos. Para definir una clase como extensión, debo definir una clase padre, y se utiliza dentro de una clase hija.

require_once "conexion.php";

class Datos extends Conexion{

    #INGRESO USUARIO
	#-------------------------------------
	public function ingresoUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT IdEntrenador, Usuario, Clave FROM $tabla WHERE Usuario = :usuario");	
		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
        $stmt->execute();

		#fetch(): Obtiene una fila de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetch();

		$stmt->close();

	}


	#VISTA USUARIOS
	#-------------------------------------

	public function vistaUsuariosModel($tabla){


		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE
		IdEntrenador = :IdEntrenador");
		$stmt->bindParam(":IdEntrenador", $_SESSION["usuario"], PDO::PARAM_INT);	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}


	#VISTA USUARIOS
	#-------------------------------------

	public function vistaEntrenadorModel($tabla){


		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE
		IdEntrenador = :IdEntrenador");
		$stmt->bindParam(":IdEntrenador", $_SESSION["usuario"], PDO::PARAM_INT);	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetch();

		$stmt->close();

	}

		#VISTA ESTADISTICAS
	#-------------------------------------

	public function vistaEstadisticasModel($IdJugActual){

		$IdJug = (int) $IdJugActual;

		$stmt = Conexion::conectar()->prepare("SELECT * FROM estadisticajugador as EJ, tenista as TE WHERE TE.IdTenista = :IdJugActual AND TE.IdTenista = EJ.IdTenista");
		$stmt->bindParam(":IdJugActual", $IdJug, PDO::PARAM_INT);	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetch();

		$stmt->close();

	}

	public function vistaEstadisticasPartidoModel($IdJugActual){

		$IdJug = (int) $IdJugActual;

		$stmt = Conexion::conectar()->prepare("SELECT * FROM estadisticaporpartido as EP WHERE EP.IdTenista = :IdJugActual");
		$stmt->bindParam(":IdJugActual", $IdJug, PDO::PARAM_INT);	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetch();

		$stmt->close();

	}

}

?>