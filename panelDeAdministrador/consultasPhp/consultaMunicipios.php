<?php
    include("../../conexion.php");

   

    $consulta="SELECT * FROM municipio";

    $hacerConsulta=mysqli_query($conexion,$consulta);
    
    while($filaMunicipios=mysqli_fetch_row($hacerConsulta)){
        $arrayDeMunicipios[]=$filaMunicipios[1];
    };
    
    $objeto=json_encode($arrayDeMunicipios, JSON_UNESCAPED_UNICODE);
    

    echo $objeto;
    
?>