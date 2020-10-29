<?php
$Titulo = " Ejercicio 1";
include_once("estructura/cabeceraBT.php");
include_once("../configuracion.php");

?>
<p>
    accion AM ARCHIVO
</p>
<?php

 $datos = data_submitted(); 
 
 $enviarDatosBD = new controlArchivoCargado();
 $enviarDatosBD->alta($datos);
 

 $informacionForm = new controlam();
 $infoDelArchivo =new controlam();
 $txt=new controlam();
 $icono= new controlam();
 $textoEd= new controlam();

 
 $respuestaForm = $informacionForm->verInformacion($datos); 
 $respuestaArchivo=$infoDelArchivo->cargarArchivos($datos);
 $archivotxt=$txt->creartxt($datos);
 $iconoDelArch=$icono->sugerirIcono($datos);
 $testoEditor=$textoEd->datosEditor($datos);
/*
 $objAce= new archivoCargadoEstado();
 print_r($objAce);*/
?>

    <div class="row-md-6 mb-3">
        <?php
        echo $respuestaForm."<br>" ;
        echo $respuestaArchivo."<br>";
        echo $archivotxt."<br>";
        echo "TIPO DE ARC:".$iconoDelArch;
        echo $testoEditor;
        ?>  
        <br><a href="amarchivo.php" >volver a cargar archivo</a>

         
    </div>
</body>
<?php
include_once("estructura/pieBT.php");
?>
