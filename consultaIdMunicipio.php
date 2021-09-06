<?php 


include("conexion.php");
$nombre_municipio=$_POST["nombre_m"];
//consulta para saber el id del municipio
$consulta="SELECT * FROM municipio WHERE nombre_municipio='$nombre_municipio'";
$hacerConsulta=mysqli_query($conexion,$consulta);
$infoMunicipio=mysqli_fetch_row($hacerConsulta);

$array_municipio[]=$infoMunicipio[0];
$array_municipio[]=$infoMunicipio[2];
$array_municipio[]=$infoMunicipio[3];

$objeto=json_encode($array_municipio, JSON_UNESCAPED_UNICODE);
echo $objeto;

?>