<?php
include_once("estructura/cabeceraBT.php");
include_once "../configuracion.php";
$objAbmEstado= new controlEstadoTipos();
//print_r($objAbmAuto);

$listaEstado = $objAbmEstado->buscar(null);

?>	

<h3>estado tipos de FDRIVE</h3>
<a href="festadoTipos_nuevo.php">Nuevo estado tipo</a>
<table border="1">
<td >ID estado</td>
<td >descripcion</td>
<td >et activo</td>

<td align="center">opciones</td>
<?php	
//print_r($listaAuto);
//echo $listaAuto[0]->getPatente();
 if( count($listaEstado)>0){
    foreach ($listaEstado as $objEstado) { 
        
        echo '<tr><td style="width:150px;">'.$objEstado->getIdestadotipos().'</td>';//getIdestadotipos
        echo '<td style="width:150px;">'.$objEstado->getEtdescripcion().'</td>';
        echo '<td style="width:150px;">'.$objEstado->getEtactivo().'</td>';
    
        echo '<td><a href="festadoTipos_editar.php?idestadotipos='.$objEstado->getIdestadotipos().'">editar | </a>';
        echo '<a href="accion/abmEstadoTipos.php?accion=borrar&idestadotipos='.$objEstado->getIdestadotipos().'">borrar</a></td></tr>'; 
	}
}

?>
</table>
</body>
</html>