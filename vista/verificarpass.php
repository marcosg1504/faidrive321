<?php
include_once("../configuracion.php");
$datos = data_submitted();
$unUsuario = new controlUsuario();


$var=false;
$resp=$unUsuario->iniciarSesionUsuario($datos); 
if($resp)
{
   $var=true; 
   header("location:amarchivo.php");
}
if($var==false){    
    $mensaje="el usuario o clave no coinciden. Reintente nuevamente";    
    header("location:login.php?mensaje=$mensaje");   
    
}
?>