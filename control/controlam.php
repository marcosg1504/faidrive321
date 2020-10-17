<?php

class controlam  {

    public function verInformacion($datos)
    {
        $ie="";
        $icono="";
        $nombre = $datos['nombreArchivo'];
        $descripcion = $datos['descripcionArchivo'];
        $icono=$datos['icono'];
        if($icono==""){
            echo "tipo de arrrrr: ".$_FILES['miArchivo']['type'];
        }

        if($icono=="pdf")
        { 
            $ie= "<i class="."\"far fa-file-pdf\"></i>"; 
        }
        if($icono=="zip")
        { 
            $ie= "<i class="."\"far fa-file-archive\"></i>"; 
        }
        if($icono=="imagen")
        { 
            $ie= "<i class="."\"far fa-file-image\"></i>"; 
        }
        if($icono=="texto")
        { 
            $ie= "<i class="."\"far fa-file-word\"></i>"; 
        }
        
        ;
        
        
        $texto = 
        "nombre elegido: ".$nombre."<br>Descripcion :".$descripcion."<br>icono elegido: ".$ie;
     // print_r($datos);
     return $texto;
    }
    public function creartxt($datos){
        $nombreArchivoDescripcion=$datos['nombreArchivo'].".txt";
        $descripcion = $datos['descripcionArchivo'];
        $dir = "archivos/";
    if ( $descripcion!="")
    {
        $fArchivoaCrear=fopen($dir.$nombreArchivoDescripcion, "w");
        fwrite($fArchivoaCrear, $descripcion);
        fclose($fArchivoaCrear);
    }
}
    public function  opcionesArchivos($datos)
    {
        
        $dir = "archivos/";
     
        echo "<br>";

      
            $arrayDeArchivos= (scandir($dir));
            
        for ($i=2; $i<count($arrayDeArchivos); $i++) {?>
     
     <a href="<?php echo $dir.$arrayDeArchivos[$i]; ?>" download="<?php echo  $arrayDeArchivos[$i]; ?>">Descargar archivo</a>
     <a href="<?php echo $dir.$arrayDeArchivos[$i]; ?>" >ver archivo</a>
   
     <a href="eliminar.php?archivo=<?php echo $dir.$arrayDeArchivos[$i];?>" > eliminar archivo</a>
    
      <?php echo " nombre del archivo: ".$arrayDeArchivos[$i]."<br>";?>
      
      <?php
       }            
    }
    public function eliminarArchivos($unArc)
    {
        //$nombreArchivo=$_FILES['miArchivo']['name'];
        //echo "ddddddddd ".$nombreArchivo;
        echo "aaaaaaaa".$unArc;
        unlink($unArc);
        echo "archivo eliminado";
       //return $texto;
    }
    public function obtenerArchivos()
    {
        $directorio = "archivos/";
        $archivos = scandir($directorio, 1);
        return $archivos;
    }

    public function sugerirIcono($datos){
        $tipoArch=$_FILES['miArchivo']['type'] . "<br />";
        return $tipoArch;
    }
    public function datosEditor($datos){
        $datosEd=$datos['descripcionArchivo'];
        return $datosEd;
    }
    public function cargarArchivos($datos)
    {
        $texto="";
        $nombre=$_FILES['miArchivo']['name'];
        $guardado=$_FILES['miArchivo']['tmp_name'];
        $texto= "el nombre es ".$nombre."<br> se encuentra guardato en: ".$guardado;
        $dir = "archivos/";
        $target_file = $dir . basename($_FILES["miArchivo"]["name"]);

        if ($_FILES['miArchivo']['error'] <=0) 
        {
        $texto= "Nombre: " . $_FILES['miArchivo']['name'] . "<br />".
        "Tipo: " . $_FILES['miArchivo']['type'] . "<br />".
        "Tamaño: " . ($_FILES['miArchivo']["size"] / 1024) . " kB<br />".
        "Carpeta temporal: " . $_FILES['miArchivo']['tmp_name']." <br />";
        // Intentamos copiar el archivo al servidor.
          if (!copy($guardado, $dir.$nombre)) {
             $texto= "ERROR: no se pudo cargar el archivo ";
            }
            else{
           $texto=$texto."el archivo: ".$_FILES['miArchivo']['name']." se ha copiado con Éxito <br />";

            }
        }
        else {
        $texto= "ERROR no se pudo cargar el archivo. No se pudo acceder al archivo Temporal";
        }
        return $texto;
    }   

}
?>