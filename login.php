<?php
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    $msg =  $_POST["msg"];;
    
    $usuario = "leandro";
    $contrasenia = "Leandro";
   
	if (strtoupper($user) == strtoupper($usuario ) &&  $contrasenia == $pass) {
       header ("location: ./agregar.html");
    }
    else{
        $msg = 'Usuario o Contraseña no válidas'; 
        header ("location: ./login.html");
		
        
        }

?>

