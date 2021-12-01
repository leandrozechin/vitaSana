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
 $consulta = "DELETE FROM  productos WHERE ID=$ID";
 // 4) Ejecutar la orden y almacenamos en una variable el resultado
 // a) ejecutar la consulta
  
 $repuesta=mysqli_query ($conexion, $consulta);
 
 header('location: listar.php');
 ?>
