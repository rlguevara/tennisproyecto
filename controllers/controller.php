<?php

class MvcController{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	public function pagina(){	
		
		include "views/template.php";
	
	}

	#ENLACES
	#-------------------------------------

	public function enlacesPaginasController(){

		if(isset( $_GET['action'])){
			
			$enlaces = $_GET['action'];
		
		}

		else{

			$enlaces = "index";
		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;

	}

	#INGRESO DE USUARIOS
	#------------------------------------
	public function ingresoUsuarioController(){

		if(isset($_POST["usuarioIngreso"])){

			$datosController = array( "usuario"=>$_POST["usuarioIngreso"], 
								      "password"=>$_POST["passwordIngreso"]);

			$respuesta = Datos::ingresoUsuarioModel($datosController, "entrenador");

			if($respuesta["Usuario"] == $_POST["usuarioIngreso"] && 
			   $respuesta["Clave"] == $_POST["passwordIngreso"]){

				session_start();

				$_SESSION["validar"] = true;
				$_SESSION["usuario"] = $respuesta["IdEntrenador"];

				echo "Conecto";
				header("location:index.php?action=usuarios");

			}

			else{

				echo "Fallo";
				header("location:index.php?action=fallo");

			}

		}	

	}
	
	#VISTA DE USUARIOS
	#------------------------------------

	public function vistaUsuariosController(){

		$respuesta = Datos::vistaUsuariosModel("tenista");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'
		<div class="col-lg-4">
		<div class="card card-chart">
		<div class="card-header">
		  <h5 class="card-category">Tenista '.$item['IdTenista'].'</h5>
		  <h4 class="card-title"><a href="index.php?action=estadisticas&amp;id='.$item['IdTenista'].'">
			'.$item["Nombre"].' '.$item["Apellido"].'</a></h4>

		</div>
		<div class="card-body">
		  <img class="card-img-top" src="assets/img/mario_perfil.jpg" alt="Card image cap">
		</div>
		<div class="card-footer">
		  <div class="stats">
			<i class="now-ui-icons ui-2_time-alarm"></i> Ultimo partido dd/mm/aaaa
		  </div>
		</div>
	  </div>

  </div>';

		}

	}


	#VISTA DE USUARIOS
	#------------------------------------

	public function vistaEntrenadorController(){

		$respuesta = Datos::vistaEntrenadorModel("entrenador");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		echo 
		'
		<img class="card-img-top" src="assets/img/MarioTennis2.gif" alt="Card image cap">
		<div class="card-body">
			<h5 class="card-title">'.$respuesta['Nombre'].' '.$respuesta['Apellido'].'</h5>
		</div>
		<ul class="list-group list-group-flush">
			<li class="list-group-item">Fecha de nacimiento: '.$respuesta['Nacimiento'].'</li>
			<li class="list-group-item">Nacionalidad: '.$respuesta['Nacionalidad'].'</li>
			<li class="list-group-item">Sexo: '.$respuesta['Sexo'].'</li>
		</ul>
		';

	}

	#VISTA DE ESTADISTICAS
	#------------------------------------

