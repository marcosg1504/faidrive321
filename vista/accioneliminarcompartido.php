<?php
$titulo = " Compartir Archivo";
include_once("estructura/cabeceraBT.php");
include_once("../configuracion.php");
?>

<p>
    accion dejar de compartir archivo
</p>

<?php
$resp=false;
$datos = data_submitted(); 
$datos['idestadotipos']="3";
$datos['idarchivocargadoestado']="";
//print_r($datos);
$objAce= new controlArchivoCargadoEstado;

if($objAce->alta($datos)){
    $resp=true;
}
/* debo hacer un alta y luego una baja en compartidos o una modificacion ?*/

if($resp){
    $mensaje = "La accion   se realizo correctamente.";
}else{
    $mensaje = "La accion  NO se realizo correctamente.";
}

echo $mensaje;

?>