<?php

class ControladorDeportistaLigas{ 


	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function ctrCrearDeportistaLiga(){

		if(isset($_POST["nuevoDeportista"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCatLiga"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoDeportista"]) 
			  
			   ){


				$tabla = "deportistaliga";

				$datos = array("deportista" => $_POST["nuevoDeportista"],
							"catliga" => $_POST["nuevaCatLiga"]);
					           

				$respuesta = ModeloDeportistaLigas::mdlIngresarDeportistaLiga($tabla, $datos);
			
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El registro ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "deportistaligas";

						}

					});
				

					</script>';


				}	


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡Los datos no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "deportistaligas";

						}

					});
				

				</script>';

			}


		}


	}

	/*=============================================
	MOSTRAR USUARIO
	=============================================*/

	static public function ctrMostrarDeportistaLigas($item, $valor){

		$tabla = "deportistaliga";

		$respuesta = ModeloDeportistaLigas::MdlMostrarDeportistaLigas($tabla, $item, $valor);

		return $respuesta;
	}

	/*static public function ctrMostrarEntrenadorLigas1($item, $valor){

		$tabla = "entrenadorliga";

		$respuesta = ModeloEntrenadorLigas::MdlMostrarEntrenadorLigas1($tabla, $item, $valor);

		return $respuesta;
	} */

	/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function ctrEditarDeportistaLiga(){

		if(isset($_POST["editarDeportista"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDeportista"])){


				$tabla = "deportistaliga";

				$datos = array( "deportista" => $_POST["editarDeportista"],
								"catliga" => $_POST["editarCatLiga"],
							   "id"=>$_POST["idDeportistaLiga"]);
							

				$respuesta = ModeloDeportistaLigas::mdlEditarDeportistaLiga($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El registro ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "deportistaligas";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los datos no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "deportistaligas";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR 
	=============================================*/

	static public function ctrBorrarDeportistaLiga(){

		if(isset($_GET["idDeportistaLiga"])){

			$tabla ="deportistaliga";
			$datos = $_GET["idDeportistaLiga"];


			$respuesta = ModeloDeportistaLigas::mdlBorrarDeportistaLiga($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El registro ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "deportistaligas";

								}
							})

				</script>';

			}		

		}

	}


}
	


