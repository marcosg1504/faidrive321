<?php
$titulo="archivos compartidos";
include_once("estructura/cabeceraBT.php");
include_once("../configuracion.php");
?>
<h2> archivos compartidos</h2>
<?php
$unArray = array();
$unArray['idestadotipos']="2";

$objBusqueda= new controlArchivoCargadoEstado();
$lista = $objBusqueda->buscar2($unArray); 
/*
$objAbmAc= new controlArchivoCargado();
$listaAc= $objAbmAc->buscar(null);*/?>


<div class="col mb-6">
<table border="1">
<td >ID ACE</td>
<td >ID estado tipo</td>
<td >descripcion</td>
<td >ID usuario</td>
<td >fecha ingreso</td>
<td > fecha fin</td>
<td > ID AC</td>
<?php          

if( count($lista)>0){
    //echo '<tr><td style="width:70px;">'ID USUARIO'</td>';
    foreach ($lista as $obj) { 

        echo '<tr><td style="width:70px;">'.$obj->getIdAce().'</td>';
        echo '<td style="width:100px;">'.$obj->getIdestadoTipos().'</td>';
        echo '<td style="width:150px;">'.$obj->getAcedescripcion().'</td>';
        echo '<td style="width:200px;">'.$obj->getIdusuario().'</td>';
        echo '<td style="width:220px;">'.$obj->getAcefechaingreso().'</td>';
        echo '<td style="width:220px;">'.$obj->getAcefechafin().'</td>';
        echo '<td style="width:50px;">'.$obj->getIdarchivocargado().'</td></tr>';
         

	}
}
?>
</table>
</div>

<form  id="eliminarcompartido" name="eliminarcompartido" method="POST" action="accioneliminarcompartido.php">

<div class="col mb-6">
                 <br><h4>Dejar de compartir archivos </h4>
                <?php
               if( count($lista)>0) 
               {         
                 foreach ($lista as $objAc) 
                 {?>    

                    <?php echo 'ID del archivo: '.$objAc->getIdAce();?><br>
                    <input type="radio" id="idarchivocargadoestado" name="idarchivocargadoestado" value="<?php echo $objAc->getIdAce()?>" >Seleccionar<br>
                    <input type="hidden"  id="idarchivocargado" name="idarchivocargado" value="<?php echo $objAc->getIdarchivocargado()?>" >
                    <input type="hidden"  id="idusuario" name="idusuario" value="<?php echo $objAc->getIdusuario()?>" >
                    <input type="hidden"  id="acedescripcion" name="acedescripcion" value="<?php echo $objAc->getAcedescripcion()?>" >
                    <input type="hidden"  id="acefechaingreso" name="acefechaingreso" value="<?php echo $objAc->getAcefechaingreso()?>" >
                    <input type="hidden"  id="acefechafin  " name="acefechafin" value="<?php echo $objAc->getAcefechafin()?>" >

              <?php  }
                }    ?>
                
</div>

<div class="col-mb-6">       
            <input id="btn_eje4"  class="btn btn-primary" name="btn_eje4" type="submit" value="Continuar">
         </div>
</form>
<?php
include_once("estructura/pieBT.php");
?>