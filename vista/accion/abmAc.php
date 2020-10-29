<?php 
include_once("../estructura/cabeceraBT.php");
include_once '../../configuracion.php';
$datos = data_submitted();
//verEstructura($datos);
$resp = false;
$objTrans = new controlArchivoCargado();

if (isset($datos['accion'])){
    if($datos['accion']=='editar'){
        if($objTrans->modificacion($datos)){
            $resp = true;
        }
    }
    if($datos['accion']=='borrar'){
        if($objTrans->baja($datos)){
            $resp =true;
        }
        
    }
    if($datos['accion']=='nuevo'){
        $objUpload=new controlam();
        $resp=$objUpload->cargarArchivos($datos);
        if($objTrans->alta($datos)){
            $resp =true;
        }
        
    }
    if($resp){
        $mensaje = "La accion ".$datos['accion']." se realizo correctamente.";
    }else {
        $mensaje = "La accion ".$datos['accion']." no pudo concretarse.";
    }
    
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Ejemplo</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h3>estado tipos FDRIVE</h3>
<br><a href="../farchivoCargado.php">Ver archivos cargados</a><br>

<?php	
echo $mensaje;
?>

</body>
</html>