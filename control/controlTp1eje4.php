<?php

class controlTp1eje4  {

       public function verificarEdad($datos){
        $nombre = $datos['nombre'];
        $apellido = $datos['apellido'];
        $edad = $datos['edad'];
        $direccion = $datos['direccion'];
        $texto ="";
        if ($edad >=18)
                $texto =  "Hola yo soy ".$nombre." ".$apellido." vivo en ".$direccion." y soy mayor de edad;";
        else
                $texto = "Hola yo soy ".$nombre." ".$apellido." vivo en  ".$direccion." y NO soy mayor de edad;";
     // print_r($datos);

     return $texto;

    }

}
?>