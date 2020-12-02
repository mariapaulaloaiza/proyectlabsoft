<?php

require_once "conexion.php";

class ModeloDeportista{

	/*=============================================
	MOSTRAR DEPORTISTAS
	=============================================*/

	static public function mdlMostrarDeportistas($tabla, $item, $valor){

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
	REGISTRO DE DEPORTISTA
	=============================================*/

	static public function mdlIngresarDeportista($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, documento, edad, celular, liga, estrato, rendimiento, faltas, observaciones) VALUES (:nombre, :documento, :edad, :celular, :liga, :estrato, :rendimiento, :faltas, :observaciones)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
		$stmt->bindParam(":edad", $datos["edad"], PDO::PARAM_STR);
		$stmt->bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
		$stmt->bindParam(":liga", $datos["liga"], PDO::PARAM_STR);
		$stmt->bindParam(":estrato", $datos["estrato"], PDO::PARAM_STR);
		$stmt->bindParam(":rendimiento", $datos["rendimiento"], PDO::PARAM_STR);
		$stmt->bindParam(":faltas", $datos["faltas"], PDO::PARAM_STR);
		$stmt->bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);
		

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}

	/*=============================================
	EDITAR DEPORTISTA
	=============================================*/

	static public function mdlEditarDeportista($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, documento = :documento, edad = :edad, celular = :celular, liga = :liga, estrato = :estrato, rendimiento = :rendimiento, faltas = :faltas, observaciones = :observaciones  WHERE id = :id");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
		$stmt -> bindParam(":edad", $datos["edad"], PDO::PARAM_STR);
		$stmt -> bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
		$stmt -> bindParam(":liga", $datos["liga"], PDO::PARAM_STR);
		$stmt -> bindParam(":estrato", $datos["estrato"], PDO::PARAM_STR);
		$stmt -> bindParam(":rendimiento", $datos["rendimiento"], PDO::PARAM_STR);
		$stmt -> bindParam(":faltas", $datos["faltas"], PDO::PARAM_STR);
		$stmt -> bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);
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
	ACTUALIZAR DEPORTISTAS
	=============================================*/

	static public function mdlActualizarEntrenador($tabla, $item1, $valor1, $item2, $valor2){

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
	BORRAR DEPORTISTA
	=============================================*/

	static public function mdlBorrarDeportista($tabla, $datos){

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