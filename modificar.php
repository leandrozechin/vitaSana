<?php
// 1) Conexion
// a) realizar la conexion con la bbdd
// b) seleccionar la base de datos a usar
$conexion=mysqli_connect("127.0.0.1","root","");
 mysqli_select_db($conexion,"vita_sana");
// 2) Almacenamos los datos del envío GET
// a) generar variables para el id a utilizar
$ID = $_GET['id'];
// 3) Preparar la SQL
// => Selecciona todos los campos de la tabla alumno donde el campo id  sea igual a $id
// a) generar la consulta a realizar
$consulta = "SELECT * FROM productos WHERE ID=$ID";
// 4) Ejecutar la orden y almacenamos en una variable el resultado
// a) ejecutar la consulta
$repuesta=mysqli_query ($conexion, $consulta);
// 5) Transformamos el registro obtenido a un array
$datos=mysqli_fetch_array($repuesta);
?>

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
            <h2 class="text-success pb-3">Modificar Producto</h2>
            <?php
                //asignamos a diferentes variables los respectivos valores del array $datos.
                $CLAVE = $datos['CLAVE'];
                $COD_BARRA = $datos['COD_BARRA'];
                $DESCRIPCION = $datos['DESCRIPCION'];
                $PRECIO = $datos['PRECIO'];
                $STOCK = $datos['STOCK'];
                $CATEGORIA = $datos['CATEGORIA'];
               
            ?>
            <form class = "row g-3 " method="POST" action="" enctype="multipart/form-data">
                <div class="col-md-6 ">
                    <label class="form-label">Clave</label>
                    <input type="text" readonly class="form-control"  name="clave" value="<?php echo "$CLAVE"; ?>">
                </div>
                <div class="col-6">
                    <label  class="form-label">Código de Barra</label>
                    <input type="text"  class="form-control" name="cod_barra" value="<?php echo "$COD_BARRA"; ?>">
                </div>
                <div class="col-md-12">
                    <label class="form-label">Descripción</label>
                    <input type="text" class="form-control" name="descripcion" value="<?php echo "$DESCRIPCION"; ?>">
                </div>
                <div class="col-6">
                    <label class="form-label">Precio</label>
                    <input type="text" class="form-control" name="precio" value="<?php echo "$PRECIO"; ?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Stock</label>
                    <input type="text" class="form-control" name="stock" value="<?php echo "$STOCK"; ?>">
                </div>
                <div class="col-md-6">
                    <label for="inputState" class="form-label">Categoría</label>
                    <select id="inputState" class="form-select" name = "categoria">
                        <option selected>Frutos Secos</option>
                        <option>Lacteos</option>
                        <option>Legumbres</option>
                        <option></option>

                    </select>
                </div>
                <div class="col-md-4">
                    <img src="data:image/png;base64, <?php  echo base64_encode($datos['IMAGEN'])?>" alt="" width="100px" height="100px">
                    
                    <input type="file" class="form-control" name="imagen">
                </div>
        
                <div class="d-block">
                    
                        <input type="submit"class="btn btn-success" name="guardar_cambios" value="Guardar Cambios">
                        <button type="submit" class="btn btn-success" name="Cancelar" formaction="listar.php">Cancelar</button>
                    
                </div>
            </form>

            
         
          <?php
                // Si en la variable constante $_POST existe un indice llamado 'guardar_cambios' ocurre el bloque de instrucciones.
                if(array_key_exists('guardar_cambios',$_POST)){
                    // 2') Almacenamos los datos actualizados del envío POST
                    // a) generar variables para cada dato a almacenar en la bbdd
                    // Si se desea almacenar una imagen en la base de datos usar lo siguiente:
                    // addslashes(file_get_contents($_FILES['ID NOMBRE DE LA IMAGEN EN EL FORMULARIO']['tmp_name']))
                   
                    
                    $CLAVE = $_POST ['clave'];
                    $COD_BARRA = $_POST ['cod_barra'];
                    $DESCRIPCION = $_POST ['descripcion'];
                    $PRECIO = $_POST['precio'];
                    $STOCK = $_POST['stock'];
                    $CATEGORIA = $_POST['categoria'];
                    $IMAGEN = $datos['IMAGEN'];
                    if(!empty($_FILES['imagen']['tmp_name']) && file_exists($_FILES['imagen']['tmp_name'])) {
                        $IMAGEN= addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
                      }
                    
                    
                    
                    $consulta = "UPDATE productos 
                                 SET COD_BARRA='$COD_BARRA'
                                   , DESCRIPCION='$DESCRIPCION'
                                   , PRECIO='$PRECIO'
                                   , IMAGEN='$IMAGEN' 
                                   , STOCK='$STOCK' 
                                   , CATEGORIA='$CATEGORIA'  
                                WHERE id=$ID";
                   
                    mysqli_query($conexion,$consulta);
                    // a) rederigir a index
                    
                    header("Location: listar.php");                   
                }     
            ?>
     </div>
        
    </body>
</html>