<?php

$Titulo = " Ejercicio 1";
include_once("estructura/cabeceraBT.php");
include_once("../control/controlam.php");
include_once("../configuracion.php");
?>

<p>
    ELIMINAR ARCHIVO
</p>
<?php
 $datos = data_submitted();
 //print_r($datos);
 $eliminar=$datos['archivo'];
 $objEliminar = new controlam();
 $respuesta = $objEliminar->eliminarArchivos($eliminar); 
 ?>

    <div class="row-md-6 mb-3">
        <?php
        echo $respuesta ;?>                       
    </div>
