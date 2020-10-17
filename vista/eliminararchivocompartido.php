<?php
$Titulo = " Ejercicio 1";
include_once("estructura/cabeceraBT.php");
?>

<p>
   ELIMINAR ARCHIVO COMPARTIDO
</p>

<!---->
<form  id="eje1" name="eje1" method="GET" action="accionTp1Eje1.php"  data-toggle="validator" >
    <!--<form  id="eje4" name="eje4" method="POST" action="accion.php">-->
    <div class="row">

        <div class="col-md-6 mb-3">
            <label for="nombreArchivo" class="control-label">Nombre del archivo</label>
            <input class="form-control" id="nombreArchivo" name="nombreArchivo" placeholder="1234.png" type="text" >
            <div class="invalid-feedback">

            </div>

        </div>
        
        <div class="col-md-6 mb-3">
            <label for="descripcion" class="control-label">Descripcion del archivo</label>
            <input class="form-control" id="descripcionArchivo" name="descripcionArchivo" placeholder="Escriba una descripcion" type="text" >
            <div class="invalid-feedback">

            </div>

        </div>
        <div class="col-md-6 mb-3">
            <label for="descripcion" class="control-label">Seleccione un usuario</label>
            <select name="usuario" id="cars">
            <option value="us1">Usuario Uno</option>
            <option value="us2">Usuario Dos</option>
            <option value="us3">Usuario Tres</option>
            <option value="us4">Usuario Cuatro</option>
            </select>
            <div class="invalid-feedback">

            </div>

        </div>
        <div class="col-md-6 mb-3">
            <label for="descripcion" class="control-label">Clave del archivo</label>
            <input type="password" id="valor1" name="valor1" required>
            <div class="invalid-feedback">
                Elija un valor numerico por favor
                </div>
            <div class="invalid-feedback">

            </div>

        </div>


        


    </div>
     <div class="row">
         <div class="col-md-8 mb-3">
         </div>
         <div class="">

            <input id="btn_eje4"  class="btn btn-primary" name="btn_eje4" type="submit" value="Enviar">
         </div>
    </div>
</form >

</div>
</body>
<?php
include_once("estructura/pieBT.php");
?>
