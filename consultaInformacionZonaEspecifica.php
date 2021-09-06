<?php
//lat,lon,id,propietario
include("conexion.php");
$nombre_zona=$_POST["nombre_z"];

$selectZonaEspecifica="SELECT * FROM zonas WHERE nombre_zona='$nombre_zona'";
$ejecutarConsultaZonaEspecifica=mysqli_query($conexion,$selectZonaEspecifica);
$infomacionZona=mysqli_fetch_row($ejecutarConsultaZonaEspecifica);


$arrayDeZona[]=$infomacionZona[2];
$arrayDeZona[]=$infomacionZona[3];
$arrayDeZona[]=$infomacionZona[0];
$arrayDeZona[]=$infomacionZona[7];

//esta linea sirve para que al enviar los datos por ajax no se tengan problemas con los caracteres latinos
$objeto=json_encode($arrayDeZona, JSON_UNESCAPED_UNICODE);

echo $objeto;
?>