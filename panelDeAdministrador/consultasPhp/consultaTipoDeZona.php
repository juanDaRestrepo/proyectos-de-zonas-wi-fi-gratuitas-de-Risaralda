<?php
    include("../../conexion.php");

   

    $consulta="SELECT * FROM tipodesitio";

    $hacerConsulta=mysqli_query($conexion,$consulta);

    while($fila=mysqli_fetch_row($hacerConsulta)){
        $arrayDeTipoDeZona[]=$fila[1];
    };

    $objeto=json_encode($arrayDeTipoDeZona, JSON_UNESCAPED_UNICODE);

    echo $objeto;
    
?>