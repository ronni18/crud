<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Actualizar productos</title>
</head>
<body>

    <div class="container">    
         <div class="jumbotron">
         <center><h2>Actualizar categoria</h2></center>
        <?php
            if(empty($mensaje)==false){
        
            echo "<div class='alert alert-warning alert-dismissible fade show'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <strong>Mensaje</strong> ".$mensaje."</div>";
            }
        ?>


             <form action="actualizarCategoria.php" method="post">
           
                <label>Id</label>
                <input type="text" name="id_categoria" class="form-control "  value="<?php if(isset($id_categoria)){echo $id_categoria;}?>">
                <label>Codigo</label>
                <input type="text" id="codigo" onblur="espacios()" name="codigo_categoria" class="form-control" value="<?php if(isset($codigo_categoria)){echo $codigo_categoria;}?>">
                <label>Nombre</label>
                <input type="text" minlength="2" name="nombre_categoria" class="form-control" value="<?php if(isset($nombre_categoria)){echo $nombre_categoria;}?>">
                <label>Descripcion</label>
                <input type="text" name="descripcion_categoria" class="form-control" value="<?php if(isset($descripcion_categoria)){echo $descripcion_categoria;}?>">
               
                <label>Activo</label>
                <input type="number" name="activo" class="form-control" value="<?php if(isset($activo)){echo $activo;}?>">


                <br>
                <center>
                    <button type="submit" name="boton" value="actualizar" class="btn btn-primary" >
                    Actualizar
                    </button>
                    <button type="submit" name="boton" value="limpiar" class="btn btn-warning" >
                    Limpiar
                    </button>
                        <a href="../listarCategoria/mostrar.php" class="btn btn-secondary">Lista de categorias</a>

                </center>             
           </form>    
          </div>    
         
    </div>
    <script src="../../../js/espacios.js"></script>

</body>
</html>