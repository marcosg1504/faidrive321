<?php
$titulo = " TP 5";
include_once "../../configuracion.php";
include_once("../estructura/cabeceraBT.php");

$datos = data_submitted();


$abmRol = new controlRol();
if($abmRol->alta($datos)){
    $mensaje = " El rol fue ingresado.";
    
}else{
    $mensaje = " El rol no pudo ingresarse.";
    
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Proceso: Ingreso Rol</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h3>Insertar Rol</h3>
<br><a href="../nuevoRol.php">Volver</a><br>

<?php	
echo $mensaje;
?>

</body>
</html>