<?php

include("header.php");
@$id_zona=$_GET["id_zona"];
@$codigo=$_GET["codigo"];
@$nombre=$_GET["nombre"];
@$latitud=$_GET["latitud"];
@$longitud=$_GET["longitud"];
@$url=$_GET["url"];
@$municipio=$_GET["municipio"];
@$responsable=$_GET["responsable"];
@$tipoDeZona=$_GET["tipoDeZona"];
@$estado=$_GET["estado"];
@$imagen=$_GET["imagen"];

include("../conexion.php");

$consultaUrl="SELECT * FROM zonas WHERE id_zona='$id_zona'";

$hacerConsultaUrl=mysqli_query($conexion,$consultaUrl);

$fila=mysqli_fetch_row($hacerConsultaUrl);



//consulta para saber nombre del municipio al que pertenece la zona para mostrar informacion en tabla 
//emergente de informacion de la zona   
$consultaMunicipio="SELECT nombre_municipio FROM municipio WHERE id_municipio='$fila[6]'";
$hacerConsultaMunicipio=mysqli_query($conexion,$consultaMunicipio);
$filaMunicipio=mysqli_fetch_row($hacerConsultaMunicipio);

//consulta para saber nombre del responsable de la zona 
$consultaResponsable="SELECT nombreResponsable FROM responsables WHERE idResponsable='$fila[7]'";
$hacerConsultaResponsable=mysqli_query($conexion,$consultaResponsable);
$filaResponsable=mysqli_fetch_row($hacerConsultaResponsable);
//consulta para saber nombre tipo de sitio en el que se encuentra la zona 
$consultaTipoZona="SELECT nombreTipoSitio FROM tipodesitio WHERE idTipoSitio='$fila[9]'";
$hacerConsultaTipoZona=mysqli_query($conexion,$consultaTipoZona);
$filaTipoZona=mysqli_fetch_row($hacerConsultaTipoZona);
//consulta para saber estado de la zona 
$consultaEstado="SELECT nombreEstado FROM estadozona WHERE idEstado='$fila[8]'";
$hacerConsultaEstado=mysqli_query($conexion,$consultaEstado);
$filaEstado=mysqli_fetch_row($hacerConsultaEstado);

