<?php
class controlEstadoTipos{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto

    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Auto
     */
    private function cargarObjeto($param){
        $obj = null;
       // echo "<br>cargar recibe: "; print_r($param);
        //echo "marca recibida: ".$param['Marca'];
        if( array_key_exists('idestadotipos',$param)){
            $obj = new estadoTipos();
            $obj->setear($param['idestadotipos'], $param['etdescripcion'], $param['etactivo']);
        }
        return $obj;
    }
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Auto
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        
        if( isset($param['idestadotipos']) ){
            $obj = new estadoTipos();
            $obj->setear($param['idestadotipos'], null, null);
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
       // echo "seteados recibe: ";print_r($param);
        if (isset($param['idestadotipos']))
            $resp = true;        
        return $resp;
    }
    
    /**
     * 
     * @param array $param
     */
    public function alta($param){
        //echo "ver parmetro en alta: ".$param['patente'];
       // print_r($param);
        $resp = false;
        //echo "veeeeeeeeeeeeer: ".$param['Modelo'];
        //$param['Patente'] =null;
        $elObjtEstado = $this->cargarObjeto($param);
//        verEstructura($elObjtTabla);
        
        if ($elObjtEstado!=null and $elObjtEstado->insertar()){
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
            $elObjtEstado = $this->cargarObjetoConClave($param);
            //echo "el obj auto: ";print_r ($elObjtAuto);
            if ($elObjtEstado!=null and $elObjtEstado->eliminar()){
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
       // echo "modificacion recibe: "; print_r($param);
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtEstado = $this->cargarObjeto($param);
            //echo "el OBJETO AUTO: "; print_r($elObjtUsuario);
            if($elObjtEstado!=null and $elObjtEstado->modificar()){
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
        //print_r($param);
        if ($param<>NULL){
            /*if  (isset($param['Patente']))
            $where.=" and Patente =".$param['Patente']; ASI ESTABA ANTES*/ 
            if  (isset($param['idestadotipos']))
                $where.="idestadotipos =".$c.$param['idestadotipos'].$c;
            if  (isset($param['etdescripcion']))
                 $where.=" and etdescripcion ='".$param['etdescripcion']."'";
            if  (isset($param['atactivo']))
                 $where.=" and atactivo ='".$param['atactivo']."'";
          
        }
        $arreglo = estadoTipos::listar($where);  
        //echo "aca abajo arreglo<br>";
       // print_r($arreglo);
        return $arreglo;      
                
        
    }
    
}
?>