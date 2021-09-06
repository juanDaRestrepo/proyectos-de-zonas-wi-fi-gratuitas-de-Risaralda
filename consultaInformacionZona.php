<?php

$idZona=$_POST["idZona"];

include("conexion.php");

$consulta="SELECT * FROM zonas WHERE id_zona='$idZona'";
$hacerConsulta=mysqli_query($conexion,$consulta);

$fila=mysqli_fetch_row($hacerConsulta);

$arrayDeZonas[]=$fila[1];

//consulta para saber nombre del municipio al que pertenece la zona para mostrar informacion en tabla 
//emergente de informacion de la zona   
$consultaMunicipio="SELECT nombre_municipio FROM municipio WHERE id_municipio='$fila[6]'";
$hacerConsultaMunicipio=mysqli_query($conexion,$consultaMunicipio);
$filaMunicipio=mysqli_fetch_row($hacerConsultaMunicipio);
$arrayDeZonas[]=$filaMunicipio[0];
//------------------------------------------------------------------------------------------------------
//consulta para saber nombre del responsable de la zona 
$consultaResponsable="SELECT nombreResponsable FROM responsables WHERE idResponsable='$fila[7]'";
$hacerConsultaResponsable=mysqli_query($conexion,$consultaResponsable);
$filaResponsable=mysqli_fetch_row($hacerConsultaResponsable);
$arrayDeZonas[]=$filaResponsable[0];
//----------------------------------
//consulta para saber nombre tipo de sitio en el que se encuentra la zona 
$consultaTipoZona="SELECT nombreTipoSitio FROM tipodesitio WHERE idTipoSitio='$fila[9]'";
$hacerConsultaTipoZona=mysqli_query($conexion,$consultaTipoZona);
$filaTipoZona=mysqli_fetch_row($hacerConsultaTipoZona);
$arrayDeZonas[]=$filaTipoZona[0];



$arrayDeZonas[]=$fila[11];
$arrayDeZonas[]=$fila[12];
//esta linea sirve para que al enviar los datos por ajax no se tengan problemas con los caracteres latinos
$objeto=json_encode($arrayDeZonas, JSON_UNESCAPED_UNICODE);

echo $objeto;
?>