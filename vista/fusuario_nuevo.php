<?php
include_once("estructura/cabeceraBT.php");
?>


<h3>Nuevo Usuario</h3>

<form method="post" action="accion/abmUsuario.php">
     <label>Id Usuario</label><br/>
	<input id="idusuario" name ="idusuario" type="text"><br>

	<label>Nombre</label><br/>
	<input id="usnombre" name ="usnombre" type="text"><br>

	<label>Apellido</label><br/>
	<input id="usapellido" name ="usapellido" type="text"><br>

	<label>Login</label><br/>
	<input id="uslogin" name ="uslogin" type="text"><br>
	
	<label>Clave</label><br/>
	<input id="usclave" name ="usclave" type="password"><br>

	<label>US activo</label><br/>
	<input id="usactivo" name ="usactivo" type="number"><br>

	<input id="accion" name ="accion" value="nuevo" type="hidden">
	<input type="submit">
</form>
<br><br>
<a href="fusuario.php">Volver</a>
</body>
</html>