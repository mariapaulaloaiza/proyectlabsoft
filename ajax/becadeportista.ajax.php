<?php

require_once "../controladores/catligas.controlador.php";
require_once "../modelos/catligas.modelo.php";

class AjaxBecaDeportista{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/	

	public $idCatLiga;

	public function ajaxEditarCatLiga(){

		$item = "id";
		$valor = $this->idCatLiga;

		$respuesta = ControladorCatLigas::ctrMostrarCatLigas($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	
if(isset($_POST["idCatLiga"])){

	$catliga = new AjaxCatLigas();
	$catliga -> idCatLiga = $_POST["idCatLiga"];
	$catliga -> ajaxEditarCatLiga();
}
