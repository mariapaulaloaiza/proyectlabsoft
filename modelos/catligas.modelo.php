<?php

require_once "conexion.php";


class ModeloCatLigas{

	/*=============================================
	MOSTRAR 
	=============================================*/

	static public function mdlMostrarCatLigas($tabla, $item, $valor){

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
	

	static public function mdlMostrarConsulta($tabla1, $tabla2, $tabla3,  $item, $valor){

			$stmt = Conexion::conectar()->prepare("SELECT  $tabla1.id as id, $tabla2.nombreliga as liga, $tabla3.categoria as categoria FROM $tabla1 INNER JOIN $tabla2 on $tabla2.id = $tabla1.liga INNER JOIN $tabla3 ON $tabla3.id = $tabla1.categoria");

			$stmt -> execute();

			return $stmt -> fetchAll();
	
			$stmt -> close();

			$stmt = null;

	}
	
	/*=============================================
	REGISTRO 
	=============================================*/

	static public function mdlIngresarCatLiga($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(liga, categoria) VALUES (:liga, :categoria)");

		$stmt->bindParam(":liga", $datos["liga"], PDO::PARAM_STR);
		$stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
		

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}

	/*=============================================
	EDITAR 
	=============================================*/

	static public function mdlEditarCatLiga($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET liga = :liga, categoria = :categoria  WHERE id = :id");

		$stmt -> bindParam(":liga", $datos["liga"], PDO::PARAM_STR);
		$stmt -> bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
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
	BORRAR 
	=============================================*/

	static public function mdlBorrarCatLiga($tabla, $datos){

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