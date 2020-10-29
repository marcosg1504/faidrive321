<?php 
class estadoTipos {
    private $idestadotipos;
    private $etdescripcion;
    private $etactivo;
    private $mensajeoperacion;
    
   
    public function __construct(){
        
        $this->idestadotipos="";
        $this->etdescripcion="";
        $this->etactivo="";      
        $this->mensajeoperacion ="";
    }
    public function setear($idestadotipos, $etdescripcion, $etactivo)    {
        $this->setIdestadotipos($idestadotipos);
        $this->setEtdescripcion($etdescripcion);
        $this->setEtactivo($etactivo);       
    }   
        
    public function getIdestadotipos(){
        return $this->idestadotipos;        
    }
    public function setIdestadotipos($valor){
        $this->idestadotipos = $valor;        
    }    
    public function getEtdescripcion(){
        return $this->etdescripcion;        
    }
    public function setEtdescripcion($valor){
        $this->etdescripcion = $valor;        
    }
    public function getEtactivo(){
        return $this->etactivo;        
    }
    public function setEtactivo($valor){
        $this->etactivo = $valor;        
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
        $sql="SELECT * FROM estadotipos WHERE idestadotipos = ".$this->getIdestadotipos();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['idestadotipos'], $row['etdescripcion'],$row['etactivo']);
                    
                }
            }
        } else {
            $this->setmensajeoperacion("estadoTipos->listar: ".$base->getError());
        }
        return $resp;
    
        
    }
    
    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
         
        $sql="INSERT INTO estadotipos(idestadotipos, etdescripcion, etactivo)  VALUES('".$this->getIdestadotipos()."', '".$this->getEtdescripcion()."','".$this->getEtactivo()."');";
        //echo "sentencia sql: ".$sql;
        if ($base->Iniciar()) {
            
            if ($unIdestado = $base->Ejecutar($sql)) {
                $this->setIdestadotipos($unIdestado);
                $resp = true;
            } else {
                $this->setmensajeoperacion("estadoTipos->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("estadoTipos->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        $c="'";
        $sql="UPDATE estadotipos SET etdescripcion='".$this->getEtdescripcion()."' , etactivo='".$this->getEtactivo()."' WHERE idestadotipos=".$c.$this->getIdestadotipos().$c.";";
       // echo "sentenciA sql: ".$sql;
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("estadoTipos->modificar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("estadoTipos->modificar: ".$base->getError());
        }
        return $resp;
    }
    
    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $c="'";
       
        $sql="DELETE FROM estadotipos WHERE idestadotipos=".$c.$this->getIdestadotipos().$c; 
      
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                
                return true;
            } else {
                $this->setmensajeoperacion("estadoTipos->eliminar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("estadoTipos->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM estadotipos ";
       
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;            
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new estadoTipos();
                    $obj->setear($row['idestadotipos'], $row['etdescripcion'],$row['etactivo']);
                    array_push($arreglo, $obj);
                }
               
            }
            
        } else {
            $this->setmensajeoperacion("estadoTipo->listar: ".$base->getError());
        }
 
        return $arreglo;
    }
    
}


?>