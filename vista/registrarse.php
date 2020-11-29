<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Registrar nuevo usuario</title>
    <style>
        label {
            margin-bottom: 0.1em;
            margin-top: 0.5em;
        }
        .container { margin: 50px auto; }
    </style>
<?php
include_once("../configuracion.php");
$datos = data_submitted();
$objRol= new controlRol();
$listaRoles = $objRol->buscar(null);

$objRol= new controlUsuario();
$listaUs = $objRol->buscar(null);
$cantUs=count($listaUs);
$cantUs=$cantUs-1;
$idUltimoUsuario=$listaUs[$cantUs]->getIdUsuario()+1;
//echo "ultimo id us: ".$idUltimoUsuario;

?>
</head>

<body > 
<form  id="login" name="login" method="post" action="accion/accionregistro.php"  data-toggle="validator" >
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 p-5 bg-white shadow-lg rounded">

                <form id="register-form" method="post">
                    <h2>Registro</h2>
                    <hr>
                    <div class="form-group">
                        <label for="username">Usuario</label>
                        <input name="uslogin" id="uslogin" type="text" class="form-control" placeholder="Nombre de usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Nombre </label>
                        <input name="usnombre" id="usnombre" type="text" class="form-control" placeholder="Nombre de usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="username">apellido</label>
                        <input name="usapellido" id="usapellido" type="text" class="form-control" placeholder="Nombre de usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input name="usclave" id="usclave" type="password" class="form-control" placeholder="Contraseña" required>
                        
                    </div>
                    <div class="form-group">
                        <input name="usactivo" id="usactivo" type="hidden" class="form-control" value="1">
                    </div>
                    <div class="form-group">
                        <input name="idusuario" id="idusuario" type="hidden" class="form-control" value=<?php echo $idUltimoUsuario ?>>
                    </div>
                  
                    <input id="accion" name ="accion" value="nuevo" type="hidden">
                    <div class="col-md-6 mb-3">
            <label for="usuario" class="control-label">Seleccione rol usuario</label><br>
            <select name="idrol" id="idrol">
            <?php
            if( count($listaRoles)>0){         
            foreach ($listaRoles as $objRoles) {     
             echo '<option value='.$objRoles->getIdrol().'>'.$objRoles->getRodescripcion().'</option>';
	             }
                }?>       
            </select>
            <div class="invalid-feedback"> 

            </div>

        </div> 
        <div class="form-group">
                     <a href="login.php"> volver a iniciar sesion </a>
                        
                    </div>
                    <input type="submit" class="btn btn-primary btn-block mt-5" value="registrarse">
                </form>

            </div>
        </div>
     </div>
 </form>

 <!-- Load Validation JS -->
 <script type="text/javascript" src="validatormaster/bs4-form-validation.js"></script>
    <script type="text/javascript">
        let form = new Validation("register-form");
        // Validation Functions
        form.requireText("uslogin", 4, 16, [" "], []);
        //form.requireEmail("email", 4, 30, [" "], []);
        form.registerPassword("usclave", 6, 16, [" "], [], "confirm");
    </script>
<?php

/*print_r($datos); 

if( $datos!=null){
    print_r($datos); 
}*/


?>

<!--*************************************************************-->