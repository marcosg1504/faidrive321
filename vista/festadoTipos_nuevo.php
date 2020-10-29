<?php
include_once("estructura/cabeceraBT.php");
?>


<h3>Nuevo Estado Tipos</h3>

<form method="post" action="accion/abmEstadoTipos.php">
     <label>Id estado</label><br/>
	<input id="idestadotipos" name ="idestadotipos" type="text"><br>

	<label>descripcion</label><br/>
	<!--<input id="etdescripcion" name ="etdescripcion" type="text">-->
    <select name="etdescripcion" id="etdescripcion">
            <option value="cargado">Cargado</option>
            <option value="compartido">Compartido</option>
            <option value="no compartido">No compartido</option>
            <option value="eliminado">Eliminado </option>
            </select><br>

	<label>activo</label><br/>
	<input id="etactivo" name ="etactivo" type="text"><br>

	<input id="accion" name ="accion" value="nuevo" type="hidden">
	<input type="submit">
</form>
<br><br>
<a href="festadotipos.php">Volver</a>
</body>
</html>