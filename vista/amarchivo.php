<?php
$titulo="AM ARCHIVO";
include_once("estructura/cabeceraBT.php");
include_once("../control/controlam.php");
include_once("../configuracion.php");
$objAbmUsuario= new controlUsuario();
$listaUsuario = $objAbmUsuario->buscar(null);
$datos = data_submitted(); 

$variableCarpeta="archivos/";
if  (isset($datos['nombreCarpeta'])){
$variableCarpeta=$datos['nombreCarpeta'];}

?>
  <h2>Subir Archivos</h2>
<?php


?>
<form  id="form1" name="form1" method="post" action="accionam.php"  data-toggle="validator" enctype="multipart/form-data" >
        <div class="col-md-6 mb-3">      
           <label for="miarchivo" class="control-label">ingrese archivo</label>
           <input class="form-control" id="miArchivo" type="file" name="miArchivo" required onchange="return fileValidation()">
           <div class="invalid-feedback"> </div>
          
        </div>
        <div class="col-md-6 mb-3">
            <input class="form-control" id="nombreCarpeta" name="nombreCarpeta"  value="<?php echo $variableCarpeta; ?>" type="hidden">
            <div class="invalid-feedback"></div>
        </div>
        <div class="col-md-6 mb-3">
            <input class="form-control" id="idarchivocargado" name="idarchivocargado"  value="" type="hidden">
            <div class="invalid-feedback"></div>
        </div>

        <div class="col-md-6 mb-3">
            <label for="nombreArchivo" class="control-label">Nombre del archivo</label>
            <input class="form-control" id="acnombre" name="acnombre" placeholder="1234.png" value="1234.png" type="text" required>
            <div class="invalid-feedback"></div>
        </div>

        <div class="col-md-12 mb-3">
            <label for="descripcion" class="control-label">Descripcion del archivo</label>
            <textarea class="content" name="acdescripcion" id="acdescripcion"></textarea>
            <div class="invalid-feedback"></div>
        </div>
        <div class="col-md-6 mb-3" >
            <label for="acicono" class="control-label" name="acicono" required>Seleccione un icono</label><br>
            <input type="radio" id="pdf" name="acicono" value="pdf">
            <label>PDF <i class="far fa-file-pdf"></i></label><br>
            
            <input type="radio" id="zip" name="acicono" value="zip">
            <label >ZIP<i class="fas fa-file-archive"></i></label><br>

            <input type="radio" id="imagen" name="acicono" value="imagen">
            <label>Imagen(jpg, png, etc)<i class="far fa-file-image"></i></label><br>

            <input type="radio" id="texto" name="acicono" value="texto">
            <label >Texto(doc, txt, etc)<i class="fas fa-file-word"></i></label><br><br>
            <div class="invalid-feedback">         

            </div>
           
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
            <div class="invalid-feedback">

            </div>

        </div> 
        <div class="col-md-6 mb-3">
            <label for="usuario" class="control-label">Link de acceso</label>
            <input class="form-control" id="aclinkacceso" name="aclinkacceso"  value="<?php echo md5(uniqid(rand(), true))?>" type="text" >
             <div class="invalid-feedback">
            </div>
        </div>           

        <input class="form-control" id="accantidaddescarga" name="accantidaddescarga"  value="2" type="hidden" >
        <input class="form-control" id="accantidadusada" name="accantidadusada"  value="4" type="hidden" >
        

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
        <div class="col-md-12 mb-3">    
            <input id="accion" name ="accion" value="nuevo" type="hidden">
	        <input id="btn_eje4"  class="btn btn-primary" name="btn_eje4" type="submit" value="Enviar">
        </div>
      
</form>
</body>
<?php
include_once("estructura/pieBT.php");
?>