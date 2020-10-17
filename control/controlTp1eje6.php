<?php

class controlTp1eje6  {

    public function verInfo($datos){
        $nombre = $datos['nombre'];
        $apellido = $datos['apellido'];
        $edad = $datos['edad'];
        $direccion = $datos['direccion'];
        $sexo=$datos['opciones'];
        $estudios=$datos['estudios'];
        $fut=$datos['dep1'];
        $bas=$datos['dep2'];
        $ten=$datos['dep3'];
        $vol=$datos['dep4'];
        if($fut || $bas || $vol || $ten ==''){
            
        }
        $deportes=$fut."  ".$bas." ".$vol." ".$ten;

 
        $texto=" ";
        if($datos!=null){
        $texto=
        "<br>nombre: ".$nombre.
        "<br>apellido: ".$apellido.
        "<br> edad: ".$edad.
        "<br>direccion: ".$direccion.
        "<br>sexo: ".$sexo.
        "<br>estudios: ".$estudios.
        "<br>deportes que practica: ".$deportes;

        }
     return $texto;
    

    }

}
?>