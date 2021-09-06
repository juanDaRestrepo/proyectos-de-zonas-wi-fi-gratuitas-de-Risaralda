<?php
$db_host="localhost";
$db_nombre="wifi";
$db_usuario="root";
$db_contrasena="";

$conexion=mysqli_connect($db_host,$db_usuario,$db_contrasena,$db_nombre);

if(mysqli_connect_error()){
    echo "Fallo al conectar con la base de datos";
    exit();
}
//esta linea es para que las consultas hechas a la base de datos no tenga problemas con caracteres latinos
mysqli_set_charset($conexion,"utf8");


?>