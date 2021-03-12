<?php

   require_once '../../../modelo/categoriadao.php';
   $dao=new categoriaDao();
   $categorias=$dao->listaCategoria();
   $tam=sizeof($categorias);
   require_once 'vistaMostrar.php';

   ?>