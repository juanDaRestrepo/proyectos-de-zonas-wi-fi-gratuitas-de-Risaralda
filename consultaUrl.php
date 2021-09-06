<?php
$idZona=$_POST["idZona"];

include("conexion.php");

$consulta="SELECT * FROM zonas WHERE id_zona='$idZona'";

$hacerConsulta=mysqli_query($conexion,$consulta);

$fila=mysqli_fetch_row($hacerConsulta);

echo "$fila[4]";


?>