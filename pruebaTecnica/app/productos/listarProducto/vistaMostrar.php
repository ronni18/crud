<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

    <title>Productos</title>
</head>
<body>
	<div class="container mt-5">
		<h1>Productos</h1>
    <a href="../insertarProducto/vistaInsertar.php" class="btn btn-primary">Nuevo producto</a>&nbsp;&nbsp;
    <a href="../../categorias/listarCategoria/mostrar.php" class="btn btn-primary">Categorias</a><br><br>
		<table id="DataTable" class="table">
			<thead class="">
				<tr>
          <th>Num</th>
					<th>Id</th>
					<th>Codigo</th>
					<th>Nombre</th>
					<th>Descripcion</th>
					<th>Marca</th>
          <th>Categoria</th>
					<th>Precio</th>
          <th>Accion</th>  

				</tr>
			</thead>
			<tbody>
				 <?php
                $cont=1;

                foreach($productos as $producto){
                echo "<tr>".
                     "<td>".$cont."</td>".
                     "<td>".$producto["id"]."</td>".
                     "<td>".$producto["codigo"]."</td>".
                     "<td>".$producto["nombre"]."</td>".
                     "<td>".$producto["descripcion"]."</td>".
                     "<td>".$producto["marca"]."</td>".
                     "<td>".$producto["nombre_categoria"]."</td>".
                     "<td>".$producto["precio"]."</td>".
                     "<td><a href='../actualizarProducto/actualizarProducto.php?objeto=".base64_encode(serialize($producto)).
                     "' class='btn btn-primary'>Actualizar</a>   &nbsp;&nbsp;".
                     "<a href='../eliminarProducto/eliminarProducto.php?id=".base64_encode($producto["id"]).
                     "' class='btn btn-danger'  onclick='javascript:return asegurar();'>Eliminar</a></td>".
                     "</tr>";
                $cont++;     
                }     

            ?>                

            </tbody>   
			 <script>
          $(document).ready( function () {
          $('#DataTable').DataTable();
          } );

    
  function asegurar ()
  {
      rc = confirm("¿Seguro que desea Eliminar?");
      return rc;
  }
 </script>
 <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
		</table>
	</div>
</body>
</html>