<?php

class ControladorEntrenadorLigas{ 


	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function ctrCrearEntrenadorLiga(){

		if(isset($_POST["nuevoEntrenador"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCatLiga"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoEntrenador"]) 
			  
			   ){


				$tabla = "entrenadorliga";

				$datos = array("entrenador" => $_POST["nuevoEntrenador"],
							"catliga" => $_POST["nuevaCatLiga"]);
					           

				$respuesta = ModeloEntrenadorLigas::mdlIngresarEntrenadorLiga($tabla, $datos);
			
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El registro ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "entrenadorligas";

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
						
							window.location = "entrenadorligas";

						}

					});
				

				</script>';

			}


		}


	}

	/*=============================================
	MOSTRAR USUARIO
	=============================================*/

	static public function ctrMostrarEntrenadorLigas($item, $valor){

		$tabla = "entrenadorliga";

		$respuesta = ModeloEntrenadorLigas::MdlMostrarEntrenadorLigas($tabla, $item, $valor);

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

	static public function ctrEditarEntrenadorLiga(){

		if(isset($_POST["editarEntrenador"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarEntrenador"])){


				$tabla = "entrenadorliga";

				$datos = array( "entrenador" => $_POST["editarEntrenador"],
								"catliga" => $_POST["editarCatLiga"],
							   "id"=>$_POST["idEntrenadorLiga"]);
							

				$respuesta = ModeloEntrenadorLigas::mdlEditarEntrenadorLiga($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El registro ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "entrenadorligas";

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

							window.location = "entrenadorligas";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function ctrBorrarEntrenadorLiga(){

		if(isset($_GET["idEntrenadorLiga"])){

			$tabla ="entrenadorliga";
			$datos = $_GET["idEntrenadorLiga"];


			$respuesta = ModeloEntrenadorLigas::mdlBorrarEntrenadorLiga($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El registro ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "entrenadorligas";

								}
							})

				</script>';

			}		

		}

	}


}
	


