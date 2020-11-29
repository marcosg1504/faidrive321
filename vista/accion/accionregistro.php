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
    <title>Registro</title>
    <style>
        label {
            margin-bottom: 0.1em;
            margin-top: 0.5em;
        }
        .container { margin: 50px auto; }
    </style>
<?php
include_once("../../configuracion.php");
$datos = data_submitted();
$resp = false;
$objAbmUsuario = new controlUsuario();
$varUs=$objAbmUsuario-> alta($datos);
/*echo "la id usuario es: ".$varUs->getIdusuario();
$datos['idusuario']=$objAbmUsuario->getIdusuario();*/
$objUsRol=new controlUsuarioRol();
$varUsrol= $objUsRol->alta($datos);
//echo "var us:".$varUs."<br>";
//echo "var us rol:".$varUsrol."<br>";
if ($varUs==true && $varUsrol==true){
    $mensaje = "El ingreso se realizo correctamente";
} else {
    $mensaje = "El ingreso no se realizo";
}

?>
</head>

<body >
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 p-5 bg-white shadow-lg rounded">
                
                <p align="center"><?php echo $mensaje; ?> </p>
                <a href="../login.php"> Volver </a>

            </div>
        </div>
     </div>


<?php


?>

