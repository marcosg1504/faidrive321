</main>
</div>
</div>

<footer class="footer mt-auto py-3">
    <div class="container">

        <p>Blog built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">Marcos Gutierrez</a>.</p>
        <p>
            <a href="#">Subir</a>
        </p>

    </div>
</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS 
<script src="../../TPBootstrap/vista/js/jquery/jquery-3.5.1.slim.min.js"></script>-->
<script src="../../TPBootstrap/vista/js/popper/popper.min.js"></script>
<script src="../../TPBootstrap/vista/js/bootstrap/4.5.2/bootstrap.min.js"></script>
<script src="../../TPBootstrap/vista/js/bootstrap/4.5.2/bootstrapValidator.min.js"></script>

<script type="text/javascript" src="../../faidrive321/vista/js/bootstrap/4.5.2/validator.js"></script>
<script type="text/javascript"> 

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
        </script>
</body>
</html>
