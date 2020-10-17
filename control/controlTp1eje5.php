<?php

class controlTp1eje5  {

    public function verInfo($datos){
        $nombre = $datos['nombre'];
        $apellido = $datos['apellido'];
        $edad = $datos['edad'];
        $direccion = $datos['direccion'];
        $sexo=$datos['opciones'];
        $estudios=$datos['estudios'];
        $texto=" ";
        if($datos!=null){
        $texto=
        "<br>nombre: ".$nombre.
        "<br>apellido: ".$apellido.
        "<br> edad: ".$edad.
        "<br>direccion: ".$direccion.
        "<br>sexo: ".$sexo.
        "<br>estudios: ".$estudios;
        }
     return $texto;
    

    }

}
?>