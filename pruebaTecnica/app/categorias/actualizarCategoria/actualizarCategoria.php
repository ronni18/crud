<?php

// peticion get para traer información del crud

if($_SERVER['REQUEST_METHOD']=='GET'){

    $categoria= unserialize(base64_decode($_GET['objeto']));
    $id_categoria=$categoria["id_categoria"];
    $codigo_categoria=$categoria["codigo_categoria"];
    $nombre_categoria=$categoria["nombre_categoria"];
    $descripcion_categoria=$categoria["descripcion_categoria"];
    $activo=$categoria["activo"];
   

}

else if($_SERVER['REQUEST_METHOD']=='POST'){

require_once '../../../modelo/categoriadao.php';
$dao=new categoriaDao();
if(isset($_POST['boton'])){

    if($_POST['boton']=='actualizar'){


        if(isset($_POST['id_categoria']) & isset($_POST['codigo_categoria']) & isset($_POST['nombre_categoria'])  & isset($_POST['descripcion_categoria']) &  isset($_POST['activo'])){

        $id_categoria=htmlspecialchars($_POST['id_categoria']);
        $codigo_categoria=htmlspecialchars($_POST['codigo_categoria']);
        $nombre_categoria=htmlspecialchars($_POST['nombre_categoria']);
        $descripcion_categoria=htmlspecialchars($_POST['descripcion_categoria']);
        $activo=htmlspecialchars($_POST['activo']);

        if(empty($id_categoria) | empty($codigo_categoria) | empty($nombre_categoria) | empty($descripcion_categoria)| empty($activo)){
            $mensaje="Campo Vacio";
        } 
        else{

            $mensaje=$dao->actualizarCategoria($id_categoria,$codigo_categoria,$nombre_categoria,$descripcion_categoria,$activo); 
        }
        
        }

    }  
    else if($_POST['boton']=='limpiar'){

        $id_categoria="";
        $codigo_categoria="";
        $nombre_categoria="";
        $descripcion_categoria="";
        $activo="";
        $mensaje="";
    }  

    }  
}   

require_once 'vistaActualizar.php';
 