<?php

class controlTp1eje8  {

    public function verInformacion($datos)
    {
                   
       $edadRecibida=$datos["edad"];
       $valor=$datos["estudios"];
      
       $res=".";
       if($valor=="si")
       {
       if($edadRecibida<12)
       {
           $res="abona un total de 160";
        //echo "abona 160";
       }  else{
           //echo "abona 180";
           $res="abona un total de 180";
           }       
       }
       else{
        $res="abona un total de 300";
       //echo "abona 300";
       }
       return $res;
       }
      // print_r($datos);    

    }

   


?>