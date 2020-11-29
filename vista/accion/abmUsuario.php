<?php 
include_once("../estructura/cabeceraBT.php");
include_once '../../configuracion.php';

$datos = data_submitted();
print_r($datos);
//verEstructura($datos);
$resp = false;
$objTrans = new controlUsuario();
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
<h3>usuarios FDRIVE</h3>
<br><a href="../fusuario.php">Volver</a><br>

<?php	
echo $mensaje;
?>

</body>
</html>