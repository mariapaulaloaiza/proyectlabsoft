<?php

class ControladorBecaDeportista{ 


	/*=============================================
	REGISTRO 
	=============================================*/

	static public function ctrCrearBecaDeportista(){

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
	MOSTRAR 
	=============================================*/

	static public function ctrMostrarBecaDeportista($item, $valor){

		$tabla = "becadeportista";

		$respuesta = ModeloBecaDeportista::MdlMostrarBecaDeportista($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR 
	=============================================*/

	static public function ctrEditarBecaDeportista(){

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
						  title: "El usuario ha sido editado correctamente",
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
						  title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
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
	BORRAR 
	=============================================*/

	static public function ctrBorrarBecaDeportista(){

		if(isset($_GET["idCatLiga"])){

			$tabla ="catligas";
			$datos = $_GET["idCatLiga"];


			$respuesta = ModeloCatLigas::mdlBorrarCatLiga($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El usuario ha sido borrado correctamente",
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
	