?>
<div class="row" id="contenedor-formularios"> 
    <div class="col-sm-1"></div>
    <form class="form-horizontal col-sm-4 mt-4 border rounded pt-2 mb-4" enctype="multipart/form-data">
    
   
    
    <div class="form-group">
        <label for="Nombre"><strong>Nombre</strong></label>
        <input name="nombre" type="text" class="form-control" id="Nombre" placeholder="nombre de la zona" value="<?php echo $fila[1]?>" readonly>
    </div>

    <div class="form-group">
        <label for="latitud"><strong>Latitud</strong></label>
        <input name="latitud" type="number" class="form-control" step="any" id="latitud" placeholder="Latitud" value="<?php echo $fila[2]?>" readonly>
    </div>
   
    <div class="form-group">
        <label for="Longitud"><strong>Longitud</strong></label>
        <input name="longitud" type="number" step="any" class="form-control" id="Longitud" placeholder="Longitud" value="<?php echo $fila[3]?>" readonly>
    </div>

    <div class="form-group">
        <label for="Url"><strong>Url Google maps</strong></label>
        <input name="text" type="url" class="form-control" id="Url" placeholder="Url" value="<?php echo $fila[4];?>" readonly>
    </div>

    

    <div class="form-group">
        <label for="municipio"><strong>Municipio</strong></label>
        <input  class="form-control" name="municipio" value="<?php echo $filaMunicipio[0]?>" readonly>  
    </div>
     <div class="form-group">
        <label for="codigo"class="control-label"><strong>Codigo Municipio</strong></label>
        <input name="codigo" type="text" class="form-control " id="codigo"  placeholder="codigo" value="<?php echo $fila[12]?>" readonly>  
    </div>
    <div class="form-group">
        <label for="municipio"><strong>Responsable</strong></label>
        <input  class="form-control"  name="responsable" value="<?php echo $filaResponsable[0]?>" readonly >  
    </div>
    
    <div class="form-group">
        <label for="municipio"><strong>Tipo de zona</strong></label>
        <input  class="form-control" name="tipoDeZona" value="<?php echo $filaTipoZona[0]?>" readonly>      
    </div>
    <div class="form-group">
        <label for="estado"><strong>Estado</strong></label>
        <input  class="form-control" name="estado" value="<?php echo $filaEstado[0]?>" readonly>      
    </div>
   
    <div class="form-group">
        <?php
        if(empty($fila[11])){
            echo "<img class='img-responsive imagen-zona' src='../imagenesDeZonas/imagenNoDisponible.png' width='200' heigth='200'>";
        }else{
            echo "<img class='img-responsive imagen-zona' src='../$fila[11]' width='200' heigth='200'>";
        }
        ?>
    </div>
    
    </form>
    
    
    <div class="col-sm-2"></div>
    
    <!--aqui empieza el otro formulario-------------------------------------------------------------------->

    <form class="form-horizontal mt-4 col-sm-4  border rounded pt-2 mb-4"  id="formulario" action="editarZona.php" method="POST" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="Nombre"><strong>Nombre</strong></label>
        <input name="nombre" type="text" class="form-control" id="Nombre" placeholder="nombre de la zona" value="<?php echo $nombre?>">
    </div>

    <?php
        if(isset($_SESSION["mensajeNombreEditar"])){
           echo "
            <div class='form-group'>
             <label for='nombre' class='text-danger'>".$_SESSION["mensajeNombreEditar"]."</label>
            </div>";
            unset($_SESSION["mensajeNombreEditar"]);
        }
    ?>

    <div class="form-group">
        <label for="latitud"><strong>Latitud</strong></label>
        <input name="latitud" type="number" class="form-control" step="any" id="latitud" placeholder="Latitud" value="<?php echo $latitud?>">
    </div>
    <?php
        if(isset($_SESSION["mensajeLatitudEditar"])){
           echo "
            <div class='form-group'>
             <label for='nombre' class='text-danger'>".$_SESSION["mensajeLatitudEditar"]."</label>
            </div>";
            unset($_SESSION["mensajeLatitudEditar"]);
        }
    ?>
    <div class="form-group">
        <label for="Longitud"><strong>Longitud</strong></label>
        <input name="longitud" type="number" step="any" class="form-control" id="Longitud" placeholder="Longitud" value="<?php echo $longitud?>">
    </div>

    <?php
        if(isset($_SESSION["mensajeLongitudEditar"])){
           echo "
            <div class='form-group'>
             <label for='nombre' class='text-danger'>".$_SESSION["mensajeLongitudEditar"]."</label>
            </div>";
            unset($_SESSION["mensajeLongitudEditar"]);
        }
    ?>
    <div class="form-group">
        <label for="Url"><strong>Url Google maps</strong></label>
        <input name="url" type="url" class="form-control" id="Url" placeholder="Url">
    </div>

    <?php
        if(isset($_SESSION["mensajeUrlEditar"])){
           echo "
            <div class='form-group'>
             <label for='nombre' class='text-danger'>".$_SESSION["mensajeUrlEditar"]."</label>
            </div>";
            unset($_SESSION["mensajeUrlEditar"]);
        }
    ?>

    <div class="form-group">
        <label for="municipio"><strong>Municipio</strong></label>
        <select  class="form-control" id="municipios" name="municipio" >
            <option selected disabled>Seleccione municipio</option>
        </select>
    </div>

    <?php
        if(isset($_SESSION["mensajeMunicipioEditar"])){
           echo "
            <div class='form-group'>
             <label for='nombre' class='text-danger'>".$_SESSION["mensajeMunicipioEditar"]."</label>
            </div>";
            unset($_SESSION["mensajeMunicipioEditar"]);
        }
    ?>
       <div class="form-group">
       <label for="codigo"class="control-label"><strong>Código</strong></label>
        <div >
            <input name="codigo" type="text" class="form-control " id="codigo"  placeholder="codigo" value="<?php echo $codigo?>">
        </div>
    </div>
    <?php
        if(isset($_SESSION["mensajeCodigoEditar"])){
           echo "
            <div class='form-group'>
             <label for='mensaje ' class='text-danger control-label'>".$_SESSION["mensajeCodigoEditar"]."</label>
            </div>";
            unset($_SESSION["mensajeCodigoEditar"]);
        }
    ?>

    <div class="form-group">
        <label for="imagenDeZona"><strong>Responsable</strong></label>
        <select  class="form-control" id="responsable" name="responsable" >
            <option selected disabled>Seleccione responsable</option>
        </select>
    </div>
    
    <?php
        if(isset($_SESSION["mensajeResponsableEditar"])){
           echo "
            <div class='form-group'>
             <label for='nombre' class='text-danger'>".$_SESSION["mensajeResponsableEditar"]."</label>
            </div>";
            unset($_SESSION["mensajeResponsableEditar"]);
        }
    ?>

    <div class="form-group">
        <label for="tipoDeZona"><strong>Tipo de zona</strong></label>
        <select  class="form-control" id="tipoDeZona" name="tipoDeZona" >
            <option selected disabled>Seleccione tipo de zona</option>
        </select>
    </div>

    <?php
        if(isset($_SESSION["mensajeTipoDeZonaEditar"])){
           echo "
            <div class='form-group'>
             <label for='nombre' class='text-danger'>".$_SESSION["mensajeTipoDeZonaEditar"]."</label>
            </div>";
            unset($_SESSION["mensajeTipoDeZonaEditar"]);
        }
    ?>
    <div class="form-group">
        <label for="estado"><strong>Estado</strong></label>
        <select  class="form-control" id="estado" name="estado" >
            <option selected disabled>Estado</option>
        </select>
    </div>
    <?php
        if(isset($_SESSION["mensajeEstadoEditar"])){
           echo "
            <div class='form-group'>
             <label for='nombre' class='text-danger'>".$_SESSION["mensajeEstadoEditar"]."</label>
            </div>";
            unset($_SESSION["mensajeEstadoEditar"]);
        }
    ?>
    <div id="estado"></div>

    <div class="form-group mt-4">
        <label for="imagenDeZona"><strong>Imagen de la zona</strong></label>
        <input type="file" class="form-control-file" id="imagenDeZona" name="imagenDeZona">
    </div>
    <?php
        if(isset($_SESSION["mensajeDeImagenEditar"])){
           echo "
            <div class='form-group'>
             <label for='nombre' class='text-danger textoImagen'>".$_SESSION["mensajeDeImagenEditar"]."</label>
            </div>";
            unset($_SESSION["mensajeDeImagenEditar"]);
        }
    ?>
    <?php
        if(isset($_SESSION["mensajeMovidaEditar"])){
           echo "
            <div class='form-group'>
             <label for='nombre' class='text-success textoImagen'>".$_SESSION["mensajeMovidaEditar"]."</label>
            </div>";
            unset($_SESSION["mensajeMovidaEditar"]);
        }
    ?>
    <input id="id_zona" name="id_zona" type="hidden" value="<?php echo $id_zona?>">
    <button type="submit" class="btn btn-primary mb-2 mt-4">Cambiar</button>
    
    </form> 
    </div> 
    <!----------------------------------------------------------------------------------------------------------------->

    </div>  
<?php
include("footer.php");
?>