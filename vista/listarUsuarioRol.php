<?php

$titulo = " TP 5";
include_once "../configuracion.php";
include_once("estructura/cabeceraBT.php");

$objAbmUsuarioRol = new controlUsuarioRol();


$listaUsuarioRol = $objAbmUsuarioRol->buscar(null);

//print_R ($listaUsuarioRol);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>UsuarioRol</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body> 
<h3> Ver UsuarioRol</h3>

<table border="1">
<td >ID Usuario</td>
<td >Id rol</td>
<?php	

if( count($listaUsuarioRol)>0){
    foreach ($listaUsuarioRol as $objUsuarioRol) {         
        echo '<tr><td style="width:150px;">'.$objUsuarioRol->getObjUsuario()->getIdUsuario().'</td>';
        echo '<td style="width:150px;">'.$objUsuarioRol->getObjRol()->getIdrol().'</td> ';
   	}
}
?>
</table>
</body>
</html>