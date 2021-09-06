<?php
include("../../conexion.php");

   

$consultaCodigoZona="SELECT * FROM zonas WHERE codigoZona='$codigo' AND estadoMostrar='1'";

$hacerConsultaDeCodigoZona=mysqli_query($conexion,$consultaCodigoZona);


    


?>