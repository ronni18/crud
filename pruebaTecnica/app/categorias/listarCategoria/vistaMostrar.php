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
  <link rel="stylesheet"  href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <title>Categorias</title>
</head>
<body>
	<div class="container mt-5">
		<h1>Categorias</h1>
    <a href="../insertarCategoria/vistaInsertar.php" class="btn btn-primary">Nueva categoria</a> &nbsp;&nbsp;
    <a href="../../productos/listarProducto/mostrar.php" class="btn btn-primary">Productos</a><br><br>
		<table id="DataTable" class="table">
			<thead class="">
				<tr>
          <th>Num</th>
					<th>Id</th>
					<th>Codigo</th>
					<th>Nombre</th>
					<th>Descripcion</th>
          <th>Activo</th>  
          <th>Accion</th>  

				</tr>
			</thead>
			<tbody>
				 <?php
                $cont=1;

                foreach($categorias as $categoria){
                echo "<tr>".
                     "<td>".$cont."</td>".
                     "<td>".$categoria["id_categoria"]."</td>".
                     "<td>".$categoria["codigo_categoria"]."</td>".
                     "<td>".$categoria["nombre_categoria"]."</td>".
                     "<td>".$categoria["descripcion_categoria"]."</td>".
                     "<td>".$categoria["activo"]."</td>".
                     "<td><a href='../actualizarCategoria/actualizarCategoria.php?objeto=".base64_encode(serialize($categoria)).
                     "' class='btn btn-primary'>Actualizar</a>   &nbsp;&nbsp;".
                     "<a href='../eliminarCategoria/eliminarCategoria.php?id_categoria=".base64_encode($categoria["id_categoria"]).
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