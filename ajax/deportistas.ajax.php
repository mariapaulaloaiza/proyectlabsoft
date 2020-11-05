<?php

require_once "../controladores/deportistas.controlador.php";
require_once "../modelos/deportistas.modelo.php";

require_once "../controladores/ligas.controlador.php";
require_once "../modelos/ligas.modelo.php";

class AjaxDeportistas{

	/*=============================================
	EDITAR DEPORTISTA
	=============================================*/	
	

	public $idDeportista;

	public function ajaxEditarDeportista(){

		$item = "id";
		$valor = $this->idDeportista;

		$respuesta = ControladorDeportistas::ctrMostrarDeportistas($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR DEPORTISTAS
=============================================*/	
if(isset($_POST["idDeportista"])){

	$deportista = new AjaxDeportistas();
	$deportista -> idDeportista = $_POST["idDeportista"];
	$deportista -> ajaxEditarDeportista();
}
