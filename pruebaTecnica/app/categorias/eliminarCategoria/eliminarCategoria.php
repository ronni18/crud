<?php

if($_SERVER['REQUEST_METHOD']=='GET'){

    $id_categoria=base64_decode($_GET['id_categoria']);
    require_once '../../../modelo/categoriadao.php';
    $dao=new categoriaDao();
    $dao->eliminarCategoria($id_categoria);    
    header("location:../listarCategoria/mostrar.php");

}
  