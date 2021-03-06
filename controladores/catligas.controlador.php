<?php


/*require_once "../controladores/ligas.controlador.php";
require_once "../modelos/ligas.modelo.php"; 

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php"; */

class ControladorCatLigas{ 


	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function ctrCrearCatLiga(){

		if(isset($_POST["nuevaLiga"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaLiga"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevaCategoria"]) 
			  
			   ){


				$tabla = "catligas";

				$datos = array("liga" => $_POST["nuevaLiga"],
					           "categoria" => $_POST["nuevaCategoria"]);
					           

				$respuesta = ModeloCatLigas::mdlIngresarCatLiga($tabla, $datos);
			
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El registro se ha guardado correctamente!",
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
						title: "¡Los datos no puede ir vacío o llevar caracteres especiales!",
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

	static public function ctrMostrarCatLigas($item, $valor){

		$tabla1 = "catligas";
		$tabla2 = "ligas";
		$tabla3 = "categorias";

		$respuesta = ModeloCatLigas::MdlMostrarConsulta($tabla1, $tabla2, $tabla3, $item, $valor);

		return $respuesta;
	}

	static public function ctrMostrarCatLigas1($item, $valor){

		$tabla = "catligas";

		$respuesta = ModeloCatLigas::MdlMostrarCatLigas($tabla, $item, $valor);

		return $respuesta;
	}

	


	/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function ctrEditarCatLiga(){

		if(isset($_POST["editarLiga"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarLiga"]) &&
			preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarCategoria"])){


				$tabla = "catligas";

				$datos = array("liga" => $_POST["editarLiga"],
							   "categoria" => $_POST["editarCategoria"],
							   "id"=>$_POST["idCatLiga"]);
							

				$respuesta = ModeloCatLigas::mdlEditarCatLiga($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El registro ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "catligas";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los datos no pueden ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "catligas";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function ctrBorrarCatLiga(){

		if(isset($_GET["idCatLiga"])){

			$tabla ="catligas";
			$datos = $_GET["idCatLiga"];


			$respuesta = ModeloCatLigas::mdlBorrarCatLiga($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El registro ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "catligas";

								}
							})

				</script>';

			}		

		}

	}


}
	


