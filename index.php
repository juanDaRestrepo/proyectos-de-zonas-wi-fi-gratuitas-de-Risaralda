
<?php include("conexion.php");

$consulta = "SELECT * FROM municipio";

$resultado = mysqli_query($conexion,$consulta);




?>

<!DOCTYPE html>
<html lang="es">

<meta http-equiv="Content-type" content="text/html; charset=utf-8" />


<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Zonas de acceso publico gratuito del departamento de Risaralda</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<!--jquery-->
	<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="js/menuDesplegable.js"></script>
	<!--bootstrap-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!--api leaflet para los mapas-->
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
</head>
<body>
	

	<div id="contenedorPrincipal" class="contenedor-flex container-fluid">
		
		
		<div class="fixed-top menu mb-5 border-bottom">
			
				<div class="titulo-zonas ">
					<h1  class='titulo-principal text-center'>Zonas de acceso publico gratuito de Risaralda</h1>
				</div>
				<div class="logo-governacion ">
					<img class="logo-governacion img-fluid" src="imagenesDeZonas/LOGO GOBERNACION-03.png" alt="logo">
				</div>	
			
		</div><br>

		
		<!--selects solo para version de la app en movil-->

		<form class="contenedor-selects border text-center" name="selects">
  
 			<div class="form-group">
    			<label for="exampleFormControlSelect1" name="selectMunicipio">Seleccione municipio</label>
    			<select class="form-control selects-movil" id="select-municipios">
					<option selected disabled>Seleccione municipio</option>
    			</select>
  			</div>
  			<div class="form-group">
  			<label for="exampleFormControlSelect1">Seleccione zona</label>
    		<select class="form-control selects-movil" id="select-zona">
				<option selected disabled>Seleccione zona</option>
    		</select>
  			</div>
  
		</form>

		<!--esta es otra opcion de nav para movil-->
		<!--
		<button class="iconoMenuMostrar">
			Click aqui para mostrar zonas 
			<img class='icono-dropdown-zonas' src='imagenesDeZonas/aprovechar.png' alt='icono de navegación' width='10' height='10'>
		</button>
		<button class="iconoMenuOcultar">
			Click aqui para mostrar zonas
			<img class='icono-dropdown-zonas' src='imagenesDeZonas/aprovechar.png' alt='icono de navegación' width='10' height='10'>
		</button>-->
		
		
		<!--selects para la version de escritorio-->
		
		<div class="row  contenedor-mapa-nav">
		<div class="col-sm-1 col-md-1">
		</div>
		<div class="col-sm-3 col-md-3 contenedor-dropDown ">
		
		<?php
			while($fila=mysqli_fetch_row($resultado)){
				echo "
					<div class='dropdownMenu' class='item-flex'>
						<div class='title dropdownButton' onclick='crearMapaMunicipio($fila[0],$fila[2],$fila[3])'>
		    					<p class='municipio'>".$fila[1]."</p>
								<img class='icono-dropdown' src='imagenesDeZonas/down-arrow.png' alt='Girl in a jacket' width='10' height='10'>
						</div>
					<div class='dropdownContent'>
		    			<ul>
				";
		
				$consultaZona = "SELECT * FROM zonas WHERE id_municipio='$fila[0]' AND IdEstado=1 AND estadoMostrar=1";
				$resultadoZona = mysqli_query($conexion,$consultaZona);

				while($filaZona=mysqli_fetch_row($resultadoZona)){
					echo"<li><a href='#map' class='zona' onclick='crearMapa($filaZona[2],$filaZona[3],$filaZona[0],$filaZona[7])'>$filaZona[1]</a></li>";
					}
				echo "</ul>
					</div>
					</div>";
			}
		?>
		</div>
		<div class="col-sm-1 col-md-1">
		</div>
		<div class="col-sm-6 col-md-6">
		<div id="map" class='item-flex'></div>
		
    	<div id="ventanaInformativa" class='item-flex mt-3'></div>
		</div>
		<div class="col-sm-1 col-md-1">
		</div>
<!--aqui termina la fila que contiene el nav el mapa y info de la zona-->	
		</div>
		<div>
<!--aqui termina el div del contenedor principal-->
	</div>

	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
  		integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   		crossorigin=""></script>

	<script src="js/map.js"></script>
	<script src="js/menuhHamburguesa.js"></script>
	<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>