<?php

class ControladorEntrenadorLigas{ 


	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function ctrCrearEntrenadorLiga(){

		if(isset($_POST["nuevaLiga"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaLiga"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoEntrenador"]) 
			  
			   ){


				$tabla = "entrenadorliga";

				$datos = array("liga" => $_POST["nuevaLiga"],
					           "entrenador" => $_POST["nuevoEntrenador"]);
					           

				$respuesta = ModeloEntrenadorLigas::mdlIngresarEntrenadorLiga($tabla, $datos);
			
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El usuario ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "catligas";

						}

					});
				

					</script>';


				}	


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "catligas";

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

	/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function ctrEditarEntrenadorLiga(){

		if(isset($_POST["editarLiga"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarLiga"]) &&
			preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarEntrenador"])){


				$tabla = "entrenadorligas";

				$datos = array("liga" => $_POST["editarLiga"],
							   "entrenador" => $_POST["editarEntrenador"],
							   "id"=>$_POST["idEntrenadorLiga"]);
							

				$respuesta = ModeloEntrenadorLigas::mdlEditarEntrenadorLiga($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El usuario ha sido editado correctamente",
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
						  title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
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

			$tabla ="entrenadorligas";
			$datos = $_GET["idEntrenadorLiga"];


			$respuesta = ModeloEntrenadorLigas::mdlBorrarEntrenadorLiga($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El usuario ha sido borrado correctamente",
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
	


