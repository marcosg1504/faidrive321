<?php
$titulo = " Compartir Archivo";
include_once("estructura/cabeceraBT.php");
include_once("../configuracion.php");
?>

<p>
    COMPARTIR ARCHIVO
</p>
<?php
$datos = data_submitted(); 
print_r($datos);
$unArray = array();
$lista=null;
if($datos!=null){
$unArray['idarchivocargado']=$datos['idarchivocargado'];
$objBusqueda= new controlArchivoCargado();
$lista = $objBusqueda->buscar($unArray);
}
$unArray['uslogin']=$objSesion->getUsuario(); 

echo "Usuario activo: ".$objSesion->getUsuario(); 

$unObjUsuario=new controlUsuario();
$usLogeado= $unObjUsuario->buscar($unArray);
?> 
<a href="cerrarsesion.php"> cerrar sesion </a> 

<form  id="form2" name="form2" method="post" action="accionCompartirArchivo.php"  data-toggle="validator" >
    <!--<form  id="eje4" name="eje4" method="POST" action="accion.php">-->
    <input type="hidden" id="nombrearchivo" name="nombrearchivo"  value='<?php echo $datos['nombrearchivo'] ?>' >

    <div class="col-md-6 mb-3">            
           <p>el archivo que va a compartir es: </p>
           <?php           
                 if($lista!=null){
                echo '<b> '.$lista[0]->getAcnombre().'</b><br>';}
                        
           
           ?>
      </div>
    <div class="col-md-6 mb-3">
            <label for="usuario" class="control-label"> usuario</label>
            <select name="idusuario" id="idusuario">
            <?php
             //$objSesion->getUsuario() o $usLogeado[0]->getNombre() puedo usar cualquiera?
             echo '<option value='.$usLogeado[0]->getIdusuario().'>'.$objSesion->getUsuario().'</option>';
	         
            ?>       
            </select>
            <div class="invalid-feedback">      </div>
            <br> <p> id del archivo a compartir: </p>
            <input type="text" id="idarchivocargado" name="idarchivocargado" readonly value=<?php echo $lista[0]->getIdarchivocargado(); ?>> </input>
        </div> 
    
        <div class="col-md-6 mb-3">            
            <input type="radio" name="tipo_attach" onclick="mostrar(this)" value="a" >Proteger archivo<br>
            <div id="uno" style="display:none">
                <p>Ingrese contraseña</p><input id="clave" name="clave" type="password" style="width:280px" />
                <button   type="button" onclick="mostrarContrasena()">Mostrar Contraseña</button>
            </div>
         <div class="invalid-feedback"> </div>

        </div>
        <div class="col-md-6 mb-3">
            <label for="usuario" class="control-label">Link de acceso</label>
            <input class="form-control" id="aclinkacceso" name="aclinkacceso"  value="<?php echo md5(uniqid(rand(), true))?>"  type="text" >
            <div class="invalid-feedback">       </div>
        </div> 
        <div class="col-md-6 mb-3">
            <label for="usuario" class="control-label">Descripcion</label>
            <input class="form-control" id="acedescripcion" name="acedescripcion"  value="ingrese descripcion" type="text" >
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
            <input id="btn_eje4"  class="btn btn-primary" name="btn_eje4" type="submit" value="compartir">
         </div>
   
</form >

</body>
<?php
include_once("estructura/pieBT.php");
?>
