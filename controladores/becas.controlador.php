<?php

class ControladorBecas{ 


	/*=============================================
	REGISTRO DE BECA
	=============================================*/

	static public function ctrCrearBecas(){

		if(isset($_POST["nuevaBeca"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaBeca"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoResponsable"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDescripcion"]) &&
			   preg_match('/^[0-9 ]+$/', $_POST["nuevaEdadMinima"])&&
			   preg_match('/^[0-9 ]+$/', $_POST["nuevaEdadMaxima"])&&
			   preg_match('/^[0-9 ]+$/', $_POST["nuevoRendimiento"])){

				if($_POST["nuevoEstrato"]== 0){

					$_POST["nuevoEstrato"]= 6;

				}

				

				date_default_timezone_set('America/Bogota');

						$fecha = date('Y-m-d');
						$hora = date('H:i:s');

						$fechaActual = $fecha.' '.$hora;


				$tabla = "becas";

				$datos = array("beca" => $_POST["nuevaBeca"],
							   "responsable" => $_POST["nuevoResponsable"],
							   "descripcion" => $_POST["nuevaDescripcion"],
							   "edadMinima" => $_POST["nuevaEdadMinima"],
							   "edadMaxima" => $_POST["nuevaEdadMaxima"],
							   "estratoMaximo" => $_POST["nuevoEstrato"],
							   "rendimientoMinimo" => $_POST["nuevoRendimiento"],
							   "campeonatos" => $_POST["nuevoCampeonato"],
							   "fecha" => $fechaActual);
					           

				$respuesta = ModeloBecas::mdlIngresarBeca($tabla, $datos);

				/*$deportitas = ModeloDeportista::mdlMostrarConsultaD($datos);

				foreach ($deportistas as $value){

					ModeloBecaDeportista::mdlIngresarBecaDeportista("1", $value);



				} */


			
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡La beca ha sido guardada correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "becas";

						}

					});
				

					</script>';


				}	


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡Los datos de la no pueden ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "becas";

						}

					});
				

				</script>';

			}


		}


	}

	/*=============================================
	MOSTRAR BECAS
	=============================================*/

	static public function ctrMostrarBecas($item, $valor){

		$tabla = "becas";

		$respuesta = ModeloBecas::MdlMostrarBecas($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR BECA
	=============================================*/

	static public function ctrEditarBeca(){

		if(isset($_POST["editarBeca"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarBeca"])&&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarResponsable"])&&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcion"])&&
				preg_match('/^[0-9 ]+$/', $_POST["editarEdadMinima"])&&
				preg_match('/^[0-9 ]+$/', $_POST["editarEdadMaxima"])&&
				preg_match('/^[0-9 ]+$/', $_POST["editarEstrato"]) &&
				preg_match('/^[0-9 ]+$/', $_POST["editarRendimiento"]) &&
				preg_match('/^[0-9 ]+$/', $_POST["editarCampeonato"])){


				

				
				$tabla = "becas";

				$datos = array("beca" => $_POST["editarBeca"],
							   "responsable" => $_POST["editarResponsable"],
							   "descripcion" => $_POST["editarDescripcion"],
							   "edadMinima" => $_POST["editarEdadMinima"],
							   "edadMaxima" => $_POST["editarEdadMaxima"],
							   "estratoMaximo" => $_POST["editarEstrato"],
							   "rendimientoMinimo" => $_POST["editarRendimiento"],
							   "campeonatos" => $_POST["editarCampeonato"],
							   "id"=>$_POST["idBeca"]);
							

				$respuesta = ModeloBecas::mdlEditarBeca($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La beca ha sido editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "becas";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los datos de la beca puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "becas";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR BECA
	=============================================*/

	static public function ctrBorrarBeca(){

		if(isset($_GET["idBeca"])){

			$tabla ="becas";
			$datos = $_GET["idBeca"];


			$respuesta = ModeloBecas::mdlBorrarBeca($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La beca ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "becas";

								}
							})

				</script>';

			}		

		}

	}


}
	


