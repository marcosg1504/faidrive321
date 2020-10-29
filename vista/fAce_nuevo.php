<?php
include_once("estructura/cabeceraBT.php");
?>
<h3>Nuevo Archivo Cargado Estado</h3>

<form method="post" action="accion/abmAce.php">
     <label>Id Archivo Cargado Estado</label><br/>
	<input id="idarchivocargadoestado" name ="idarchivocargadoestado" type="number"><br>
               
    <label>id estado tipo</label><br/>
    <?php /* aca tengo que hacer un select con los id que hay en estado tipo
    (cargado compartido....)     */  ?>
    <input name="idestadotipos" id="idestadotipos" type="number"><br/>

	<label>descripcion</label><br/>	
    <input name="acedescripcion" id="acedescripcion" type="tetx"><br/>	
    <label>ID usuario</label><br/>
    <?php /* aca tengo que hacer un select con los USUARIOS que hay en la BD
    (cargado compartido....)     */  ?>    
    <input name="idusuario" id="idusuario" type="number"><br/>

    <label>fecha ingreso</label><br/>
	<input id="acefechaingreso" name ="acefechaingreso" type="datetime-local"><br>
    <label>fecha fin</label><br/>
	<input id="acefechafin" name ="acefechafin" type="datetime-local"><br>


    <label>ID archivo Cargado</label><br/>
    <?php /* aca tengo que hacer un select con los USUARIOS que hay en la BD
    (cargado compartido....)     */  ?>    
    <input name="idarchivocargado" id="idarchivocargado" type="number"><br/>

	<input id="accion" name ="accion" value="nuevo" type="hidden">
	<input type="submit">
</form>
<br><br>
<a href="fAce.php">Volver</a>
</body>
</html>