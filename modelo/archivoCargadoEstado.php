<?php 
class archivoCargadoEstado {
    private $idarchivocargadoestado;
    private $idestadotipos;
    private $acedescripcion;
    private $idusuario;
    private $acefechaingreso;
    private $acefechafin;
    private $idarchivocargado;
    private $mensajeoperacion;

    public function __construct(){
        
        $this->idarchivocargadoestado="";
        $this->idestadotipos="";
        $this->acedescripcion="";
        $this->idusuario="";
        $this->acefechaingreso="";
        $this->acefechafin="";
        $this->idarchivocargado="";
        $this->mensajeoperacion ="";
    }
    public function setear($idarchivocargadoestado, $idestadotipos, $acedescripcion,$idusuario, $acefechaingreso,$acefechafin, $idarchivocargado )    {
    
        $this->setIdAce($idarchivocargadoestado);
        $this->setIdestadoTipos($idestadotipos);
        $this->setAcdescripcion($acedescripcion);
        $this->setIdusuario($idusuario);
        $this->setAcefechaingreso($acefechaingreso);
        $this->setAcefechafin($acefechafin);
        $this->setIdarchivocargado($idarchivocargado);      
    }           
    public function getIdAce(){
        return $this->idarchivocargadoestado;        
    }
    public function setIdAce($valor){
        $this->idarchivocargadoestado = $valor;
        
    }    
    public function getIdestadoTipos(){
        return $this->idestadotipos;        
    }
    public function setIdestadoTipos($valor){
        $this->idestadotipos = $valor;        
    }
    public function getAcedescripcion(){
        return $this->acedescripcion;        
    }
    public function setAcdescripcion($valor){
        $this->acedescripcion = $valor;        
    }
    public function getIdusuario(){
        return $this->idusuario;        
    }
    public function setIdusuario($valor){
        $this->idusuario = $valor;        
    }
    public function getAcefechaingreso(){
        return $this->acefechaingreso;        
    }
    public function setAcefechaingreso($valor){
        $this->acefechaingreso = $valor;        
    }
    public function getAcefechafin(){
        return $this->acefechafin;        
    }
    public function setAcefechafin($valor){
        $this->acefechafin = $valor;        
    }
    public function getIdarchivocargado(){
        return $this->idarchivocargado;        
    }
    public function setIdarchivocargado($valor){
        $this->idarchivocargado = $valor;        
    }
    public function getmensajeoperacion(){
        return $this->mensajeoperacion;        
    }
    public function setmensajeoperacion($valor){
        $this->mensajeoperacion = $valor;        
    }    
    
    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM archivocargadoestado WHERE idarchivocargadoestado = ".$this->getIdAce();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['idarchivocargadoestado'], $row['idestadotipos'],$row['acedescripcion'],$row['idusuario'],$row['acefechaingreso'],$row['acefechafin'],$row['idarchivocargado']);
                }
            }
        } else {
            $this->setmensajeoperacion("archivoCargadoEstado->listar: ".$base->getError());
        }
        return $resp;  
    }
    
    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
         
        $sql="INSERT INTO archivocargadoestado(idarchivocargadoestado, idestadotipos, acedescripcion, idusuario, acefechaingreso, acefechafin, idarchivocargado)  VALUES('".$this->getIdAce()."', '".$this->getIdestadoTipos()."','".$this->getAcedescripcion()."','".$this->getIdusuario()."','".$this->getAcefechaingreso()."','".$this->getAcefechafin()."','".$this->getIdarchivocargado()."');";
        //echo "sentencia sql: ".$sql;
        if ($base->Iniciar()) {
            
            if ($unIdAce = $base->Ejecutar($sql)) {
                $this->setIdusuario($unIdAce);
                $resp = true;
            } else {
                $this->setmensajeoperacion("archivoCargadoEstado->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("archivoCargadoEstado->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        $c="'";
        $sql="UPDATE archivocargadoestado SET idestadotipos='".$this->getIdestadotipos()."' , acedescripcion='".$this->getAcedescripcion()."', idusuario='".$this->getIdusuario()."', acefechaingreso='".$this->getAcefechaingreso()."', acefechafin='".$this->getAcefechafin()."', idarchivocargado='".$this->getIdarchivocargado()."' WHERE idarchivocargadoestado=".$c.$this->getIdAce().$c.";";
        //echo "sentenciA sql: ".$sql;
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("archivoCargadoEstado->modificar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("archivoCargadoEstado->modificar: ".$base->getError());
        }
        return $resp;
    }
    
    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $c="'";
       
        $sql="DELETE FROM archivocargadoestado WHERE idarchivocargadoestado=".$c.$this->getIdAce().$c; 
      
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                
                return true;
            } else {
                $this->setmensajeoperacion("archivoCargadoEstado->eliminar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("archivoCargadoEstado->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM archivocargadoestado ";
       
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;            
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new archivoCargadoEstado();
                    $obj->setear($row['idarchivocargadoestado'], $row['idestadotipos'],$row['acedescripcion'],$row['idusuario'],$row['acefechaingreso'],$row['acefechafin'],$row['idarchivocargado']);
                    array_push($arreglo, $obj);
                }
               
            }
            
        } else {
            $this->setmensajeoperacion("idarchivoCargadoEstado->listar: ".$base->getError());
        }
 
        return $arreglo;
    }
    
}
?>