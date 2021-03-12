<?php 
include 'conexion.php';

class categoriaDao extends conexion{

public function insertarCategoria($id_categoria,$codigo_categoria,$nombre_categoria,$descripcion_categoria,$activo){
	$mensaje="";


	try{
		$conexion=Conexion::conectar();
		$sql="insert into categorias(id_categoria,codigo_categoria,nombre_categoria,descripcion_categoria,activo) values(:id_categoria,:codigo_categoria,:nombre_categoria,:descripcion_categoria,:activo) ";
		$stmt=$conexion->prepare($sql);
		$stmt->bindParam(":id_categoria",$id_categoria);
		$stmt->bindParam(":codigo_categoria",$codigo_categoria);
		$stmt->bindParam(":nombre_categoria",$nombre_categoria);
		$stmt->bindParam(":descripcion_categoria",$descripcion_categoria);
		$stmt->bindParam(":activo",$activo);
		$stmt->execute();
		$mensaje="Categoria guardada con exito!";

	}
	catch(PDOException $e){
		if ($e->errorInfo[1]==1062) {
			$mensaje="la categoria existe !!";	}
			// duplicate entry, do something else
			else{ 
				// an error other than duplicate entry occurred
				$e->errorInfo[1];

			}

	}
	return $mensaje;

    }
      public function listaCategoria(){
        $conexion=Conexion::conectar();         
        $sql="SELECT * FROM categorias order by id_categoria asc;";      
        $stmt = $conexion->prepare($sql); 
        $stmt->execute();
        $array=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt=null;  
        return $array;     
       }

        public function actualizarCategoria($id_categoria,$codigo_categoria,$nombre_categoria,$descripcion_categoria,$activo){

        $mensaje="";
        try{
          
          $conexion=Conexion::conectar();
          $sql="update categorias set id_categoria=:id_categoria,codigo_categoria=:codigo_categoria,nombre_categoria=:nombre_categoria,descripcion_categoria=:descripcion_categoria,activo=:activo where id_categoria=:id_categoria";
          $stmt=$conexion->prepare($sql);
          $stmt->bindParam(":id_categoria",$id_categoria);
          $stmt->bindParam(":codigo_categoria",$codigo_categoria);
          $stmt->bindParam(":nombre_categoria",$nombre_categoria);
          $stmt->bindParam(":descripcion_categoria",$descripcion_categoria);
          $stmt->bindParam(":activo",$activo);
          
          $stmt->execute();
          $mensaje="Actualizo Usuario con Exito!!";

        }// fin de try

        catch(PDOException $e){

          $mensaje="Problemas al Actualizar Consulte con el Administrador del Sistema!!";

        }// fin del catch

        return $mensaje;

       }// fin del metodo   

       public function eliminarCategoria($id_categoria){
        $mensaje="";
          try{

            $conexion=Conexion::conectar();
            $sql="delete from categorias where id_categoria=:id_categoria";
            $stmt=$conexion->prepare($sql);
            $stmt->bindParam(":id_categoria",$id_categoria);
            $stmt->execute();
            $mensaje="Categoria eliminada con exito !!";            

          }// fin del try

          catch(PDOException $e){
            $mensaje="Problemas al Eliminar consulte con el administrador";

          }// fin del catch

          return $mensaje;
      }// fin del metodo eliminarUsuario

 }



 ?>