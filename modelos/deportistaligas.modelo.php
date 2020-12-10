<?php

require_once "conexion.php";

class ModeloDeportistaLigas{

	/*=============================================
	MOSTRAR   
	=============================================*/

	static public function mdlMostrarDeportistaLigas($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT d.nombre as deportista, l.nombreliga as liga, c.categoria as categoria, deportistaliga.id FROM deportistaliga INNER JOIN deportistas d on d.id = deportistaliga.deportista INNER JOIN catligas on catligas.id = deportistaliga.catliga INNER JOIN ligas l on l.id = catligas.liga INNER JOIN categorias c on c.id = catligas.categoria");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}

	/*static public function mdlMostrarEntrenadorLigas1($tabla, $item, $valor){

			$stmt = Conexion::conectar()->prepare("SELECT e.nombre as entrenador, l.nombreliga as liga, c.categoria as categoria, entrenadorliga.id FROM entrenadorliga INNER JOIN entrenadores e on e.id = entrenadorliga.entrenador INNER JOIN catligas on catligas.id = entrenadorliga.catliga INNER JOIN ligas l on l.id = catligas.liga INNER JOIN categorias c on c.id = catligas.categoria");

			$stmt -> execute();

			return $stmt -> fetchAll();

			$stmt -> close();

			$stmt = null;

	} */

	/*=============================================
	REGISTRO 
	=============================================*/

	static public function mdlIngresarDeportistaLiga($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(deportista, catliga) VALUES (:deportista, :catliga)");

		$stmt->bindParam(":deportista", $datos["deportista"], PDO::PARAM_STR);
		$stmt->bindParam(":catliga", $datos["catliga"], PDO::PARAM_STR);
		

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

	static public function mdlEditarDeportistaLiga($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET deportista = :deportista, catliga = :catliga  WHERE id = :id");

		$stmt -> bindParam(":deportista", $datos["deportista"], PDO::PARAM_STR);
		$stmt -> bindParam(":catliga", $datos["catliga"], PDO::PARAM_STR);
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

	static public function mdlBorrarDeportistaLiga($tabla, $datos){

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