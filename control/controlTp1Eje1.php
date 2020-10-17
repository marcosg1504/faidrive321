<?php

class controlTp1Eje1  {

    public function verNumero($datos){
        $texto="";
        $unNum = $datos['numero'];
        $texto="";
        if($unNum>0){
            $texto="el numero es positivo";
        }else{
            $texto="el numero es negativo";
        }
        if($unNum==0){
            $texto="el numero es cero";
        }
      
     return $texto;
    }

   

}
?>