<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <script src="http://localhost/faidrive321/vista/js/funciones.js"></script>
    <script src="js/md5.js"></script>
    <title>Login</title>
    <style>
        label {
            margin-bottom: 0.1em;
            margin-top: 0.5em;
        }
        .container { margin: 50px auto; }
    </style>

<?php 
include_once("../configuracion.php");
//$datos = data_submitted();


?>  
<script>
var entro=false;
function encriptar(){
    if(!entro){
        entro=true;
        (document.getElementById("usclave").value)=hex_md5(document.getElementById("usclave2").value);
  
        var clave=(document.getElementById("usclave2").value);
       // alert(clave);
        var long=clave.length;
        //alert(long);
        var cadena=crearcadena(long);
        //alert (cadena);
        (document.getElementById("usclave2").value)=cadena;
    }

//alert(document.getElementById("usclave").value);
//(document.getElementById("usclave").value)=cadena;
return true;

 }
 function crearcadena(length) {
   var result           = '';
   var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
   var charactersLength = characters.length;
   for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
   }
   return result;
}

 </script>
</head>

<body >
<form  id="login" name="login" method="post" action="verificarpass.php" onsubmit="return encriptar();" data-toggle="validator" >
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 p-5 bg-white shadow-lg rounded">

                <form id="register-form" method="post">
                    <h2>Login</h2>
                    <hr>
                    <div class="form-group">
                        <label for="username">Usuario</label>
                        <input name="uslogin" id="uslogin" type="text" class="form-control" placeholder="Nombre de usuario" required>
                        <div class="invalid-feedback"> 
 
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input name="usclave2" id="usclave2" type="password" class="form-control" placeholder="Contraseña" required>
                        <button   type="button" onclick="verclave()"> <i class="fas fa-eye-slash"></i> </button>
                         
                    </div>  
                    <div class="form-group">
                      <?php
                      if(isset($_GET["mensaje"])){
                        $mensaje = $_GET["mensaje"];
                        
                            echo $mensaje;
                        }
                      ?>                        
                    </div>
                    <div class="form-group">
                     <a href="registrarse.php"> registrarse </a>
                        
                    </div>
                    
                    <input type="submit" class="btn btn-primary btn-block mt-5" value="Ingresar"/>
                
              

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
<script src="../vista/js/bootstrap/4.5.2/bootstrapValidator.min.js"></script>
<script type="text/javascript" src="../vista/js/bootstrap/4.5.2/validator.js"></script>
<?php

?>
<!--*************************************************************-->