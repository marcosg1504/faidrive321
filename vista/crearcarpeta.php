<?php
$titulo="crear carèta";
include_once("estructura/cabeceraBT.php");

include_once("../configuracion.php");
$datos = data_submitted(); 
$nombreCarpeta=$datos['nombreCarpeta'];

$dir="../vista/archivos/";

if( file_exists ($dir.$nombreCarpeta )){
    echo "la carpeta ya existe";
}else{
        $r=mkdir($dir.$nombreCarpeta, 0700);
        if($r==1){
            echo "la carpeta se creo correctamente";
        }else{
         echo "error al crear carpeta";
        }}
?>
<form  id="carpeta" name="carpeta" method="POST" action="amarchivo.php">


<div class="col-md-6 mb-3">
        <p>Subir archivos a la cerpeta creada</p>
        <input class="form-control" id="nombreCarpeta" name="nombreCarpeta" value="<?php echo $dir.$nombreCarpeta ?> "  readonly type="text" >
        <input id="btn_eje4"  class="btn btn-primary" name="btn_eje4" type="submit" value="continuar">

           </div>

</form>
