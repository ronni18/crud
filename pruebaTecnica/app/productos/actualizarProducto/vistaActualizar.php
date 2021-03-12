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
         <center><h2>Actualizar producto</h2></center>
        <?php
            if(empty($mensaje)==false){
        
            echo "<div class='alert alert-warning alert-dismissible fade show'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <strong>Mensaje</strong> ".$mensaje."</div>";
            }
        ?>


           <form action="actualizarProducto.php" method="post">
           
                <label>Id</label>
                <input type="text" name="id" class="form-control "  redaonly value="<?php if(isset($id)){echo $id;}?>">
                 <label>Codigo</label>
                <input type="text" id="codigo" onblur="espacios()" minlength="4" maxlength="10" name="codigo" class="form-control" value="<?php if(isset($codigo)){echo $codigo;}?>">
                <label>Nombre</label>
                <input type="text" minlength="4" name="nombre" class="form-control" value="<?php if(isset($nombre)){echo $nombre;}?>">
                <label>Descripcion</label>
                <input type="text" name="descripcion" class="form-control" value="<?php if(isset($descripcion)){echo $descripcion;}?>">
                <label>Marca</label>
                <input type="text" name="marca" class="form-control" value="<?php if(isset($marca)){echo $marca;}?>">
                  <?php
                include '../../../modelo/connect.php';
                $query= mysqli_query($mysqli,"SELECT * FROM categorias ;");
        

                ?>
                <label>Marca</label>
                <select name="id_categoria" class="form-control"> value="<?php if (isset($id_categoria)) {echo $id_categoria; } ?>">
                <?php while ($categorias = mysqli_fetch_array($query)) {
     
                ?> 
                <option value="<?php echo $categorias['id_categoria']  ?>"><?php echo $categorias['nombre_categoria']  ?></option>
                <?php
                }

                ?>
   
                </select>
                <label>Precio</label>
                <input type="number" name="precio" class="form-control" value="<?php if(isset($precio)){echo $precio;}?>">


                <br>
                <center>
                    <button type="submit" name="boton" value="actualizar" class="btn btn-primary" >
                    Actualizar
                    </button>
                   
                    <a href="../listarProducto/mostrar.php" class="btn btn-secondary">Lista de productos</a>
                </center>             
           </form>       
          </div>    
         
    </div>
     <script src="../../../js/espacios.js"></script>

</body>
</html>