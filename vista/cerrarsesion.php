<?php
include_once("../configuracion.php");
$objSesion=new Session();
$objSesion->cerrar();
header("location:login.php");

?>
