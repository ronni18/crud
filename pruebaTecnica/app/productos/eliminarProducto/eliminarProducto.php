<?php

if($_SERVER['REQUEST_METHOD']=='GET'){

    $id=base64_decode($_GET['id']);
    require_once '../../../modelo/productodao.php';
    $dao=new productoDao();
    $dao->eliminarProducto($id);    
    header("location:../listarProducto/mostrar.php");

}
  