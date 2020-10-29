<?php 
class Usuario {
    private $idusuario;
    private $usnombre;
    private $usapellido;
    private $uslogin;
    private $usclave;
    private $usactivo;
    private $mensajeoperacion;
    
   
    public function __construct(){
        
        $this->idusuario="";
        $this->usnombre="";
        $this->usapellido="";
        $this->uslogin="";
        $this->usclave="";
        $this->usactivo="";
        $this->mensajeoperacion ="";
    }
    public function setear($idusuario, $usnombre, $usapellido,$uslogin, $usclave,$usactivo)    {
        $this->setIdusuario($idusuario);
        $this->setNombre($usnombre);
        $this->setApellido($usapellido);
        $this->setLogin($uslogin);
        $this->setClave($usclave);
        $this->setUsactivo($usactivo);
    }   
        
    public function getIdusuario(){
        return $this->idusuario;
        
    }
    public function setIdusuario($valor){
        $this->idusuario = $valor;
        
    }
    
    public function getNombre(){
        return $this->usnombre;
        
    }
    public function setNombre($valor){
        $this->usnombre = $valor;
        
    }
    public function getApellido(){
        return $this->usapellido;
        
    }
    public function setApellido($valor){
        $this->usapellido = $valor;
        
    }
    public function getLogin(){
        return $this->uslogin;
        
    }
    public function setLogin($valor){
        $this->uslogin = $valor;
        
    }
    public function getclave(){
        return $this->usclave;
        
    }
    public function setClave($valor){
        $this->usclave = $valor;
        
    }
            
    public function getUsactivo(){
        return $this->usactivo;
        
    }
    public function setUsactivo($valor){
        $this->usactivo = $valor;
        
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
        $sql="SELECT * FROM usuario WHERE idusuario = ".$this->getIdusuario();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['idusuario'], $row['usnombre'],$row['usapellido'],$row['uslogin'],$row['usclave'],$row['usactivo']);
                    
                }
            }
        } else {
            $this->setmensajeoperacion("Usuario->listar: ".$base->getError());
        }
        return $resp;
    
        
    }
    
    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
         
        $sql="INSERT INTO usuario(idusuario, usnombre, usapellido, uslogin, usclave, usactivo)  VALUES('".$this->getIdusuario()."', '".$this->getNombre()."','".$this->getApellido()."','".$this->getlogin()."','".$this->getClave()."','".$this->getUsactivo()."');";
       // echo "sentencia sql: ".$sql;
        if ($base->Iniciar()) {
            
            if ($unIdusuario = $base->Ejecutar($sql)) {
                $this->setIdusuario($unIdusuario);
                $resp = true;
            } else {
                $this->setmensajeoperacion("Usuario->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Usuario->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        $c="'";
        $sql="UPDATE usuario SET usnombre='".$this->getNombre()."' , usapellido='".$this->getApellido()."', uslogin='".$this->getLogin()."', usclave='".$this->getClave()."', usactivo='".$this->getUsactivo()."' WHERE idusuario=".$c.$this->getIdusuario().$c.";";
       // echo "sentenciA sql: ".$sql;
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Usuario->modificar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Usuario->modificar: ".$base->getError());
        }
        return $resp;
    }
    
    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $c="'";
       
        $sql="DELETE FROM usuario WHERE idusuario=".$c.$this->getIdusuario().$c; 
      
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                
                return true;
            } else {
                $this->setmensajeoperacion("Usuario->eliminar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Usuario->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM usuario ";
        //echo "parametro recibido: ".$parametro."<br>";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;            
        }
        //echo "sentecia SQL : ".$sql;
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new Usuario();
                    $obj->setear($row['idusuario'], $row['usnombre'],$row['usapellido'],$row['uslogin'],$row['usclave'],$row['usactivo']);
                    array_push($arreglo, $obj);
                }
               
            }
            
        } else {
            $this->setmensajeoperacion("Usuario->listar: ".$base->getError());
        }
 
        return $arreglo;
    }
    
}


?>