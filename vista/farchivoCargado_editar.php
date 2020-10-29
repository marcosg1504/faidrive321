<?php
include_once '../configuracion.php';
include_once("estructura/cabeceraBT.php");
$objAbmEstado = new controlArchivoCargado();
$datos = data_submitted();

$obj =NULL;

if (isset($datos['idarchivocargado'])){    
    $listaEstado = $objAbmEstado->buscar($datos);
    if (count($listaEstado)==1){
        $obj= $listaEstado[0];      
    }
}
?>	

<h3>Editar Archivo Cargado</h3>
<?php 
if ($obj==null){echo "es nulo";};
if ($obj!=null){?>
<form method="post" action="accion/abmAc.php">
<input id="idarchivocargado"  name ="idarchivocargado"  readonly value="<?php echo $obj->getIdarchivocargado()?>"><br/>
<input id="idusuario"  name ="idusuario"  type="hidden" value="<?php echo $obj->getIdusuario()?>"><br/>

	<label>Nombre del archivo</label><br/>
	<input id="acnombre"  name ="acnombre" width="80" type="text" value="<?php echo $obj->getAcnombre()?>"><br/>

    <label>Descripcion</label><br/>
	<textarea  id="acdescripcion" name="acdescripcion"><?php echo $obj->getAcdescripcion()?></textarea><br/>
	
    <label>Icono</label><br/>
	<input  id="acicono" name="acicono" Type="text" value="<?php echo $obj->getAcicono()?>"><br/>

    <input class="form-control" id="accantidaddescarga" name="accantidaddescarga"  value="2" type="hidden" >
    <input class="form-control" id="accantidadusada" name="accantidadusada"  value="4" type="hidden" >



    <label>Link acceso</label><br/>
	<input  id="aclinkacceso" name="aclinkacceso" Type="text" value="<?php echo $obj->getAclinkacceso()?>"><br/>
    <div class="col-md-6 mb-3">
            <label for="acfechainiciocompartir" class="control-label">Fecha inicio compartir</label>
            <input class="form-control" id="acfechainiciocompartir" name="acfechainiciocompartir"  type="datetime-local" >
            <div class="invalid-feedback"> </div>
        </div>  

        <div class="col-md-6 mb-3">
            <label for="acefechafincompartir" class="control-label">Fecha fin compartir</label>
            <input class="form-control" id="acefechafincompartir" name="acefechafincompartir"  type="datetime-local" >
             <div class="invalid-feedback">      </div>
        </div>   
        <div class="col-md-6 mb-3">
            <label >Campo Clave</label>
            <select name="acprotegidoclave" id="acprotegidoclave">
            <option value="clave0">0</option>
            <option value="clave1">1</option>            
            </select>
            <div class="invalid-feedback">
            </div>
        </div>       
    <input id="accion" name ="accion" value="editar" type="hidden">
    <input id="btn_eje4"  class="btn btn-primary" name="btn_eje4" type="submit" value="Guardar">
</form>
<?php }else {
    
    echo "<p>No se encontro la clave que desea modificar";
}?>
<br><br>
<a href="festadoTipos.php">Volver</a>
</body>
</html>