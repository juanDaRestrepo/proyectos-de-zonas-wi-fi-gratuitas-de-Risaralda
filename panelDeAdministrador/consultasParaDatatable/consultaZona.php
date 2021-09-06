<?php
include("../conexion.php");

$sqlZonas="SELECT * FROM zonas WHERE estadoMostrar=1";
$matrizZonas=mysqli_query($conexion,$sqlZonas);





?>
