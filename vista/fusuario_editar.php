<?php
include_once("estructura/cabeceraBT.php");
include_once '../configuracion.php';
$objAbmUsuario = new controlUsuario();
$datos = data_submitted();
//print_r($objAbmAuto);
//print_r($datos);// hasta aca anda
$obj =NULL;
//echo "patente recibida".$datos['patente'];
if (isset($datos['idusuario'])){
    //echo "patente: ".$datos['patente'];
    $listaUsuario = $objAbmUsuario->buscar($datos);
    //echo "arreglo recibido<br>";    
    //print_r($listaAuto);
    if (count($listaUsuario)==1){
        $obj= $listaUsuario[0];
        //print_r($obj);
    }
}




?>	

<h3>Usuarios</h3>
<?php 
if ($obj==null){echo "es nulo";};
if ($obj!=null){?>
<form method="post" action="accion/abmUsuario.php">
	<label>Usuario</label><br/>
	<input id="idusuario" readonly name ="idusuario" type="number" width="80"  value="<?php echo $obj->getIdusuario()?>"><br/>

    <label>Nombre</label><br/>
	<textarea  id="usnombre" name="usnombre"><?php echo $obj->getNombre()?></textarea><br/>
	
    <label>Apellido</label><br/>
	<textarea  id="usapellido" name="usapellido" ><?php echo $obj->getApellido()?></textarea><br/>

    <label>Login</label><br/>
	<textarea  id="uslogin" name="uslogin"><?php echo $obj->getLogin()?></textarea><br/>

    <label>Clave</label><br/>
	<textarea  id="usclave" name="usclave"><?php echo $obj->getClave()?></textarea><br/>

    
    <label>us activo</label><br/>
	<textarea  id="usactivo" name="usactivo"><?php echo $obj->getClave()?></textarea><br/>

    <input id="accion" name ="accion" value="editar" type="hidden">
	<input type="submit">
</form>
<?php }else {
    
    echo "<p>No se encontro la clave que desea modificar";
}?>
<br><br>
<a href="fusuario.php">Volver</a>
</body>
</html>