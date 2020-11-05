<?php

class ControladorLigas{ 


	/*=============================================
	REGISTRO DE LIGAS
	=============================================*/

	static public function ctrCrearLiga(){

		if(isset($_POST["nuevoNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoDeporte"]) &&
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["nuevaDireccion"])&&
			   preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoTelefono"])){


				$tabla = "ligas";

				$datos = array("nombreliga" => $_POST["nuevoNombre"],
					           "deporte" => $_POST["nuevoDeporte"],
					           "direccion" => $_POST["nuevaDireccion"],
							   "telefono" => $_POST["nuevoTelefono"],
							   "categoria1" => $_POST["nuevaCategoria1"],
							   "categoria2" => $_POST["nuevaCategoria2"],
							   "categoria3" => $_POST["nuevaCategoria3"]);
					           

				$respuesta = ModeloLigas::mdlIngresarLiga($tabla, $datos);
			
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡La liga ha sido guardada correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "ligas";

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
						
							window.location = "ligas";

						}

					});
				

				</script>';

			}


		}


	}

	/*=============================================
	MOSTRAR LIGA
	=============================================*/

	static public function ctrMostrarLigas($item, $valor){

		$tabla = "ligas";

		$respuesta = ModeloLigas::MdlMostrarLigas($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR LIGA
	=============================================*/

	static public function ctrEditarLiga(){

		if(isset($_POST["editarNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])&&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarDeporte"]) &&
				preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["editarDireccion"])&&
				preg_match('/^[()\-0-9 ]+$/', $_POST["editarTelefono"])){


				$tabla = "ligas";

				$datos = array("nombreliga" => $_POST["editarNombre"],
							   "deporte" => $_POST["editarDeporte"],
							   "direccion" => $_POST["editarDireccion"],
							   "telefono" => $_POST["editarTelefono"],
							   "categoria1" => $_POST["editarCategoria1"],
							   "categoria2" => $_POST["editarCategoria2"],
							   "categoria3" => $_POST["editarCategoria3"],
							   "id"=>$_POST["idLiga"]);
							

				$respuesta = ModeloLigas::mdlEditarLiga($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El usuario ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "ligas";

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

							window.location = "ligas";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR LIGA
	=============================================*/

	static public function ctrBorrarLiga(){

		if(isset($_GET["idLiga"])){

			$tabla ="ligas";
			$datos = $_GET["idLiga"];


			$respuesta = ModeloLigas::mdlBorrarLiga($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La liga ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "ligas";

								}
							})

				</script>';

			}		

		}

	}


}
	


