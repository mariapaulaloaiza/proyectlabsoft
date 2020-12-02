<?php

class ControladorLigas{

	/*=============================================
	CREAR CATEGORIAS
	=============================================*/

	static public function ctrCrearLiga(){

		if(isset($_POST["nuevaLiga"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\- ]+$/', $_POST["nuevaLiga"])&&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\- ]+$/', $_POST["nuevoDeporte"])&&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\- ]+$/', $_POST["nuevaDireccion"])&&
				preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoTelefono"])){

				$tabla = "ligas";

				$datos = array("nombreliga"=>$_POST["nuevaLiga"],
								"deporte"=>$_POST["nuevoDeporte"],
								"direccion"=>$_POST["nuevaDireccion"],
								"telefono"=>$_POST["nuevoTelefono"]);

				$respuesta = ModeloLigas::mdlIngresarLigas($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La categoría ha sido guardada correctamente",
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
						  title: "¡La categoría no puede ir vacía o llevar caracteres especiales diferentes a un guión!",
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
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function ctrMostrarLigas($item, $valor){

		$tabla = "ligas";

		$respuesta = ModeloLigas::mdlMostrarLigas($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function ctrEditarLiga(){

		if(isset($_POST["editarLiga"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarLiga"])&&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDeporte"])&&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDireccion"])&&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTelefono"])){

				$tabla = "ligas";

				$datos = array("nombreliga"=>$_POST["editarLiga"],
								"deporte"=>$_POST["editarDeporte"],
								"direccion"=>$_POST["editarDireccion"],
								"telefono"=>$_POST["editarTelefono"],

							   "id"=>$_POST["idLiga"]);

				$respuesta = ModeloLigas::mdlEditarLiga($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La categoría ha sido cambiada correctamente",
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
						  title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
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
	BORRAR CATEGORIA
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
						  title: "La categoría ha sido borrada correctamente",
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
