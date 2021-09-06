<?php
    include("../../conexion.php");

   

    $consulta="SELECT * FROM estadozona";

    $hacerConsulta=mysqli_query($conexion,$consulta);

    while($fila=mysqli_fetch_row($hacerConsulta)){
        $arrayDeEstado[]=$fila[1];
    };

    $objeto=json_encode($arrayDeEstado, JSON_UNESCAPED_UNICODE);

    echo $objeto;
    
?>