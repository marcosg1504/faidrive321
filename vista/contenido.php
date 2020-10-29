<?php
$titulo="CONTENIDO";
include_once("estructura/cabeceraBT.php");
//include_once("../control/controlam.php");
include_once("../configuracion.php");
$objAbmUsuario= new controlUsuario();
$listaUsuario = $objAbmUsuario->buscar(null);

$objAbmAc= new controlArchivoCargado();
$listaAc= $objAbmAc->buscar(null);
?>
  <h2>Contenido </h2>

<?php

$obj4 = new controlam();
//$opciones= new controlam();
$arreglo = $obj4->obtenerArchivos();

?>
<!--<div class="row mb-6">-->




<form  id="carpeta" name="carpeta" method="POST" action="crearcarpeta.php">


<div class="col-md-3 mb-3">
        <h4>Crear carpeta</h4>
        <input class="form-control" id="nombreCarpeta" name="nombreCarpeta" type="text" >
        <input id="btn_eje4"  class="btn btn-primary" name="btn_eje4" type="submit" value="crear carpeta">

           </div>

</form>
 <form  id="ejeArchivos" name="ejeArchivos" method="POST" action="compartirarchivo.php">
      
        
            <div class="col mb-6">
                <h4>Opciones de archivos</h4>
                 <?php
                 $dir="../vista/archivos/";
                   
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
                echo "<br> ";   
             }?> 
            </div> 
            <div class="col mb-6">
                 <h4>Compartir archivos </h4>
                <?php
               if( count($listaAc)>0)
               {         
                 foreach ($listaAc as $objAc) 
                 {?>    

                    <?php echo '<option value='.$objAc->getIdarchivocargado().'>'."Nombre del archivo: ".$objAc->getAcnombre().'</option>';?>
                    <input type="radio" id="idarchivocargado" name="idarchivocargado" value="<?php echo $objAc->getIdarchivocargado()?>" >Seleccionar<br>
              <?php  }
                }    ?>
                
            </div>

       
       
         <div class="col-mb-6">       
            <input id="btn_eje4"  class="btn btn-primary" name="btn_eje4" type="submit" value="Continuar">
         </div>
         
 </form>

 
 <form  id="eliminar" name="eliminar" method="POST" action="eliminararchivo.php">

    <div class="col mb-6">
                <br> <h2>eliminar archivos </h2><br>
                <?php
               if( count($listaAc)>0)
               {         
                 foreach ($listaAc as $objAc) 
                 {?>    

                    <?php echo '<option value='.$objAc->getIdarchivocargado().'>'."Nombre del archivo: ".$objAc->getAcnombre().'</option>';?>
                    <input type="radio" id="idarchivocargado" name="idarchivocargado" value="<?php echo $objAc->getIdarchivocargado()?>" >Seleccionar<br>
              <?php  }
                }    ?>
                
      </div>
      <div class="col-md-8 mb-3">       
            <input id="btn_eje4"  class="btn btn-primary" name="btn_eje4" type="submit" value="Continuar">
      </div>
 </form>








 



</body>
<?php
include_once("estructura/pieBT.php");
?>
