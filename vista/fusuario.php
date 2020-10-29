<?php
$titulo="Usuarios";
include_once("estructura/cabeceraBT.php");
include_once "../configuracion.php";
$objAbmUsuario= new controlUsuario();
//print_r($objAbmAuto);


$listaUsuario = $objAbmUsuario->buscar(null);

?>	

<h3>Usuarios de FDRIVE</h3>
<a href="fusuario_nuevo.php">Nuevo Usuario</a>
<table border="1">
<td >ID usuario</td>
<td >nombre</td>
<td >apellido</td>
<td >login</td>
<td >clave</td>
<td >us activo</td>
<td align="center">opciones</td>
<?php	
//print_r($listaAuto);
//echo $listaAuto[0]->getPatente();
 if( count($listaUsuario)>0){
    //echo '<tr><td style="width:70px;">'ID USUARIO'</td>';
    foreach ($listaUsuario as $objUsuario) { 
        
        echo '<tr><td style="width:70px;">'.$objUsuario->getIdusuario().'</td>';
        echo '<td style="width:100px;">'.$objUsuario->getNombre().'</td>';
        echo '<td style="width:150px;">'.$objUsuario->getApellido().'</td>';
        echo '<td style="width:200px;">'.$objUsuario->getLogin().'</td>';
        echo '<td style="width:250px;">'.$objUsuario->getClave().'</td>';
        echo '<td style="width:50px;">'.$objUsuario->getUsactivo().'</td>';
        echo '<td><a href="fusuario_editar.php?idusuario='.$objUsuario->getIdusuario().'">editar | </a>';
        echo '<a href="accion/abmUsuario.php?accion=borrar&idusuario='.$objUsuario->getIdusuario().'">borrar</a></td></tr>'; 
	}
}

?>
</table>

<?php
include_once("estructura/pieBT.php");
?>