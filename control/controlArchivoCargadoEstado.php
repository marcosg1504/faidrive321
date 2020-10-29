<?php
class controlArchivoCargadoEstado{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto

     /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Auto
     */
    private function cargarObjeto($param){
        $obj = null;
        
        if( array_key_exists('idarchivocargadoestado',$param)){       
            $obj = new archivoCargadoEstado();
            $obj->setear($param['idarchivocargadoestado'], $param['idestadotipos'], $param['acedescripcion'], $param['idusuario'],$param['acefechaingreso'],$param['acefechafin'],$param['idarchivocargado']);
        }
        //print_r($obj);
        return $obj;
    }
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Auto
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        
        if( isset($param['idarchivocargadoestado']) ){
            $obj = new archivoCargadoEstado();
            $obj->setear($param['idarchivocargadoestado'], $param['idestadotipos'], null,$param['idusuario'],null,null,$param['idarchivocargado']);
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
        if (isset($param['idarchivocargadoestado']))
            $resp = true;        
        return $resp;
    }
    
    /**
     * 
     * @param array $param
     */
    public function alta($param){
      
        $resp = false;       
        $elObjtAce = $this->cargarObjeto($param);   
        
        if ($elObjtAce!=null and $elObjtAce->insertar()){
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
        //print_r($param);
        if ($this->seteadosCamposClaves($param)){
            $elObjtAce = $this->cargarObjetoConClave($param);
            //echo "el obj auto: ";print_r ($elObjtAuto);
            if ($elObjtAce!=null and $elObjtAce->eliminar()){
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
        //echo "Estoy en modificacion";
        //echo "modificacion recibe: "; print_r($param);
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtAce = $this->cargarObjeto($param);
            //echo "el OBJETO AUTO: "; print_r($elObjtAuto);
            if($elObjtAce!=null and $elObjtAce->modificar()){
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
        //$where = " true "; ASI ESTABA ANTES
        $where = "";$c="'";
        
        if ($param<>NULL){
            /*if  (isset($param['Patente']))
            $where.=" and Patente =".$param['Patente']; ASI ESTABA ANTES*/ 
            if  (isset($param['idarchivocargadoestado']))
                $where.="idarchivocargadoestado =".$c.$param['idarchivocargadoestado'].$c;
            if  (isset($param['idestadotipos']))
                 $where.=" and idestadotipos ='".$param['idestadotipos']."'";
            if  (isset($param['acedescripcion']))
                 $where.=" and acedescripcion ='".$param['acedescripcion']."'";
            if  (isset($param['idusuario']))
                 $where.=" and idusuario ='".$param['idusuario']."'";
            if  (isset($param['acefechaingreso']))
                 $where.=" and acefechaingreso ='".$param['acefechaingreso']."'";
            if  (isset($param['acefechafin']))
                 $where.=" and acefechafin ='".$param['acefechafin']."'";
            if  (isset($param['idarchivocargado']))
                 $where.=" and idarchivocargado ='".$param['idarchivocargado']."'";
        }
        $arreglo = archivoCargadoEstado::listar($where);  
     
        return $arreglo;      
                
        
    }    
/*hago el metodo buscar 2 ya que al buscar solo por idestadotipos sin tener 
la idarchivocargadoestado agrega a la sentencia sql la palabra "and" 
es decir luego la sentencia queda:
select * from tabla where and idestadotipos=""... (esto se cuando llama a la funcion listar)

*/
 
    public function buscar2($param){
        $where = "";$c="'";
        
        if ($param<>NULL){
       
            if  (isset($param['idarchivocargadoestado']))
                $where.="idarchivocargadoestado =".$c.$param['idarchivocargadoestado'].$c;
            if($where==""){
                if  (isset($param['idestadotipos']))
                 $where.="idestadotipos ='".$param['idestadotipos']."'";
            }else{
                if  (isset($param['idestadotipos']))
                 $where.=" and idestadotipos ='".$param['idestadotipos']."'";
            }
            if($where==""){
                if  (isset($param['acedescripcion']))
                $where.="acedescripcion ='".$param['acedescripcion']."'";
            }else{
                if  (isset($param['acedescripcion']))
                 $where.=" and acedescripcion ='".$param['acedescripcion']."'";
            }
            if($where==""){                   
            if  (isset($param['idusuario']))
            $where.="idusuario ='".$param['idusuario']."'";
            }else{ 
                if  (isset($param['idusuario']))
                $where.=" and idusuario ='".$param['idusuario']."'";
            }
            if($where==""){
                if  (isset($param['acefechaingreso']))
                 $where.="acefechaingreso ='".$param['acefechaingreso']."'";
            }  else{
                if  (isset($param['acefechaingreso']))
                 $where.=" and acefechaingreso ='".$param['acefechaingreso']."'";
            }
            if($where==""){                
            if  (isset($param['acefechafin']))
            $where.=" and acefechafin ='".$param['acefechafin']."'";
            }else{
                if  (isset($param['acefechafin']))
                $where.=" and acefechafin ='".$param['acefechafin']."'";
            }
            if($where==""){
               if  (isset($param['idarchivocargado']))
                 $where.=" and idarchivocargado ='".$param['idarchivocargado']."'";
            }else{
                if  (isset($param['idarchivocargado']))
                $where.=" and idarchivocargado ='".$param['idarchivocargado']."'";
            }         
     
        }
        $arreglo = archivoCargadoEstado::listar($where);  
     
        return $arreglo;      
                
        
    }    
}
?>