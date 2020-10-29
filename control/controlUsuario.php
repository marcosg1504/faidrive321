<?php
class controlUsuario{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto

    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Auto
     */
    private function cargarObjeto($param){
        $obj = null;
        //echo "<br>cargar recibe: "; print_r($param);
       // echo "marca recibida: ".$param['Marca'];
        if( array_key_exists('idusuario',$param)){
            $obj = new Usuario();
            $obj->setear($param['idusuario'], $param['usnombre'], $param['usapellido'], $param['uslogin'], $param['usclave'], $param['usactivo']);
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
        //echo "seteados recibe: ";print_r($param);
        if (isset($param['idusuario']))
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
        $elObjtUsuario = $this->cargarObjeto($param);
//        verEstructura($elObjtTabla);
        
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
        //print_r($param);
        if ($this->seteadosCamposClaves($param)){
            $elObjtUsuario = $this->cargarObjetoConClave($param);
            //echo "el obj auto: ";print_r ($elObjtAuto);
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
        //echo "Estoy en modificacion";
       // echo "modificacion recibe: "; print_r($param);
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtUsuario = $this->cargarObjeto($param);
            //echo "el OBJETO AUTO: "; print_r($elObjtUsuario);
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
        //$where = " true ";// ASI ESTABA ANTES
        $where = "";$c="'";
        //echo "parametro id usuario: ".$param['usnombre'];
        
        if ($param<>NULL){
            /*if  (isset($param['Patente']))
            $where.=" and Patente =".$param['Patente']; ASI ESTABA ANTES*/ 
            if  (isset($param['idusuario']))
                $where.="idusuario =".$c.$param['idusuario'].$c;
            if  (isset($param['usnombre']))
                 $where.="and usnombre ='".$param['usnombre']."'";
            if  (isset($param['usapellido']))
                 $where.=" and usapellido ='".$param['usapellido']."'";
            if  (isset($param['uslogin']))
                 $where.=" and uslogin ='".$param['uslogin']."'";
            if  (isset($param['usclave']))
                 $where.=" and usclave ='".$param['usclave']."'";
            if  (isset($param['usactivo']))
                 $where.=" and usactivo ='".$param['usactivo']."'";
        }
        $arreglo = Usuario::listar($where);  
        //echo "aca abajo arreglo<br>";
        //print_r($arreglo);
        return $arreglo;      
                
        
    }
    
}








/* if ($param<>NULL){
            /*if  (isset($param['Patente']))
            $where.=" and Patente =".$param['Patente']; ASI ESTABA ANTES
            if  (isset($param['idusuario']))
                $where.="idusuario =".$c.$param['idusuario'].$c;
            if  (isset($param['usnombre']))
                 $where.=" and usnombre ='".$param['usnombre']."'";
            if  (isset($param['usapellido']))
                 $where.=" and usapellido ='".$param['usapellido']."'";
            if  (isset($param['uslogin']))
                 $where.=" and uslogin ='".$param['uslogin']."'";
            if  (isset($param['usclave']))
                 $where.=" and usclave ='".$param['usclave']."'";
            if  (isset($param['usactivo']))
                 $where.=" and usactivo ='".$param['usactivo']."'";
        } */














?>

