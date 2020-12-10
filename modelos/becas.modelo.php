<?php

require_once "conexion.php";

class ModeloBecas{

	/*=============================================
	MOSTRAR BECAS
	=============================================*/

	static public function mdlMostrarBecas($tabla, $item, $valor){

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

	static public function mdlMostrarBecasFecha(){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM becas ORDER BY fecha DESC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	


	/*=============================================
	REGISTRO DE BECAS
	=============================================*/

	static public function mdlIngresarBeca($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(beca, responsable, descripcion, edadMinima, edadMaxima, estratoMaximo, rendimientoMinimo, campeonatos, fecha) VALUES (:beca, :responsable, :descripcion, :edadMinima, :edadMaxima, :estratoMaximo, :rendimientoMinimo, :campeonatos, :fecha)");

		$stmt->bindParam(":beca", $datos["beca"], PDO::PARAM_STR);
		$stmt->bindParam(":responsable", $datos["responsable"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":edadMinima", $datos["edadMinima"], PDO::PARAM_STR);
		$stmt->bindParam(":edadMaxima", $datos["edadMaxima"], PDO::PARAM_STR);
		$stmt->bindParam(":estratoMaximo", $datos["estratoMaximo"], PDO::PARAM_STR);
		$stmt->bindParam(":rendimientoMinimo", $datos["rendimientoMinimo"], PDO::PARAM_STR);
		$stmt->bindParam(":campeonatos", $datos["campeonatos"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
				

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}

	/*=============================================
	EDITAR BECAS
	=============================================*/

	static public function mdlEditarBeca($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET beca = :beca, responsable = :responsable, descripcion = :descripcion, edadMinima = :edadMinima, edadMaxima = :edadMaxima, estratoMaximo = :estratoMaximo, rendimientoMinimo = :rendimientoMinimo, campeonatos = :campeonatos WHERE id = :id");

		$stmt -> bindParam(":beca", $datos["beca"], PDO::PARAM_STR);
		$stmt -> bindParam(":responsable", $datos["responsable"], PDO::PARAM_STR);
		$stmt -> bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt -> bindParam(":edadMinima", $datos["edadMinima"], PDO::PARAM_STR);
		$stmt -> bindParam(":edadMaxima", $datos["edadMaxima"], PDO::PARAM_STR);
		$stmt -> bindParam(":estratoMaximo", $datos["estratoMaximo"], PDO::PARAM_STR);
		$stmt -> bindParam(":rendimientoMinimo", $datos["rendimientoMinimo"], PDO::PARAM_STR);
		$stmt -> bindParam(":campeonatos", $datos["campeonatos"], PDO::PARAM_STR);
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
	=============================================

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

	}*/

	/*=============================================
	BORRAR BECA
	=============================================*/

	static public function mdlBorrarBeca($tabla, $datos){

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