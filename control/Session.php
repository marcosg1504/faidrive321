<?php
class Session 
{	
	
	public function __construct() {
		session_start();
	     }
	
	public function iniciar($nombreUsuario) {
        $resp=true;
        $_SESSION['usnombre']=$nombreUsuario;
       // $_SESSION['uspass']=$psw; 
        return $resp; 
        
	}
	public function validar(){
        $inicia=false;
        if(isset($_SESSION['usnombre']))
        { 
           /* if(isset($_SESSION['uspass']))
            {*/
           $inicia=true;
            //}

        }
        return $inicia;
	}
	
	public function activa() {
		$resp=false;
		if (session_status()===PHP_SESSION_ACTIVE) {
			$resp=true;
		}
		return $resp;
	}
	
	
    public function getUsuario() {
		if ($this->validar() && $this->activa()) {

		$usuarioLog=$_SESSION['usnombre'];
			}else{
                $usuarioLog="vacio";
            }
			return $usuarioLog;
	}
	 public function getRol() { 
		 $rol="";
	 	if ($this->getUsuario()!==null) {
	 		$usuarioLog=$this->getUsuario(); 
			 $param=array();
			$param['uslogin']=$usuarioLog; 
			$objUs=new controlUsuario();
			$listaUs=$objUs->buscar($param);			
			$param['idusuario']=$listaUs[0]->getIdusuario(); 
	 	 //$param['idusuario']=$usuarioLog->getIdUsuario(); getIdusuario
	 		$objTransUsRol=new controlUsuarioRol();
			 $listaUsRol=$objTransUsRol->buscar($param);
			 $rol=$listaUsRol[0]->getObjRol()->getIdrol(); 
	 		
	 		
	 	}
	 	return $rol;
	 	}
	 	
	 	public function cerrar() {
	 		
	 		if ($this->activa()) {
	 			unset($_SESSION['usnombre']);
                 unset($_SESSION['uspass']);
              //   setcookie("usnombre", null);
	 			session_destroy();
	 		}
	 	}
	 
}