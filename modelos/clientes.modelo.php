<?php

require_once "conexion.php";

class ModeloClientes{

	/*=============================================
	CREAR CLIENTE
	=============================================*/

	static public function mdlIngresarCliente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, documento, email, telefono, direccion, fecha_nacimiento) VALUES (:nombre, :documento, :email, :telefono, :direccion, :fecha_nacimiento)");
	
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_INT);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);
	
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
	MOSTRAR CLIENTES
	=============================================*/

	static public function mdlMostrarClientes($tabla, $item, $valor){

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
	EDITAR CLIENTE
	=============================================*/

	static public function mdlEditarCliente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, documento = :documento, email = :email, telefono = :telefono, direccion = :direccion, fecha_nacimiento = :fecha_nacimiento WHERE id = :id");
	
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_INT);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);
	
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
	ELIMINAR CLIENTE
	=============================================*/

	static public function mdlEliminarCliente($tabla, $datos){

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
	

	/*=============================================
	ACTUALIZAR CLIENTE
	=============================================*/

	static public function mdlActualizarCliente($tabla, $item1, $valor1, $valor){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id = :id");
	
		$stmt->bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt->bindParam(":id", $valor, PDO::PARAM_STR);
	
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