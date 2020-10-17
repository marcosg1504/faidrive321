<?php
include_once("estructura/cabeceraBT.php");
include_once("../control/controlam.php");
include_once("../configuracion.php");
?>
  <h2>Subir Archivos</h2>

<script>
  function mostrarContrasena(){
      var tipo = document.getElementById("clave");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
  }

}  
</script>
<script type="text/javascript"> extencion=miArchivo.substring(miArchivo.lastIndexOf('.'),archivo.length);
                    alert("hola");
        </script>
<script>
    $(document).ready(function() {
        $('.content').richText();
    });
</script>
<?php
$obj4 = new controlam();
$opciones= new controlam();

$arreglo = $obj4->obtenerArchivos();?>

<form  id="form1" name="form1" method="post" action="accionam.php"  data-toggle="validator" enctype="multipart/form-data" >
     <div class="col-md-6 mb-3">      
        
          <label for="miarchivo" class="control-label">ingrese archivo</label>
          <input class="form-control" id="miArchivo" type="file" name="miArchivo" required onchange="return fileValidation()">
          
          <div class="invalid-feedback"> </div>
          
         </div>
         <div class="col-md-6 mb-3">
            <label for="nombreArchivo" class="control-label">Nombre del archivo</label>
            <input class="form-control" id="nombreArchivo" name="nombreArchivo" placeholder="1234.png" value="1234.png" type="text" required>
            <div class="invalid-feedback"></div>

        </div>
        <div class="col-md-12 mb-3">
            <label for="descripcion" class="control-label">Descripcion del archivo</label>
            <!--<input class="form-control" id="nombreArchivo" name="nombreArchivo" placeholder="1234.png" value="1234.png" type="text" required>-->
            <textarea class="content" name="descripcionArchivo" id="descripcionArchivo"></textarea>
            <div class="invalid-feedback"></div>

        </div>
        <div class="col-md-6 mb-3">
            <label for="usuario" class="control-label">Seleccione un usuario</label>
            <select name="usuario" id="usuario">
            <option value="us1">Usuario Uno</option>
            <option value="us2">Usuario Dos</option>
            <option value="us3">Usuario Tres</option>
            <option value="us4">Usuario Cuatro</option>
            </select>
            <div class="invalid-feedback">

            </div>

        </div> 
        <div class="col-md-6 mb-3">
            <label >Campo Clave</label>
            <select name="campoClave" id="campoClave">
            <option value="clave0">0</option>
            <option value="clave1">1</option>            
            </select>
            <div class="invalid-feedback">

            </div>

        </div>

        <div class="col-md-6 mb-3" >
            <label for="icono" class="control-label" name="icono" required>Seleccione un icono</label><br>
            <input type="radio" id="pdf" name="icono" value="pdf">
            <label>PDF <i class="far fa-file-pdf"></i></label><br>
            
            <input type="radio" id="zip" name="icono" value="zip">
            <label >ZIP<i class="fas fa-file-archive"></i></label><br>

            <input type="radio" id="imagen" name="icono" value="imagen">
            <label>Imagen(jpg, png, etc)<i class="far fa-file-image"></i></label><br>

            <input type="radio" id="texto" name="icono" value="texto">
            <label >Texto(doc, txt, etc)<i class="fas fa-file-word"></i></label><br><br>
            <div class="invalid-feedback">         

            </div>
           
        </div>
        <div class="col-md-12 mb-3">
         

            <input id="btn_eje4"  class="btn btn-primary" name="btn_eje4" type="submit" value="Enviar">
            </div>
        


</form>


<div class="row mb-3">
<form  id="ejeArchivos" name="ejeArchivos" method="POST" action="accionEjeArchivos.php">
<div class="row mb-3">
<?php
            foreach ($arreglo as $archivo)
            {
                if (strlen($archivo)>2 && strpos($archivo, "txt")<=0  && strpos($archivo, "pdf")<=0)
                {
                    echo "<div class='col-lg-2 col-md-3 col-sm-4  mb-3'>";
                    echo "<img alt='$archivo' class='' src='../vista/archivos/$archivo'  width='100%' height='80%'>";
                    echo "<input type='submit' name='Seleccion:$archivo' id='Seleccion:$archivo' class='btn btn-secondary btn-block btn-sm' value='Ver Detalles »'></input>";
                    echo "</div>";
                }
            }

            ?>
            </div>
           </form> 
           
            <div class="col mb-6">
            <h2>Opciones de archivos</h2>
            <?php
            $dir="../vista/archivos/";
            //print_r($arreglo);
            //echo "long arr: ".count($arreglo);
            if(count($arreglo)==2){echo "no hay archivos para mostrar";};
            for ($i=0; $i<count($arreglo)-2; $i++)
            {?>
     
                <a href="<?php echo $dir.$arreglo[$i]; ?>" download="<?php echo  $arreglo[$i]; ?>">Descargar archivo</a>
                <a href="<?php echo $dir.$arreglo[$i]; ?>" >ver archivo</a>
                <a href="eliminar.php?archivo=<?php echo $dir.$arreglo[$i];?>" > eliminar archivo</a>
                
                <?php echo "nombre del archivo: ".$arreglo[$i]." ";

                $info = new SplFileInfo($arreglo[$i]);
               $var=$info->getExtension();
               echo "extencion del archivo: ".$var;
               echo "<br> "
               ?>
             
            <?php
             }?>   
                
            </div>
           
            </div>
            </form>

</div>



</body>
<?php
include_once("estructura/pieBT.php");
?>
