<?php

   require_once '../../../modelo/productodao.php';
   $dao=new productoDao();
   $productos=$dao->listaProductos();
   $tam=sizeof($productos);
   require_once 'vistaMostrar.php';

   ?>