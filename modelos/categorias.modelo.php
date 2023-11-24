<?php

require_once "conexion.php";

class ModeloCategorias{

	/*=============================================
	CREAR CATEGORIA
	=============================================*/

	static public function mdlIngresarCategoria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(categoria) VALUES (:categoria)");
	
		$stmt->bindParam(":categoria", $datos, PDO::PARAM_STR);
	
		if($stmt->execute()){
			$stmt->closeCursor(); // Cierra el cursor antes de retornar
			$stmt = null; // Asigna null después de cerrar
			return "ok";
		}else{
			$stmt->closeCursor(); // Cierra el cursor antes de retornar
			$stmt = null; // Asigna null después de cerrar
			return "error";
		}
	}
	

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function mdlMostrarCategorias($tabla, $item, $valor){

		$stmt = null; // Inicializa la variable $stmt
	
		if($item != null){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt->execute();
			$result = $stmt->fetch();
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt->execute();
			$result = $stmt->fetchAll();
		}
	
		$stmt->closeCursor(); // Cierra el cursor antes de retornar
		$stmt = null; // Asigna null después de cerrar
	
		return $result;
	}
	

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function mdlEditarCategoria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET categoria = :categoria WHERE id = :id");
	
		$stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
	
		if($stmt->execute()){
			$stmt->closeCursor(); // Cierra el cursor antes de retornar
			$stmt = null; // Asigna null después de cerrar
			return "ok";
		}else{
			$stmt->closeCursor(); // Cierra el cursor antes de retornar
			$stmt = null; // Asigna null después de cerrar
			return "error";
		}
	}
	

	/*=============================================
	BORRAR CATEGORIA
	=============================================*/

	static public function mdlBorrarCategoria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
	
		$stmt->bindParam(":id", $datos, PDO::PARAM_INT);
	
		if($stmt->execute()){
			$stmt->closeCursor(); // Cierra el cursor antes de retornar
			$stmt = null; // Asigna null después de cerrar
			return "ok";
		}else{
			$stmt->closeCursor(); // Cierra el cursor antes de retornar
			$stmt = null; // Asigna null después de cerrar
			return "error";
		}
	}
	

}

