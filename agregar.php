<?php
  // 1) Conexion
  // a) realizar la conexion con la bbdd
  // b) seleccionar la base de datos a usar
$conexion = mysqli_connect("127.0.0.1","root","");

  // 2) Almacenamos los datos del envío POST
  // a) generar variables para cada dato a almacenar en la bbdd
  $CLAVE = $_POST ['clave'];
  $COD_BARRA = $_POST['cod_barra'];
  $DESCRIPCION = $_POST['descripcion'];
  $PRECIO = $_POST['precio'];
  $STOCK = $_POST['stock'];
  $CATEGORIA = $_POST['categoria'];
  if(!empty($_FILES['image']['tmp_name']) && file_exists($_FILES['image']['tmp_name'])) {
    $IMAGEN= addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
  }
  //$IMAGEN = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
 
$consulta = "INSERT INTO productos (ID,CLAVE,DESCRIPCION,COD_BARRA,PRECIO,STOCK, IMAGEN)
        VALUES ('','$CLAVE','$DESCRIPCION','$COD_BARRA','$PRECIO','$STOCK','$IMAGEN')";
  // Ejecutar la orden y ingresamos datos
  mysqli_select_db($conexion,"vita_sana");
  // ejecutar la consulta
  mysqli_query($conexion,$consulta);
  // rederigir a agregar
  header('location: agregar.html');
?>
