<?php

class controlTp1eje2  {

    public function verHorarios($datos){
        $horaInicioLunes=$datos["horaLunesInicio"];
        $horaInicioMartes=$datos["horaMartesInicio"];
        $horaInicioMiercoles=$datos["horaMiercolesInicio"];
        $horaInicioJueves=$datos["horaJuevesInicio"];
        $horaInicioViernes=$datos["horaViernesInicio"];

        $horaFinLunes=$datos["horaLunesFin"];
        $horaFinMartes=$datos["horaMartesFin"];
        $horaFinMiercoles=$datos["horaMiercolesFin"];
        $horaFinJueves=$datos["horaJuevesFin"];
        $horaFinViernes=$datos["horaViernesFin"];
        $texto= "el horario del lunes es de ".$horaInicioLunes." a ".$horaFinLunes."<br>"
        ." el horario del martes es de ".$horaInicioMartes." a ".$horaFinMartes."<br>"
        ." el horario del miercoles es de ".$horaInicioMiercoles." a ".$horaFinMiercoles."<br>"
        ." el horario del jueves es de ".$horaInicioJueves." a ".$horaFinJueves."<br>"
        ." el horario del viernes es de ".$horaInicioViernes." a ".$horaFinViernes
        ;        
      
     return $texto;
    }

   

}
?>