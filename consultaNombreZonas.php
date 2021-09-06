<?php
    include("conexion.php");
    $nombre_municipio=$_POST["nombre_m"];
//consulta para saber el id del municipio
    $consulta="SELECT * FROM municipio WHERE nombre_municipio='$nombre_municipio'";
    $hacerConsulta=mysqli_query($conexion,$consulta);
    $infoMunicipio=mysqli_fetch_row($hacerConsulta);

//consulta para saber las zonas relacionadas con el id del municipio
    $consultaZona="SELECT * FROM zonas WHERE id_municipio='$infoMunicipio[0]'";
    $hacerConsultaZona=mysqli_query($conexion,$consultaZona);
   

    while($infoMunicipioZona=mysqli_fetch_row($hacerConsultaZona)){
        if($infoMunicipioZona[10]==1 && $infoMunicipioZona[8]==1){
            $arrayDeZonas[]=$infoMunicipioZona[1];
            
        }
    };
    
    $objeto=json_encode($arrayDeZonas,JSON_UNESCAPED_UNICODE);
    
    
    echo $objeto;
    
?>