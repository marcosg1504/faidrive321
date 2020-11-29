<?php
class controlUsuario{    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param  
     */
    private function cargarObjeto($param){
        $obj = null;
     
        if( array_key_exists('idusuario',$param)){
            $obj = new Usuario();
            $obj->setear($param['idusuario'], $param['usnombre'], $param['usapellido'], $param['uslogin'], $param['usclave'], $param['usactivo']);
        }
        return $obj;
    }    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param 
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        
        if( isset($param['idusuario']) ){
            $obj = new Usuario();
            $obj->setear($param['idusuario'], null, null,null,null,null);
        }
        return $obj;
    }   
    
    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */
    
    private function seteadosCamposClaves($param){
        $resp = false;    
       if (isset($param['idusuario']))
            $resp = true;        
        return $resp;
    }
    
    /**
     * 
     * @param array $param
     */
    public function alta($param){
        $resp = false;      
        $elObjtUsuario = $this->cargarObjeto($param);        
        if ($elObjtUsuario!=null and $elObjtUsuario->insertar()){
            $resp = true;
        }
        return $resp;        
    }
    /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    public function baja($param){
        $resp = false;    
        if ($this->seteadosCamposClaves($param)){
            $elObjtUsuario = $this->cargarObjetoConClave($param);           
            if ($elObjtUsuario!=null and $elObjtUsuario->eliminar()){
                $resp = true;
            }
        }
        
        return $resp;
    }
    
    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param){      
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtUsuario = $this->cargarObjeto($param);            
            if($elObjtUsuario!=null and $elObjtUsuario->modificar()){
                $resp = true;
            }
        }
        return $resp;
    }
    
    /**
     * permite buscar un objeto
     * @param array $param
     * @return boolean
     */
    public function buscar($param){       
        $where = "";
        $c="'";        
        
        if ($param<>NULL){   
          
            if  (isset($param['idusuario']))
                $where.="idusuario =".$c.$param['idusuario'].$c;

                if($where==""){
                    if  (isset($param['usnombre']))
                    $where.="usnombre ='".$param['usnombre']."'";
                }else{
            if  (isset($param['usnombre']))
                 $where.="and usnombre ='".$param['usnombre']."'";
                }
                if($where==""){
                    if  (isset($param['usapellido']))
                    $where.="usapellido ='".$param['usapellido']."'";
                }else{
                    if  (isset($param['usapellido']))
                    $where.=" and usapellido ='".$param['usapellido']."'";
                }
                if($where==""){
                    if  (isset($param['uslogin']))
                 $where.="uslogin ='".$param['uslogin']."'";
                }else{
                    if  (isset($param['uslogin']))
                    $where.=" and uslogin ='".$param['uslogin']."'";
                }
                if($where==""){
                    if  (isset($param['usclave']))
                    $where.="usclave ='".$param['usclave']."'";
                }else{
                    if  (isset($param['usclave']))
                    $where.=" and usclave ='".$param['usclave']."'";
                }
                if($where==""){                      
                if  (isset($param['usactivo']))
                $where.="usactivo ='".$param['usactivo']."'";
                }else{               
                    if  (isset($param['usactivo']))
                    $where.=" and usactivo ='".$param['usactivo']."'";
                }         
        }
        $arreglo = Usuario::listar($where); 
         return $arreglo;      
    }
    public function iniciarSesionUsuario($param){
        $resp=false;
        if($this->buscar($param)!=null){
            $objSesion =new Session();
            $objSesion->iniciar($param["uslogin"],$param["usclave"]);
           $resp=true;
        }
        return $resp;

    }    
}
?>

