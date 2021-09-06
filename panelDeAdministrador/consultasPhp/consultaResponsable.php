<?php
    include("../../conexion.php");

   

    $consulta="SELECT * FROM responsables";

    $hacerConsulta=mysqli_query($conexion,$consulta);

    while($fila=mysqli_fetch_row($hacerConsulta)){
        $arrayDeResponsables[]=$fila[1];
    };

    $objeto=json_encode($arrayDeResponsables, JSON_UNESCAPED_UNICODE);

    echo $objeto;
    
?>