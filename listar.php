<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
      <title>Vita Sana</title>
       
      <!-- Bootstrap CSS -->
       <link rel="stylesheet" href="./asserts/css/bootstrap.min.css">  
      <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  -->
      
  
      <!-- Propio CSS -->
      <link rel="stylesheet" href="./asserts/css/estilos.css" />
      
  
      <!-- icono -->
      <link rel="shortcut icon" href="./asserts/imagen/icono.jpg" />
    </head>
<body>
    <header>
      <!--Menu de navegacion -->
      <nav class="navbar navbar-expand-lg navbar-light navbar-custom ">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="./asserts/imagen/logo.png" width="140" height="100" alt="logo">
          </a>
          
		  <!--Menu hamburguesa -->
          <button class="navbar-toggler custom-toggler"type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <button  class="btn btn-outline-link"  type="submit">
                  <a class="nav-link" href="index.php">Inicio</a>
                </button>
                
              </li>
              <li class="nav-item">
                <button class="btn btn-outline-link"  type="submit"><a class="nav-link" href="listar.php">Listar Producto</a></button>
              </li>
              <li class="nav-item">
                <button class="btn btn-outline-link"  type="submit"><a class="nav-link" href="agregar.html">Agregar Producto</a></button>
              </li>
              
            </ul>
          
          </div>
         
        </div>
      </nav>
    </header> 

    <div class="container border border-success  rounded pt-3 pb-3">
      <h2 class="text-success pb-3">Listado de Productos</h2>
      <table class = "table table-striped" >
        <tr>
            
            <th>Clave</th>
            <th>Descripcion</th>
            <th>Categoría</th>
            <th>Precio</th>
            <th>Stock Actual</th>
            <th>Imagen</th>
            <th>Id</th>
            <th>Operaciones</th>
        </tr>
        <?php
          //  Conexion con BD
          $conexion = mysqli_connect("127.0.0.1", "root", "");
          mysqli_select_db($conexion, "vita_sana");
          
          //Consulta SQL
          $consulta='SELECT * FROM productos';

          // Ejecutar la orden y obtenemos los registros
          $datos= mysqli_query($conexion, $consulta);

        

          //Mostrar los datos del registro
          while ($reg=mysqli_fetch_array($datos)) { 
        ?>
              <tr>
                <td><?php echo $reg['CLAVE']; ?></td>
                <td><?php echo $reg['DESCRIPCION']; ?></td>
                <td><?php echo $reg['CATEGORIA']; ?></td>
                <td><?php echo $reg['PRECIO']; ?></td>
                <td><?php echo $reg['STOCK']; ?></td>
                <td><img src="data:image/png;base64, <?php echo base64_encode($reg['IMAGEN'])?>" alt="" width="100px" height="100px"></td>
                <td><?php echo $reg['ID']; ?></td>
                <td>
                    <a class="btn btn-success" role="button" href="modificar.php?id=<?php echo $reg['ID'];?>">Editar</a>
                    <a class="btn btn-danger"  role="button" href="borrar.php?id=<?php echo $reg['ID'];?>">Borrar</a>
                </td>
              </tr>
         <?php } ?>
     </table>
    </div>
  </body>
</html>
