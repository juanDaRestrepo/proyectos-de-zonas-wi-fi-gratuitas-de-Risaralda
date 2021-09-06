<?php

$idMunicipio=$_POST["idMunicipio"];

include("conexion.php");

$consulta="SELECT * FROM zonas WHERE id_municipio='$idMunicipio' AND IdEstado=1 AND estadoMostrar=1";

$hacerConsulta=mysqli_query($conexion,$consulta);


while($fila=mysqli_fetch_row($hacerConsulta)){

    if($fila[10]==1){
        $arrayDeZonas[]=$fila[7];
        $arrayDeZonas[]=$fila[2];
        $arrayDeZonas[]=$fila[3];
    }
};

$objeto=json_encode($arrayDeZonas,JSON_UNESCAPED_UNICODE);

echo $objeto;
?>