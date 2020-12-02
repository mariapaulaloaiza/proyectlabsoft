<?php

require_once "../controladores/entrenadores.controlador.php";
require_once "../modelos/entrenadores.modelo.php";

require_once "../controladores/ligas.controlador.php";
require_once "../modelos/ligas.modelo.php";


class AjaxEntrenadores{

	/*=============================================
	EDITAR ENTRENADOR
	=============================================*/	

	public $idEntrenador;

	public function ajaxEditarEntrenador(){

		$item = "id";
		$valor = $this->idEntrenador;

		$respuesta = ControladorEntrenadores::ctrMostrarEntrenadores($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR ENTRENADORES
=============================================*/	
if(isset($_POST["idEntrenador"])){

	$entrenador = new AjaxEntrenadores();
	$entrenador -> idEntrenador = $_POST["idEntrenador"];
	$entrenador -> ajaxEditarEntrenador();
}
