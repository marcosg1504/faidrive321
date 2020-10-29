<?php
class controlArchivoCargado{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto

    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Auto
     */
    private function cargarObjeto($param){
        $obj = null;
        if( array_key_exists('idarchivocargado',$param)){
       
            $obj = new archivoCargado();          
            $obj->setear($param['idarchivocargado'],$param['acnombre'],$param['acdescripcion'],$param['acicono'],$param['idusuario'],$param['aclinkacceso'],$param['accantidaddescarga'],$param['accantidadusada'],$param['acfechainiciocompartir'],$param['acefechafincompartir'],$param['acprotegidoclave']);
        }
       // echo $obj;
        return $obj;
    }
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Auto
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        
        if( isset($param['idarchivocargado']) ){
            $obj = new archivoCargado();
            $obj->setear($param['idarchivocargado'], null, null, null, $param['idusuario'], null, null, null, null, null,null);
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
        //echo "seteados recibe: ";print_r($param);
        if (isset($param['idarchivocargado']))
            $resp = true;        
        return $resp;
    }
    
    /**
     * 
     * @param array $param
     */
    public function alta($param){
       
        $resp = false;       
        $elObjtAc = $this->cargarObjeto($param);
//            
        if ($elObjtAc!=null and $elObjtAc->insertar()){
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
            $elObjtAc = $this->cargarObjetoConClave($param);
          
            if ($elObjtAc!=null and $elObjtAc->eliminar()){
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
        //echo "aaaacaaaa";print_r($param);
        if ($this->seteadosCamposClaves($param)){
            $elObjtAc = $this->cargarObjeto($param);
            //echo "el OBJETO : "; print_r($elObjtAc);
            if($elObjtAc!=null and $elObjtAc->modificar()){
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
        
            if  (isset($param['idarchivocargado']))
                $where.="idarchivocargado =".$c.$param['idarchivocargado'].$c;
            if  (isset($param['acnombre']))
                 $where.=" and acnombre ='".$param['acnombre']."'";
            if  (isset($param['acdescripcion']))
                 $where.=" and acdescripcion ='".$param['acdescripcion']."'";
            if  (isset($param['acicono']))
                 $where.=" and acicono ='".$param['acicono']."'";
            if  (isset($param['idusuario']))
                 $where.=" and idusuario ='".$param['idusuario']."'";
            if  (isset($param['aclinkacceso']))
                 $where.=" and aclinkacceso ='".$param['aclinkacceso']."'";
            if  (isset($param['accantidaddescarga']))
                 $where.=" and accantidaddescarga ='".$param['accantidaddescarga']."'";
            if  (isset($param['accantidadusada']))
                 $where.=" and accantidadusada ='".$param['accantidadusada']."'";
            if  (isset($param['acfechainiciocompartir']))
                 $where.=" and acfechainiciocompartir ='".$param['acfechainiciocompartir']."'";
            if  (isset($param['acefechafincompartir']))
                 $where.=" and acefechafincompartir ='".$param['aceafechafincompartir']."'";
            if  (isset($param['acprotegidoclave']))
                 $where.=" and acprotegidoclave ='".$param['acprotegidoclave']."'";      
        }
        $arreglo = archivoCargado::listar($where);  
 
        return $arreglo;     
     }    
}
?>