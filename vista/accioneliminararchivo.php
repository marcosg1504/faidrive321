<?php
$titulo = " Compartir Archivo";
include_once("estructura/cabeceraBT.php");
include_once("../configuracion.php");
?>

<p>
    accion ELIMINAR ARCHIVO
</p>

<?php
$resp=false;
$datos = data_submitted(); 
$datos['idestadotipos']="4";
$datos['idarchivocargadoestado']="";
print_r($datos);
$objAce= new controlArchivoCargadoEstado;

if($objAce->alta($datos)){
    $resp=true;
}

if($resp){
    $mensaje = "La accion   se realizo correctamente.";
}else{
    $mensaje = "La accion  NO se realizo correctamente.";
}

echo $mensaje;

?>