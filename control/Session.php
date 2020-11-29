<?php
class Session 
{	
	
	public function __construct() {
		session_start();
	     }
	
	public function iniciar($nombreUsuario,$psw) {
        $resp=true;
        $_SESSION['usnombre']=$nombreUsuario;
        $_SESSION['uspass']=$psw; 
        return $resp; 
        
	}
	public function validar(){
        $inicia=false;
        if(isset($_SESSION['usnombre']))
        { 
            if(isset($_SESSION['uspass']))
            {
           $inicia=true;
            }

        }
        return $inicia;
	}
	
	public function activa() {
		$resp=false;
		if (session_status()=== PHP_SESSION_ACTIVE) {
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
	 	if ($this->getUsuario()!==null) {
	 		$usuarioLog=$this->getUsuario();
	 		$param=array();
	 		$param['idusuario']=$usuarioLog->getIdUsuario();
	 		$objTransUsRol=new controlUsuarioRol();
	 		$lista=$objTransUsRol->buscar($param);
	 		$objRol=$lista[0];
	 		$param1=array();
	 		$param1['idrol']=$objRol->getIdRol();
	 		$objTransRol=new controlRol();
	 		$lista=$objTransRol->buscar($param1);
	 		$objRol=$lista[0];
	 		
	 	}
	 	return $objRol;
	 	}
	 	
	 	public function cerrar() {
	 		
	 		if ($this->activa()) {
	 			unset($_SESSION['usnombre']);
                 unset($_SESSION['uspass']);
                 setcookie("usnombre", null);
	 			session_destroy();
	 		}
	 	}
	 
}