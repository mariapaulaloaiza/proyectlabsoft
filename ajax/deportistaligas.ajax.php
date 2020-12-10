<?php

require_once "../controladores/deportistaligas.controlador.php";
require_once "../modelos/deportistaligas.modelo.php";

class AjaxDeportistaLigas{

	/*=============================================
	EDITAR 
	=============================================*/	

	public $idDeportistaLiga;

	public function ajaxEditarDeportistaLiga(){

		$item = "id";
		$valor = $this->idDeportistaLiga;

		$respuesta = ControladorDeportistaLigas::ctrMostrarDeportistaLigas($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	
if(isset($_POST["idDeportistaLiga"])){

	$deportistaliga = new AjaxDeportistaLigas();
	$deportistaliga -> idDeportistaLiga = $_POST["idDeportistaLiga"];
	$deportistaliga -> ajaxEditarDeportistaLiga();
}
