<?php
include_once("estructura/cabeceraBT.php");
include_once '../configuracion.php';
$objAbmEstado = new controlEstadoTipos();
$datos = data_submitted();
//print_r($objAbmAuto);
//print_r($datos);// hasta aca anda
$obj =NULL;
//echo "patente recibida".$datos['patente'];
if (isset($datos['idestadotipos'])){
    //echo "patente: ".$datos['patente'];
    $listaEstado = $objAbmEstado->buscar($datos);
    //echo "arreglo recibido<br>";    
    //print_r($listaAuto);
    if (count($listaEstado)==1){
        $obj= $listaEstado[0];
        //print_r($obj);
    }
}




?>	

<h3>estado tipos</h3>
<?php 
if ($obj==null){echo "es nulo";};
if ($obj!=null){?>
<form method="post" action="accion/abmEstadoTipos.php">
	<label>ID estado tipos</label><br/>
	<input id="idestadotipos" readonly name ="idestadotipos" width="80" type="text" value="<?php echo $obj->getIdestadotipos()?>"><br/>

    <label>Descripcion</label><br/>
	<textarea  id="etdescripcion" name="etdescripcion"><?php echo $obj->getEtdescripcion()?></textarea><br/>
	
    <label>activo</label><br/>
	<textarea  id="etactivo" name="etactivo" Type="number"><?php echo $obj->getEtactivo()?></textarea><br/>

    

    <input id="accion" name ="accion" value="editar" type="hidden">
	<input type="submit">
</form>
<?php }else {
    
    echo "<p>No se encontro la clave que desea modificar";
}?>
<br><br>
<a href="festadoTipos.php">Volver</a>
</body>
</html>