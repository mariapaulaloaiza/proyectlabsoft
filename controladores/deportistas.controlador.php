<?php

class ControladorDeportistas{ 


	/*=============================================
	REGISTRO DE DEPORTISTA
	=============================================*/

	static public function ctrCrearDeportista(){

		if(isset($_POST["nuevoNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
			   preg_match('/^[\-0-9 ]+$/', $_POST["nuevoDocumento"]) &&
			   preg_match('/^[0-9 ]+$/', $_POST["nuevaEdad"])&&
			   preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoCelular"])&&
			   preg_match('/^[0-9 ]+$/', $_POST["nuevoEstrato"]) &&
			   preg_match('/^[0-9 ]+$/', $_POST["nuevoRendimiento"]) &&
			   #preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["nuevoEmail"])&&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCampeonato"]) && 
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaFalta"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaObservacion"])){


				$tabla = "deportistas";

				$datos = array("nombre" => $_POST["nuevoNombre"],
					           "documento" => $_POST["nuevoDocumento"],
					           "edad" => $_POST["nuevaEdad"],
							   "celular" => $_POST["nuevoCelular"],
							   "estrato" => $_POST["nuevoEstrato"],
							   "rendimiento" => $_POST["nuevoRendimiento"],
							   "campeonatos" => $_POST["nuevoCampeonato"],
							   "faltas" => $_POST["nuevaFalta"],
							   "observaciones" => $_POST["nuevaObservacion"]);
					           

				$respuesta = ModeloDeportista::mdlIngresarDeportista($tabla, $datos);
			
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El deportista ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "deportistas";

						}

					});
				

					</script>';


				}	


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡El deportista no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "deportistas";

						}

					});
				

				</script>';

			}


		}


	}

	/*=============================================
	MOSTRAR DEPORTISTA
	=============================================*/

	static public function ctrMostrarDeportistas($item, $valor){

		$tabla = "deportistas";

		$respuesta = ModeloDeportista::MdlMostrarDeportistas($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR DEPORTISTA
	=============================================*/

	static public function ctrEditarDeportista(){

		if(isset($_POST["editarNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])&&
				preg_match('/^[\-0-9 ]+$/', $_POST["editarDocumento"]) &&
				preg_match('/^[0-9 ]+$/', $_POST["editarEdad"])&&
				preg_match('/^[()\-0-9 ]+$/', $_POST["editarCelular"])&&
				preg_match('/^[0-9 ]+$/', $_POST["editarEstrato"]) &&
				preg_match('/^[0-9 ]+$/', $_POST["editarRendimiento"]) &&
				#preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["editarEmail"])&& 
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCampeonato"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarFalta"]) &&
			   	preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarObservacion"])){


				


				$tabla = "deportistas";

				$datos = array("nombre" => $_POST["editarNombre"],
							   "documento" => $_POST["editarDocumento"],
							   "edad" => $_POST["editarEdad"],
							   "celular" => $_POST["editarCelular"],
							   "estrato" => $_POST["editarEstrato"],
							   "rendimiento" => $_POST["editarRendimiento"],
							   "campeonatos" => $_POST["editarCampeonato"],
							   "faltas" => $_POST["editarFalta"],
							   "observaciones" => $_POST["editarObservacion"],
							   "id"=>$_POST["idDeportista"]);
							

				$respuesta = ModeloDeportista::mdlEditarDeportista($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El deportista ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "deportistas";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "deportistas";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR DEPORTISTA
	=============================================*/

	static public function ctrBorrarDeportista(){

		if(isset($_GET["idDeportista"])){

			$tabla ="deportistas";
			$datos = $_GET["idDeportista"];


			$respuesta = ModeloDeportista::mdlBorrarDeportista($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El deportista ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "deportistas";

								}
							})

				</script>';

			}		

		}

	}


}
	


