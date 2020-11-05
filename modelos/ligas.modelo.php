<?php

require_once "conexion.php";

class ModeloLigas{

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlMostrarLigas($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function mdlIngresarLiga($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombreliga, deporte, direccion, telefono, categoria1, categoria2, categoria3) VALUES (:nombreliga, :deporte, :direccion, :telefono,:categoria1, :categoria2, :categoria3)");

		$stmt->bindParam(":nombreliga", $datos["nombreliga"], PDO::PARAM_STR);
		$stmt->bindParam(":deporte", $datos["deporte"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":categoria1", $datos["categoria1"], PDO::PARAM_STR);
		$stmt->bindParam(":categoria2", $datos["categoria2"], PDO::PARAM_STR);
		$stmt->bindParam(":categoria3", $datos["categoria3"], PDO::PARAM_STR);
		
		
		

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}

	/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function mdlEditarLiga($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombreliga = :nombreliga, deporte = :deporte, direccion = :direccion, telefono = :telefono, categoria1 =:categoria1, categoria2 =:categoria2, categoria3 =:categoria3  WHERE id = :id");

		$stmt -> bindParam(":nombreliga", $datos["nombreliga"], PDO::PARAM_STR);
		$stmt -> bindParam(":deporte", $datos["deporte"], PDO::PARAM_STR);
		$stmt -> bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt -> bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt -> bindParam(":categoria1", $datos["categoria1"], PDO::PARAM_STR);
		$stmt -> bindParam(":categoria2", $datos["categoria2"], PDO::PARAM_STR);
		$stmt -> bindParam(":categoria3", $datos["categoria3"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	ACTUALIZAR USUARIO
	=============================================*/

	static public function mdlActualizarLiga($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function mdlBorrarLiga($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}

}