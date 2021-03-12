<?php
require_once '../../../modelo/productodao.php';

$dao=new productoDao();


if(isset($_POST['boton'])){

    if($_POST['boton']=='guardar'){


        if(isset($_POST['id']) & isset($_POST['codigo']) & isset($_POST['nombre'])  & isset($_POST['descripcion']) & isset($_POST['marca']) & isset($_POST['id_categoria']) & isset($_POST['precio'])){

        $id=htmlspecialchars($_POST['id']);
        $codigo=htmlspecialchars($_POST['codigo']);
        $nombre=htmlspecialchars($_POST['nombre']);
        $descripcion=htmlspecialchars($_POST['descripcion']);
        $marca=htmlspecialchars($_POST['marca']);
        $id_categoria=htmlspecialchars($_POST['id_categoria']);
        $precio=htmlspecialchars($_POST['precio']);

       if(empty($id) | empty($codigo) | empty($nombre) | empty($descripcion)| empty($marca)| empty($id_categoria)| empty($precio)){
            $mensaje="Campo Vacio";
           } 
    
       
           else{

            $mensaje=$dao->insertarProducto($id,$codigo,$nombre,$descripcion,$marca,$id_categoria,$precio); 
               }

        

       
        
    
        
        }

    }  
    else if($_POST['boton']=='limpiar'){

        $id="";
        $codigo="";
        $nombre="";
        $descripcion="";
        $marca="";
        $id_categoria="";
        $precio="";
        $mensaje="";
    }  

    }      

require_once 'vistaInsertar.php';
 ?>