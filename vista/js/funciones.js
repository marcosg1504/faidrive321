function mostrar(elemento) {
        
    if(elemento.value==="a"){
        document.getElementById("uno").style.display = "block";
        document.getElementById("dos").style.display = "none";
    }else{
        if(elemento.value==="b"){
             document.getElementById("uno").style.display = "none";
             document.getElementById("dos").style.display = "block";
         }  
     }
 }

 function fileValidation(){
    var fileInput = document.getElementById('miArchivo');
    var filePath = fileInput.value;
    var allowedExtensions = /(.jpg|.jpeg|.png|.gif|.doc|.pdf|.zip)$/i;
    if(!allowedExtensions.exec(filePath)){
       alert('solo se permiten archivos .jpeg/.jpg/.png/.gif/.doc/.zip .');
       //fileExtension = filePath.split('.').pop();
        //alert(fileExtension);
        fileInput.value = '';
        return false;
    } else{
        var fileExtension = filePath.split('.').pop();
        //alert(fileExtension);
        if((fileExtension=="jpg")||(fileExtension=="png")||(fileExtension=="gif")){alert("se sugiere usar el icono de imagenes")}
        if(fileExtension=="zip"){alert("se sugiere usar el icono .ZIP")}
        if((fileExtension=="doc")||(fileExtension=="pdf")){alert("se sugiere usar el icono de textos")}
    }

}
function mostrarContrasena(){
    var tipo = document.getElementById("clave");
    if(tipo.type == "password"){
        tipo.type = "text";
    }else{
        tipo.type = "password";
    }
}
$(document).ready(function() {
    $('.content').richText();
});


function validar(){
    var unvalor=document.getElementById("clave").value;
  //alert(unvalor);
     if((unvalor.length)>5){
         alert("es mayor a 5");
     }else{
         alert("es menor a 5");
     }
 }

 function verclave(){
    var tipo = document.getElementById("usclave2");
    if(tipo.type == "password"){
        tipo.type = "text";
    }else{
        tipo.type = "password";
    }
}