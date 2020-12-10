<?php

require_once "../controladores/becas.controlador.php";
require_once "../modelos/becas.modelo.php";

class AjaxBecas{

	/*=============================================
	EDITAR BECA
	=============================================*/	

	public $idBeca;

	public function ajaxEditarBeca(){

		$item = "id";
		$valor = $this->idBeca;

		$respuesta = ControladorBecas::ctrMostrarBecas($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR BECA
=============================================*/	
if(isset($_POST["idBeca"])){

	$beca = new AjaxBecas();
	$beca -> idBeca = $_POST["idBeca"];
	$beca -> ajaxEditarBeca();
}
