<?php 
$Titulo = " Ejercicio 1"; 
//include_once("../../estructura/cabecera.php");
include_once("../../estructura/cabeceraboot.php");
include_once("../../../control/tp1/control_eje1.php");
//include_once("../../../configuracion.php");

?>
<!--<div id="contenido" style="height: 400px; width: 89%; border: 2px solid red; border-radius: 5px;margin-left:10.5%;" >-->
<?php 
$datos = data_submitted();
$obj = new control_eje1();
//print_r($datos);

$respuesta = $obj->verNumero($datos);
//$respuesta = $obj->verInformacion($_POST);
//$respuesta = $obj->verInformacion($_GET);
?>


<p>
<b>Respuesta: </b> 
<?php echo $respuesta ?>
</p>

</div>


</body>
<?php 

//include_once("../../estructura/pie.php");
?>
