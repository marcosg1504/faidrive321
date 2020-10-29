<?php 
class archivoCargado{
    
    private $idarchivocargado;
    private $acnombre;
    private $acdescripcion;
    private $acicono;
    private $idusuario;
    private $aclinkacceso;
    private $accantidaddescarga;
    private $accantidadusada;
    private $acfechainiciocompartir;
    private $acefechafincompartir;
    private $acprotegidoclave;
    private $mensajeoperacion;
       
    public function __construct(){
        
         $this->idarchivocargado="";
         $this->acnombre="";
         $this->acdescripcion="";
         $this->acicono="";
         $this->idusuario="";
         $this->aclinkacceso="";
         $this->accantidaddescarga="";
         $this->accantidadusada="";
         $this->acfechainiciocompartir="";
         $this->acefechafincompartir="";
         $this->acprotegidoclave="";
         $this->mensajeoperacion="";
    }
    public function setear($idarchivocargado, $acnombre, $acdescripcion, $acicono, $idusuario, $aclinkacceso, $accantidaddescarga,$accantidadusada, $acfechainiciocompartir, $acefechafincompartir, $acprotegidoclave){
    
        $this->setIdarchivocargado($idarchivocargado);
        $this->setAcnombre($acnombre);
        $this->setAcdescripcion($acdescripcion);
        $this->setAcicono($acicono);
        $this->setIdusuario($idusuario);
        $this->setAclinkacceso($aclinkacceso);
        $this->setAccantidaddescarga($accantidaddescarga);
        $this->setAccantidadusada($accantidadusada);
        $this->setAcfechainiciocompartir($acfechainiciocompartir);
        $this->setAcefechafincompartir($acefechafincompartir);
        $this->setAcprotegidoclave($acprotegidoclave);   
        
    }   
        
    public function getIdarchivocargado(){
        return $this->idarchivocargado;
        
    }
    public function setIdarchivocargado($valor){
        $this->idarchivocargado = $valor;
        
    }
    
    public function getAcnombre(){
        return $this->acnombre;
        
    }
    public function setAcnombre($valor){
        $this->acnombre = $valor;
        
    }
    public function getAcdescripcion(){
        return $this->acdescripcion;
        
    }
    public function setAcdescripcion($valor){
        $this->acdescripcion = $valor;
        
    }
    
    public function getAcicono(){
        return $this->acicono;
        
    }
    public function setAcicono($valor){
        $this->acicono = $valor;
        
    }  
    
    public function getIdusuario(){
        return $this->idusuario;
        
    }
    public function setIdusuario($valor){
        $this->idusuario = $valor;
        
    }

    public function getAclinkacceso(){
        return $this->aclinkacceso;
        
    }
    public function setAclinkacceso($valor){
        $this->aclinkacceso = $valor;
        
    }
    public function getAccantidaddescarga(){
        return $this->accantidaddescarga;
        
    }
    public function setAccantidaddescarga($valor){
        $this->accantidaddescarga = $valor;
        
    }
    public function getAccantidadusada(){
        return $this->accantidadusada;
        
    }
    public function setAccantidadusada($valor){
        $this->accantidadusada = $valor;
        
    }
 
    public function getAcfechainiciocompartir(){
        return $this->acfechainiciocompartir;
        
    }
    public function setAcfechainiciocompartir($valor){
        $this->acfechainiciocompartir = $valor;
        
    }
 
    public function getAcefechafincompartir(){
        return $this->acefechafincompartir;
        
    }
    public function setAcefechafincompartir($valor){
        $this->acefechafincompartir = $valor;
        
    }
    public function getAcprotegidoclave(){
        return $this->acprotegidoclave;
        
    }
    public function setAcprotegidoclave($valor){
        $this->acprotegidoclave = $valor;
        
    }


    public function getmensajeoperacion(){
        return $this->mensajeoperacion;
        
    }
    public function setmensajeoperacion($valor){
        $this->mensajeoperacion = $valor;
        
    }
    
    //****************************** */
    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM archivocargado WHERE idarchivocargado = ".$this->getIdarchivocargado();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['idarchivocargado'], $row['acnombre'],$row['acdescripcion'],$row['acicono'],$row['idusuario'],$row['aclinkacceso'],$row['accantidaddescarga'],$row['accantidadusada'],$row['acfechainiciocompartir'],$row['acefechafincompartir'],$row['acprotegidoclave']);
                    
                }
            }
        } else {
            $this->setmensajeoperacion("archivoCargado->listar: ".$base->getError());
        }
        return $resp;
    
        
    }
    
    public function insertar(){
        $resp = false;
        $base=new BaseDatos();

        $sql="INSERT INTO archivocargado(idarchivocargado, acnombre, acdescripcion, acicono, idusuario,aclinkacceso, accantidaddescarga, accantidadusada, acfechainiciocompartir, acefechafincompartir, acprotegidoclave) VALUES ('".$this->getIdarchivocargado()."','".$this->getAcnombre()."','".$this->getAcdescripcion()."','".$this->getAcicono()."','".$this->getIdusuario()."','".$this->getAclinkacceso()."','".$this->getAccantidaddescarga()."','".$this->getAccantidadusada()."','".$this->getAcfechainiciocompartir()."', '".$this->getAcefechafincompartir()."','".$this->getAcprotegidoclave()."');";
        //echo "sentencia sql: ".$sql;
        if ($base->Iniciar()) {
            
            if ($unArchivoCargado = $base->Ejecutar($sql)) {
                $this->setIdusuario($unArchivoCargado);
                $resp = true;
            } else {
                $this->setmensajeoperacion("archivoCargado->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("archivoCargado->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        $c="'";
        $sql="UPDATE archivocargado 
        SET
        acnombre='".$this->getAcnombre()."' , 
        acdescripcion='".$this->getAcdescripcion()."', 
        acicono='".$this->getAcicono()."', 
        idusuario='".$this->getIdusuario()."', 
        aclinkacceso='".$this->getAclinkacceso()."', 
        accantidaddescarga='".$this->getAccantidaddescarga()."', 
        accantidadusada='".$this->getAccantidadusada()."', 
        acfechainiciocompartir='".$this->getAcfechainiciocompartir()."', 
        acefechafincompartir='".$this->getAcefechafincompartir()."', 
        acprotegidoclave='".$this->getAcprotegidoclave()."' 

        WHERE idarchivocargado=".$c.$this->getIdarchivocargado().$c.";";
        //echo "sentenciA sql: ".$sql;
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("archivoCargado->modificar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("archivoCargado->modificar: ".$base->getError());
        }
        return $resp;
    }
    
    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $c="'";
       
        $sql="DELETE FROM archivocargado WHERE idarchivocargado=".$c.$this->getIdarchivocargado().$c; 
      
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                
                return true;
            } else {
                $this->setmensajeoperacion("archivoCargado->eliminar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("archivoCargado->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM archivocargado ";
       
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;            
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new archivoCargado();
                    $obj->setear($row['idarchivocargado'], $row['acnombre'],$row['acdescripcion'],$row['acicono'],$row['idusuario'],$row['aclinkacceso'],$row['accantidaddescarga'],$row['accantidadusada'],$row['acfechainiciocompartir'],$row['acefechafincompartir'],$row['acprotegidoclave']);
                    array_push($arreglo, $obj);
                }
               
            }
            
        } else {
            $this->setmensajeoperacion("archivoCargado->listar: ".$base->getError());
        }
 
        return $arreglo;
    }
    
}


?>