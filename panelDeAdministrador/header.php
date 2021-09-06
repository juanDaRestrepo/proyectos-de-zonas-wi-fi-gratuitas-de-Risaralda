<?php session_start();
if(!isset($_SESSION['usuario'])){
    header("Location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="stylesheet" href="assests/css/estilosDelPanel.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
<title>Panel de administración</title>
</head>
<body >

    <div class="container-fluid">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand h1 " href="#">Panel de administración</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link h5" href="inicio.php">Inicio </a>
            </li>
            <li class="nav-item">
                <a class="nav-link h5" href="agregarZonas.php">Agregar Zonas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link h5" href="verZonas.php">Ver zonas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link h5" href="../index.php"  target="_blank">Ir a app</a>
            </li>
            <li class="nav-item">
                <a class="nav-link h5" href="cerrarSesion.php">Cerrar sesión</a>
            </li>
            </ul>
        </div>
        </nav>
      
        
        
