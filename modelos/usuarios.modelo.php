<?php

require_once "conexion.php";

class ModeloUsuarios{

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlMostrarUsuarios($tabla, $item, $valor){

		if($item != null){
	
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
	
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
	
			$stmt->execute();
			$result = $stmt->fetch(); // Guarda el resultado en una variable antes de cerrar el cursor
	
			$stmt->closeCursor(); // Cierra el cursor después de obtener el resultado
			$stmt = null; // Asigna null después de cerrar
	
			return $result; // Retorna el resultado guardado
		}else{
	
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
	
			$stmt->execute();
			$result = $stmt->fetchAll(); // Guarda el resultado en una variable antes de cerrar el cursor
	
			$stmt->closeCursor(); // Cierra el cursor después de obtener el resultado
			$stmt = null; // Asigna null después de cerrar
	
			return $result; // Retorna el resultado guardado
		}
	}
	

	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function mdlIngresarUsuario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, usuario, password, perfil) VALUES (:nombre, :usuario, :password, :perfil)");
	
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);

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
	EDITAR USUARIO
	=============================================*/

	static public function mdlEditarUsuario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, password = :password, perfil = :perfil WHERE usuario = :usuario");
	
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
	
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
	ACTUALIZAR USUARIO
	=============================================*/

	static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");
	
		$stmt->bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt->bindParam(":".$item2, $valor2, PDO::PARAM_STR);
	
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
	BORRAR USUARIO
	=============================================*/

	static public function mdlBorrarUsuario($tabla, $datos){

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