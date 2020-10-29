<?php
$titulo = " Compartir Archivo";
include_once("estructura/cabeceraBT.php");
include_once("../configuracion.php");
?>

<p>
    eliminar ARCHIVO
</p>
<?php
$datos = data_submitted(); 
$unArray = array();
$lista=null;
if($datos!=null){
$unArray['idarchivocargado']=$datos['idarchivocargado'];
$objBusqueda= new controlArchivoCargado();
$lista = $objBusqueda->buscar($unArray);
}

 //print_r($datos);
$objAbmUsuario= new controlUsuario();
$listaUsuario = $objAbmUsuario->buscar(null);
?>
<form  id="form3" name="form3" method="post" action="accioneliminararchivo.php"  data-toggle="validator" >
    <!--<form  id="eje4" name="eje4" method="POST" action="accion.php">-->
    <div class="col-md-6 mb-3">            
           <p>el archivo que va a eliminar  es: </p>
           <?php           
                 if($lista!=null){
                echo ' '.$lista[0]->getAcnombre().'<br>';}
                        
           
           ?>
     </div> 
     <div class="col-md-6 mb-3">     
            <br> <p> id del archivo a eliminar: </p>
            <input type="text" id="idarchivocargado" name="idarchivocargado" readonly value=<?php echo $lista[0]->getIdarchivocargado(); ?>> </input>
        </div> 
         <div class="col-md-6 mb-3">
            <label for="usuario" class="control-label">Seleccione un usuario</label>
            <select name="idusuario" id="idusuario">
            <?php
            if( count($listaUsuario)>0){         
            foreach ($listaUsuario as $objUsuario) {     
             echo '<option value='.$objUsuario->getIdusuario().'>'.$objUsuario->getNombre().'</option>';
	             }
                }?>       
            </select>
            <div class="invalid-feedback">      </div>
         </div> 
                <!--donde guardo el motivo de eliminacion¿? -->  
          <div class="col-md-6 mb-3">
            <label for="motivo" class="control-label">Motivo</label>
            <input class="form-control" id="motivo" name="motivo" type="text" required>
            <div class="invalid-feedback"></div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="usuario" class="control-label">Descripcion</label>
            <input class="form-control" id="acedescripcion " name="acedescripcion "  value="ingrese descripcion" type="text" >
            <div class="invalid-feedback">       </div>
        </div> 
        <div class="col-md-6 mb-3">
            <label for="usuario" class="control-label">Fecha ingreso</label>
            <input class="form-control" id="acefechaingreso  " name="acefechaingreso"  value="ingrese descripcion" type="datetime-local" >
            <div class="invalid-feedback">       </div>
        </div> 
        <div class="col-md-6 mb-3">
            <label for="usuario" class="control-label">Fecha Fin</label>
            <input class="form-control" id="acefechafin" name="acefechafin"  type="datetime-local" >
            <div class="invalid-feedback">       </div>
        </div> 

          <div class="col-md-8 mb-3">       
            <input id="btn_eje4"  class="btn btn-primary" name="btn_eje4" type="submit" value="continuar">
          </div>
       </div>
</form >

</body>
<?php
include_once("estructura/pieBT.php");
?>
