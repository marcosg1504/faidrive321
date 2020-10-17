<?php

class controlTp1eje7  {

    public function operaciones($datos){
        $operacion = $datos['opciones'];
        $num1=$datos['num1'];
        $num2=$datos['num2'];
        //$texto="";
        $res=0;
        if($operacion=="suma")
        {
            $res=$num1+$num2;
            $texto="el resultado es ".$res;
        }
        if($operacion=="resta")
        {
            $res=$num1-$num2;
            $texto="el resultado es ".$res;
        }
        if($operacion=="multiplicacion")
        {
            $res=$num1*$num2;
            $texto="el resultado es ".$res;
        }
      
     return $texto;
     
    

    }

}
?>