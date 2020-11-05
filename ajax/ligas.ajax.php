<?php

require_once "../controladores/ligas.controlador.php";
require_once "../modelos/ligas.modelo.php";

class AjaxLigas{

	/*=============================================
	EDITAR LIGA
	=============================================*/	

	public $idLiga;

	public function ajaxEditarLiga(){

		$item = "id";
		$valor = $this->idLiga;

		$respuesta = ControladorLigas::ctrMostrarLigas($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR LIGA
=============================================*/	
if(isset($_POST["idLiga"])){

	$liga = new AjaxLigas();
	$liga -> idLiga = $_POST["idLiga"];
	$liga -> ajaxEditarLiga();
}
