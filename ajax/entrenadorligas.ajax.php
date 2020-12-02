<?php

require_once "../controladores/entrenadorligas.controlador.php";
require_once "../modelos/entrenadorligas.modelo.php";

class AjaxEntrenadorLigas{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/	

	public $idEntrenadorLiga;

	public function ajaxEditarEntrenadorLiga(){

		$item = "id";
		$valor = $this->idEntrenadorLiga;

		$respuesta = ControladorEntrenadorLigas::ctrMostrarEntrenadorLigas($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	
if(isset($_POST["idEntrenadorLiga"])){

	$entrenadorliga = new AjaxEntrenadorLigas();
	$entrenadorliga -> idEntrenadorLiga = $_POST["idEntrenadorLiga"];
	$entrenadorliga -> ajaxEditarEntrenadorLiga();
}
