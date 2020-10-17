<?php
header("Content-disposition: attachment; filename=archivos/2.jpg");
header("Content-type: application/jpg");
readfile("archivos/2.jpg");
?>