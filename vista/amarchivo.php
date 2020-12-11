<?php
/*
 * Guardar la pass encriptada
 * Administrador solo debería poder gestionar usuarios
 * Accede al arreglo asociativo $_SESSION, debe estar encapsulado en la clase SESSION.
(*)Compartir 
cada usuario debe ver su contenido
*/
$titulo="AM ARCHIVO";
include_once("../configuracion.php");
//$objSesion =new Session();
 /*
Este codigo para evitar que se acceda al sistem sin iniciar sesion lo coloque en 
la cabecera
if($_SESSION==null){   
 //if( $_SESSION["usnombre"]=="") || ($_SESSION["usnombre"]==null)
 echo "Para ver el contenido debe ";?> <a href="login.php"> Iniciar sesion </a>
<?php die();
}*/ 
include_once("estructura/cabeceraBT.php");

$datos = data_submitted(); 
$variableCarpeta="archivos/";
if  (isset($datos['nombreCarpeta'])){
$variableCarpeta=$datos['nombreCarpeta'];} 
$unArray['uslogin']=$objSesion->getUsuario(); 

echo "Usuario activo: ".$objSesion->getUsuario(); 

$unObjUsuario=new controlUsuario();
$usLogeado= $unObjUsuario->buscar($unArray);
?>
<a href="cerrarsesion.php"> cerrar sesion </a>

<h2>Subir Archivos</h2>
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
            <label for="usuario" class="control-label">Usuario</label>
            <select name="idusuario" id="idusuario">
            <?php
          
             echo '<option value='.$usLogeado[0]->getIdusuario().'>'.$objSesion->getUsuario().'</option>';
	             ?>       
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