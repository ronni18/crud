<?php 
include 'conexion.php';

class productoDao extends conexion{

public function insertarProducto($id,$codigo,$nombre,$descripcion,$marca,$id_categoria,$precio){
	$mensaje="";


	try{
		$conexion=Conexion::conectar();
		$sql="insert into productos(id,codigo,nombre,descripcion,marca,id_categoria,precio) values(:id,:codigo,:nombre,:descripcion,:marca,:id_categoria,:precio) ";
		$stmt=$conexion->prepare($sql);
		$stmt->bindParam(":id",$id);
		$stmt->bindParam(":codigo",$codigo);
		$stmt->bindParam(":nombre",$nombre);
		$stmt->bindParam(":descripcion",$descripcion);
		$stmt->bindParam(":marca",$marca);
    $stmt->bindParam(":id_categoria",$id_categoria);
		$stmt->bindParam(":precio",$precio);
		$stmt->execute();
		$mensaje="Producto guardado con exito!";

	}
	catch(PDOException $e){
		if ($e->errorInfo[1]==1062) {
			$mensaje="El producto existe !!";	}
			// duplicate entry, do something else
			else{ 
				// an error other than duplicate entry occurred
				$e->errorInfo[1];

			}

	}
	return $mensaje;

    }
      public function listaProductos(){
        $conexion=Conexion::conectar();         
        $sql="SELECT * FROM productos join categorias on productos.id_categoria=categorias.id_categoria order by id asc";      
        $stmt = $conexion->prepare($sql); 
        $stmt->execute();
        $array=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt=null;  
        return $array;     
       }


        public function actualizarProducto($id,$codigo,$nombre,$descripcion,$marca,$id_categoria,$precio){

        $mensaje="";
        try{
          
          $conexion=Conexion::conectar();
          $sql="update productos set id=:id,codigo=:codigo,nombre=:nombre,descripcion=:descripcion,marca=:marca,precio=:precio,id_categoria=:id_categoria where id=:id";
          $stmt=$conexion->prepare($sql);
          $stmt->bindParam(":id",$id);
          $stmt->bindParam(":codigo",$codigo);
          $stmt->bindParam(":nombre",$nombre);
          $stmt->bindParam(":descripcion",$descripcion);
          $stmt->bindParam(":marca",$marca);
          $stmt->bindParam(":id_categoria",$id_categoria);  
          $stmt->bindParam(":precio",$precio);
          $stmt->execute();
          $mensaje="Producto actualizado!!";

        }// fin de try

        catch(PDOException $e){

          $mensaje="Problemas al Actualizar Consulte con el Administrador del Sistema!!";

        }// fin del catch

        return $mensaje;

       }// fin del metodo   

       public function eliminarProducto($id){
        $mensaje="";
          try{

            $conexion=Conexion::conectar();
            $sql="delete from productos where id=:id";
            $stmt=$conexion->prepare($sql);
            $stmt->bindParam(":id",$id);
            $stmt->execute();
            $mensaje="Producto eliminado con exito !!";            

          }// fin del try

          catch(PDOException $e){
            $mensaje="Problemas al Eliminar consulte con el administrador";

          }// fin del catch

          return $mensaje;
      }// fin del metodo eliminarUsuario

      

    

}



 



 ?>