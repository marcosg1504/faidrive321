<?php
include_once "../configuracion.php";
include_once("estructura/cabeceraBT.php");
$objAbmAc= new controlArchivoCargado();
//print_r($objAbmAuto);

$listaAc = $objAbmAc->buscar(null);
/*
echo "aca imprimo la lista recibida<br>";
print_r($listaAc);
echo " <br>fin lista recibida<br>";*/

?>	

<h3>archivo cargado de FDRIVE</h3>
<a href="farchivoCargado_nuevo.php">Nuevo arhivo cargado</a>
<table border="1">
<?php	
//print_r($listaAuto);
//echo $listaAuto[0]->getPatente();
 if( count($listaAc)>0){
    foreach ($listaAc as $objAc) { 
        
        echo '<tr><td style="width:150px;">'.$objAc->getIdarchivocargado().'</td>';
        echo '<td style="width:150px;">'.$objAc->getAcnombre().'</td>';
        echo '<td style="width:150px;">'.$objAc->getAcdescripcion().'</td>';
        echo '<td style="width:150px;">'.$objAc->getAcicono().'</td>';
        echo '<td style="width:150px;">'.$objAc->getIdusuario().'</td>';
        echo '<td style="width:150px;">'.$objAc->getAclinkacceso().'</td>';
        echo '<td style="width:150px;">'.$objAc->getAccantidaddescarga().'</td>';
        echo '<td style="width:150px;">'.$objAc->getAccantidadusada().'</td>';
        echo '<td style="width:150px;">'.$objAc->getAcfechainiciocompartir().'</td>';
        echo '<td style="width:150px;">'.$objAc->getAcefechafincompartir().'</td>';
        echo '<td style="width:150px;">'.$objAc->getAcprotegidoclave().'</td>';
    
        echo '<td><a href="farchivoCargado_editar.php?idarchivocargado='.$objAc->getIdarchivocargado().'">editar</a></td>';
        echo '<td><a href="accion/abmAc.php?accion=borrar&idarchivocargado='.$objAc->getIdarchivocargado().'">borrar</a></td></tr>'; 
	}
}

?>
</table>
</body>
</html>