	public function vistaEstadisticasController(){
		$IdJug = $_GET['id']['id'];
		$respuesta = Datos::vistaEstadisticasModel($IdJug);
		$partido = Datos::vistaEstadisticasPartidoModel($IdJug);

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		echo 
		'
		<div class="col-lg-8">
		<div class="card">
		  <img class="card-img-top" src="assets/img/MarioTennis2.gif" alt="Card image cap">
		  <div class="card-body">
			<h5 class="card-title">'.$respuesta['Nombre'].' '.$respuesta['Apellido'].'</h5>
		  </div>
		  <ul class="list-group list-group-flush">
			<li class="list-group-item">Fecha de Nacimiento: '.$respuesta['FechaNacimiento'].'</li>
			<li class="list-group-item">Nacionalidad: '.$respuesta['Nacionalidad'].'</li>
			<li class="list-group-item">Diestro: '.$respuesta['Diestro'].'</li>
		  </ul>
		</div>
	  </div>
	  <div class="col-lg-4">
		<div class="card">
		  <div class="card-header">
			<strong> Estadisticas del Jugador </strong>
		  </div>
		  <ul class="list-group list-group-flush">
			<li class="list-group-item">
			  <div class="row">
				<div class="col-lg-9">
				  Aces
				</div>
				<div class="col-lg-3">
				'.$respuesta['Aces'].'
				</div>
			  </div>
			  <li class="list-group-item">
				  <div class="row">
					  <div class="col-lg-9">
						  Doble Faltas
					  </div>
					  <div class="col-lg-3">
					  '.$respuesta['DobleFalta'].'
					  </div>
					</div>
			  </li>
			  <li class="list-group-item">
				  <div class="row">
					  <div class="col-lg-9">
						  Aciertos del 1er Servicio
					  </div>
					  <div class="col-lg-3">
					  '.$respuesta['Aciertos1erServ'].'
					  </div>
					</div>
			  </li>
			  <li class="list-group-item">
				  <div class="row">
					  <div class="col-lg-9">
						  Puntos Ganados en el 1er Servicio
					  </div>
					  <div class="col-lg-3">
					  '.$respuesta['PuntosGana1erServ'].'
					  </div>
					</div>
			  </li>
			  <li class="list-group-item">
				  <div class="row">
					  <div class="col-lg-9">
						  Puntos Ganados 2do Servicio
					  </div>
					  <div class="col-lg-3">
					  '.$respuesta['PuntosGana2doServ'].'
					  </div>
					</div>
			  </li>
			  <li class="list-group-item">
				  <div class="row">
					  <div class="col-lg-9">
						  Puntos por Break Ganados
					  </div>
					  <div class="col-lg-3">
					  '.$respuesta['PuntosBreakGan'].'
					  </div>
					</div>
			  </li>
			  <li class="list-group-item">
				  <div class="row">
					  <div class="col-lg-9">
						  Puntos Ganados
					  </div>
					  <div class="col-lg-3">
					  '.$respuesta['PuntosGana'].'
					  </div>
					</div>
			  </li>
			  <li class="list-group-item">
				  <div class="row">
					  <div class="col-lg-9">
						  Games Ganados
					  </div>
					  <div class="col-lg-3">
					  '.$respuesta['GamesGana'].'
					  </div>
					</div>
			  </li>
			  <li class="list-group-item">
				  <div class="row">
					  <div class="col-lg-9">
						  Maximo de Games seguidos
					  </div>
					  <div class="col-lg-3">
					  '.$respuesta['MaxGamesSeguiGana'].'
					  </div>
					</div>
			  </li>
			  <li class="list-group-item">
				  <div class="row">
					  <div class="col-lg-9">
						  Maximo de Puntos seguidos
					  </div>
					  <div class="col-lg-3">
					  '.$respuesta['MaxPuntosSeguiGana'].'
					  </div>
					</div>
			  </li>
		  </ul>
		</div>
	  </div>
	  </div>
<!--MODAL-->
	  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
Estadisticas por partidos
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
	<div class="modal-header">
	  <h5 class="modal-title" id="exampleModalLabel1">Estadisticas</h5>
	  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	  </button>
	</div>
	<div class="modal-body">
		<table class="table table-striped">
			<tbody>
			  <tr>
				<th scope="row">Aces</th>
				<td>'.$partido['Aces'].'</td>
			  </tr>
			  <tr>
				<th scope="row">Doble Faltas</th>
				<td>'.$partido['DobleFalta'].'</td>
			  </tr>
			  <th scope="row">Servicios</th>
			  <td>'.$partido['Servicios'].'</td>
			  </tr>			  
			  <tr>
				<th scope="row">Acierto del Primer Servicio</th>
				<td>'.$partido['Aciertos1erServ'].'</td>
			  </tr>
			  <tr>
				<th scope="row">Puntos Ganados del 1er Servicio</th>
				<td>'.$partido['PuntosGana1erServ'].'</td>
			  </tr>
			  <tr>
				<th scope="row">Puntos Ganados del 2do Servicio</th>
				<td>'.$partido['PuntosGana2doServ'].'</td>
			  </tr>
			  <tr>
				<th scope="row">Puntos por Break Ganados</th>
				<td>'.$partido['PuntosBreakGan'].'</td>
			  </tr>
			  <tr>
				<th scope="row">Puntos Ganados</th>
				<td>'.$partido['PuntosGana'].'</td>
			  </tr>
			  <tr>
				<th scope="row">Games Ganados</th>
				<td>'.$partido['GamesGana'].'</td>
			  </tr>
			  <tr>
				<th scope="row">Maximo de Games seguidos</th>
				<td>'.$partido['MaxGamesSeguiGana'].'</td>
			  </tr>
			  <tr>
				<th scope="row">Maximo de Puntos seguidos</th>
				<td>'.$partido['MaxPuntosSeguiGana'].'</td>
			  </tr>
			</tbody>
		  </table>
	</div>
  </div>
  
</div>
</div>
<!--FIN DEL PRIMER MODAL-->
<!--MODAL4-->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal4">
Torneos
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
	<div class="modal-header">
	  <h5 class="modal-title" id="exampleModalLabel4">Participacion en Torneos</h5>
	  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	  </button>
	</div>
	<div class="modal-body">
		<table class="table table-striped">
			<tbody>
			  <tr>
				<th scope="row">Numero de Torneos Jugados</th>
				<td>20</td>
			  </tr>
			  <tr>
				<th scope="row">Games Jugados en el Torneo</th>
				<td>30</td>
			  </tr>
			</tbody>
		  </table>
	</div>
  </div>
</div>

		';
		
	}
	
}
?>