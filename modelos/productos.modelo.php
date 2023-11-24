<?php

require_once "conexion.php";

class ModeloProductos{

	/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	static public function mdlMostrarProductos($tabla, $item, $valor, $orden){

		$stmt = null; // Inicializa la variable $stmt
	
		if($item != null){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt->execute();
			$result = $stmt->fetch();
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $orden DESC");
			$stmt->execute();
			$result = $stmt->fetchAll();
		}
	
		$stmt->closeCursor(); // Cierra el cursor antes de retornar
		$stmt = null; // Asigna null después de cerrar
	
		return $result;
	}
	

	/*=============================================
	REGISTRO DE PRODUCTO
	=============================================*/
	static public function mdlIngresarProducto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_categoria, codigo, descripcion, stock, precio_compra, precio_venta) VALUES (:id_categoria, :codigo, :descripcion, :stock, :precio_compra, :precio_venta)");
	
		$stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_compra", $datos["precio_compra"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_venta", $datos["precio_venta"], PDO::PARAM_STR);
	
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
	EDITAR PRODUCTO
	=============================================*/
	static public function mdlEditarProducto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_categoria = :id_categoria, descripcion = :descripcion, stock = :stock, precio_compra = :precio_compra, precio_venta = :precio_venta WHERE codigo = :codigo");
	
		$stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_compra", $datos["precio_compra"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_venta", $datos["precio_venta"], PDO::PARAM_STR);
	
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
	BORRAR PRODUCTO
	=============================================*/

	static public function mdlEliminarProducto($tabla, $datos){

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
	ACTUALIZAR PRODUCTO
	=============================================*/

	static public function mdlActualizarProducto($tabla, $item1, $valor1, $valor){

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
	

	/*=============================================
	MOSTRAR SUMA VENTAS
	=============================================*/	

	static public function mdlMostrarSumaVentas($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT SUM(ventas) as total FROM $tabla");
	
		$stmt->execute();
		$result = $stmt->fetch(); // Guarda el resultado en una variable antes de cerrar el cursor
	
		$stmt->closeCursor(); // Cierra el cursor después de obtener el resultado
		$stmt = null; // Asigna null después de cerrar
	
		return $result; // Retorna el resultado guardado
	}
	


}