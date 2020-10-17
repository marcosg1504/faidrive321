<?php 


$nombre=$_FILES['archivo']['name'];
$guardado=$_FILES['archivo']['tmp_name'];

if(!file_exists('archivos')){
	mkdir('archivos',0777,true);
	if(file_exists('archivos')){
		if ($_FILES['archivo']['size'] > 3000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		  }else{
		if(move_uploaded_file($guardado, 'archivos/'.$nombre)){
			echo "Archivo guardado con exitoooooo";
		}else{
			echo "Archivo no se pudo guardar";
		}}
	}
}else{
	if ($_FILES['archivo']['size'] > 3000){
		echo "el archivo no puede superar los 3000kb";
	}else{
		if(move_uploaded_file($guardado, 'archivos/'.$nombre)){
			echo "El Archivo guardado con exito";
		}else{
			echo "Archivo no se pudo guardar";
		}
	}
}

?>