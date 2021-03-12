<?php

// peticion get para traer información del crud

if($_SERVER['REQUEST_METHOD']=='GET'){

    $producto= unserialize(base64_decode($_GET['objeto']));
    $id=$producto["id"];
    $codigo=$producto["codigo"];
    $nombre=$producto["nombre"];
    $descripcion=$producto["descripcion"];
    $marca=$producto["marca"];
    $id_categoria=$producto["id_categoria"];
    $precio=$producto["precio"];
   

}

else if($_SERVER['REQUEST_METHOD']=='POST'){

require_once '../../../modelo/productodao.php';
$dao=new productoDao();
if(isset($_POST['boton'])){

    if($_POST['boton']=='actualizar'){


        if(isset($_POST['id']) & isset($_POST['codigo']) & isset($_POST['nombre'])  & isset($_POST['descripcion']) &  isset($_POST['marca']) & isset($_POST['id_categoria']) & isset($_POST['precio'])){

        $id=htmlspecialchars($_POST['id']);
        $codigo=htmlspecialchars($_POST['codigo']);
        $nombre=htmlspecialchars($_POST['nombre']);
        $descripcion=htmlspecialchars($_POST['descripcion']);
        $marca=htmlspecialchars($_POST['marca']);
        $id_categoria=htmlspecialchars($_POST['id_categoria']); 
        $precio=htmlspecialchars($_POST['precio']);

        if(empty($id) | empty($codigo) | empty($nombre) | empty($descripcion)| empty($marca) | empty($id_categoria) | empty($precio)){
            $mensaje="Campo Vacio";
        } 
        else{

            $mensaje=$dao->actualizarProducto($id,$codigo,$nombre,$descripcion,$marca,$id_categoria,$precio); 
        }
        
        }

    }  
    else if($_POST['boton']=='limpiar'){

        $id="";
        $codigo="";
        $nombre="";
        $descripcion="";
        $marca="";
        $precio="";
        $mensaje="";
    }  

    }  
}   

require_once 'vistaActualizar.php';
 