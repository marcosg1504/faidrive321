<?php
// if (!copy($_FILES['miArchivo']['tmp_name'], $dir.$_FILES['miArchivo']['name'])) {
//print_r($_FILES);
//(move_uploaded_file($guardado, 'archivos/'.$nombre)
$nombre=$_FILES['miArchivo']['name'];
$guardado=$_FILES['miArchivo']['tmp_name'];
echo "el nombre es".$nombre."y el guardato es: ".$guardado;
$dir = "archivos/";
$target_file = $dir . basename($_FILES["miArchivo"]["name"]);
//echo $dir;
// Definimos Directorio donde se guarda el archivo
// Comprobamos que no se hayan producido errores

if ($_FILES['miArchivo']['error'] <=0) 
{
 echo "Nombre: " . $_FILES['miArchivo']['name'] . "<br />";
 echo "Tipo: " . $_FILES['miArchivo']['type'] . "<br />";
 echo "Tamaño: " . ($_FILES['miArchivo']["size"] / 1024) . " kB<br />";
 echo "Carpeta temporal: " . $_FILES['miArchivo']['tmp_name']." <br />";
 // Intentamos copiar el archivo al servidor.
    if (!copy($guardado, $dir.$nombre)) {
 echo "ERROR: no se pudo cargar el archivo ";
    }
else{
 echo "el archivo: ".$_FILES['miArchivo']['name']." se ha copiado con Éxito <br />";

}
}
else {
 echo "ERROR no se pudo cargar el archivo. No se pudo acceder al archivo Temporal";
}


$arrayDeArchivos= (scandir($dir));
//print_r($arrayDeArchivos);
 

for ($i=2; $i<count($arrayDeArchivos); $i++) {?>
   <a href="<?php echo $dir.$arrayDeArchivos[$i]; ?>" download="<?php echo  $dir.$arrayDeArchivos[$i]; ?>">Descargar archivo</a>
   <a href="<?php echo $dir.$arrayDeArchivos[$i]; ?>" >ver archivo</a>
 
    <?php echo " nombre del archivo: ".$arrayDeArchivos[$i]."<br>";?>
    
    <?php
     }
    
    ?>
    
   <!-- <a href="<?php echo $dir.$nombre; ?>" download="<?php echo  $nombre; ?>">Descargar archivos subido</a>
     <a href="descarga.php">Descargar archivo subido </a>
     <a <?php unlink($dir.$arrayDeArchivos[$i])?>> eliminar </a>
     -->    