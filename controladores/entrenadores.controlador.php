<?php

class ControladorEntrenadores{ 


	/*=============================================
	REGISTRO DE ENTRENADOR
	=============================================*/

	static public function ctrCrearEntrenador(){

		if(isset($_POST["nuevoNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
			   preg_match('/^[\-0-9 ]+$/', $_POST["nuevoDocumento"]) &&
			   preg_match('/^[0-9 ]+$/', $_POST["nuevaEdad"])&&
			   preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoCelular"])&&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["nuevoEmail"])&& 
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoDeporte"])){


				$tabla = "entrenadores";

				$datos = array("nombre" => $_POST["nuevoNombre"],
					           "documento" => $_POST["nuevoDocumento"],
					           "edad" => $_POST["nuevaEdad"],
							   "celular" => $_POST["nuevoCelular"],
							   "email" => $_POST["nuevoEmail"],
							   "deporte" => $_POST["nuevoDeporte"],
							   "liga" => $_POST["nuevaLiga"],
							);
					           

				$respuesta = ModeloEntrenador::mdlIngresarEntrenador($tabla, $datos);
			
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El entrenador ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "entrenadores";

						}

					});
				

					</script>';


				}	


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "entrenadores";

						}

					});
				

				</script>';

			}


		}


	}

	/*=============================================
	MOSTRAR ENTRENADOR
	=============================================*/

	static public function ctrMostrarEntrenadores($item, $valor){

		$tabla = "entrenadores";

		$respuesta = ModeloEntrenador::MdlMostrarEntrenadores($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR ENTRENADOR
	=============================================*/

	static public function ctrEditarEntrenador(){

		if(isset($_POST["editarNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])&&
				preg_match('/^[\-0-9 ]+$/', $_POST["editarDocumento"]) &&
				preg_match('/^[0-9 ]+$/', $_POST["editarEdad"])&&
				preg_match('/^[()\-0-9 ]+$/', $_POST["editarCelular"])&&
				preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["editarEmail"])&& 
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDeporte"])){


				


				$tabla = "entrenadores";

				$datos = array("nombre" => $_POST["editarNombre"],
							   "documento" => $_POST["editarDocumento"],
							   "edad" => $_POST["editarEdad"],
							   "celular" => $_POST["editarCelular"],
							   "email" => $_POST["editarEmail"],
							   "deporte" => $_POST["editarDeporte"],
							   "liga" => $_POST["editarLiga"],
							   "id"=>$_POST["idEntrenador"]);
							

				$respuesta = ModeloEntrenador::mdlEditarEntrenador($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El entrenador ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "entrenadores";

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

							window.location = "entrenadores";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR ENTRENADOR
	=============================================*/

	static public function ctrBorrarEntrenador(){

		if(isset($_GET["idEntrenador"])){

			$tabla ="entrenadores";
			$datos = $_GET["idEntrenador"];


			$respuesta = ModeloEntrenador::mdlBorrarEntrenador($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El entrenador ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "entrenadores";

								}
							})

				</script>';

			}		

		}

	}


}
	


