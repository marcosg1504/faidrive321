<?php
include_once "../configuracion.php";
include_once("estructura/cabeceraBT.php");
$objAbmAce= new controlArchivoCargadoEstado();
//print_r($objAbmAuto);

$listaAce = $objAbmAce->buscar(null);
/*
echo "aca imprimo la lista recibida<br>";
print_r($listaAce);
echo " <br>fin lista recibida<br>";*/
?>	

<h3>archivo cargado estado - FDRIVE</h3>
<a href="fAce_nuevo.php">Nuevo arhivo cargado</a>
<table border="1">
<?php	
//print_r($listaAuto);
//echo $listaAuto[0]->getPatente();
 if( count($listaAce)>0){
    foreach ($listaAce as $objAce) { 
        
        echo '<tr><td style="width:150px;">'.$objAce->getIdAce().'</td>';
        echo '<td style="width:150px;">'.$objAce->getIdestadoTipos().'</td>';
        echo '<td style="width:150px;">'.$objAce->getAcedescripcion().'</td>';
        echo '<td style="width:150px;">'.$objAce->getIdusuario().'</td>';
        echo '<td style="width:150px;">'.$objAce->getAcefechaingreso().'</td>';
        echo '<td style="width:150px;">'.$objAce->getAcefechafin().'</td>';
        echo '<td style="width:150px;">'.$objAce->getIdarchivocargado().'</td>';

     
    
        echo '<td><a href="fAce_editar.php?idarchivocargadoestado='.$objAce->getIdAce().'">editar</a></td>';
        echo '<td><a href="accion/abmAc.php?accion=borrar&idarchivocargadoestado='.$objAce->getIdAce().'">borrar</a></td></tr>'; 
	}
}

?>
</table>
</body>
</html>