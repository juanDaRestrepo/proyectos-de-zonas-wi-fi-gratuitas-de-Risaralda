<?php

include("../conexion.php");
$id_zona=$_GET["id_zona"];
$id_zona=intval($id_zona);

$sql="SELECT * FROM `zonas` WHERE id_zona='$id_zona'";

$consultar=mysqli_query($conexion,$sql);

$filaConsulta=mysqli_fetch_row($consultar);
echo $filaConsulta[12];
$sql_update_codigo="UPDATE zonas SET codigoZona='' WHERE id_zona='$id_zona'";
$sql_update_mostrar="UPDATE zonas SET estadoMostrar=0 WHERE id_zona='$id_zona'";

if(!empty($filaConsulta[12])){
    echo "se ntro a este if";
    mysqli_query($conexion,$sql_update_codigo);
    mysqli_query($conexion,$sql_update_mostrar);
    header("Location:verZonas.php");
}else{
    mysqli_query($conexion,$sql_update_mostrar);
    header("Location:verZonas.php");
}

?>

