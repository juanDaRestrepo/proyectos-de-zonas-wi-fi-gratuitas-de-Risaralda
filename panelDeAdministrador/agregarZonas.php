<?php

include("header.php");
    @$codigo=$_GET["codigo"];
    @$nombre=$_GET["nombre"];
    @$latitud=$_GET["latitud"];
    @$longitud=$_GET["longitud"];
    @$url=$_GET["url"];
    @$municipio=$_GET["municipio"];
    @$responsable=$_GET["responsable"];
    @$tipoDeZona=$_GET["tipoDeZona"];
    @$estado=$_GET["estado"];
    
?>
    
     <div class="row"> 
        <div class="col-sm-4"></div>

    <form class="form-horizontal mt-4 col-sm-4 border rounded pt-2"  id="formulario" action="inserts/insertZona.php" method="POST" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="Nombre"><strong>Nombre</strong></label>
        <input name="nombre" type="text" class="form-control" id="Nombre" placeholder="nombre de la zona" value="<?php echo $nombre?>">
    </div>

    <?php
        if(isset($_SESSION["mensajeNombre"])){
           echo "
            <div class='form-group'>
             <label for='nombre' class='text-danger'>".$_SESSION["mensajeNombre"]."</label>
            </div>";
            unset($_SESSION["mensajeNombre"]);
        }
    ?>

    <div class="form-group">
        <label for="latitud"><strong>Latitud</strong></label>
        <input name="latitud" type="number" class="form-control" step="any" id="latitud" placeholder="Latitud" value="<?php echo $latitud?>">
    </div>
    <?php
        if(isset($_SESSION["mensajeLatitud"])){
           echo "
            <div class='form-group'>
             <label for='nombre' class='text-danger'>".$_SESSION["mensajeLatitud"]."</label>
            </div>";
            unset($_SESSION["mensajeLatitud"]);
        }
    ?>
    <div class="form-group">
        <label for="Longitud"><strong>Longitud</strong></label>
        <input name="longitud" type="number" step="any" class="form-control" id="Longitud" placeholder="Longitud" value="<?php echo $longitud?>">
    </div>

    <?php
        if(isset($_SESSION["mensajeLongitud"])){
           echo "
            <div class='form-group'>
             <label for='nombre' class='text-danger'>".$_SESSION["mensajeLongitud"]."</label>
            </div>";
            unset($_SESSION["mensajeLongitud"]);
        }
    ?>
    <div class="form-group">
        <label for="Url"><strong>Url Google maps</strong></label>
        <input name="url" type="url" class="form-control" id="Url" placeholder="Url" >
    </div>

    <?php
        if(isset($_SESSION["mensajeUrl"])){
           echo "
            <div class='form-group'>
             <label for='nombre' class='text-danger'>".$_SESSION["mensajeUrl"]."</label>
            </div>";
            unset($_SESSION["mensajeUrl"]);
        }
    ?>

    <div class="form-group">
        <label for="municipio"><strong>Municipio</strong></label>
        <select  class="form-control" id="municipios" name="municipio" >
            <option selected disabled>Seleccione municipio</option>
        </select>
    </div>

    <?php
        if(isset($_SESSION["mensajeMunicipio"])){
           echo "
            <div class='form-group'>
             <label for='nombre' class='text-danger'>".$_SESSION["mensajeMunicipio"]."</label>
            </div>";
            unset($_SESSION["mensajeMunicipio"]);
        }
    ?>
    
      <div class="form-group">
      <label for="codigo"class="control-label"><strong>Codigo Municipio</strong></label>
        <div >
            <input name="codigo" type="text" class="form-control " id="codigo"  placeholder="codigo" value=<?php echo $codigo?>>
        </div>
    </div>
    <?php
        if(isset($_SESSION["mensajeCodigo"])){
           echo "
            <div class='form-group'>
             <label for='mensaje ' class='text-danger control-label'>".$_SESSION["mensajeCodigo"]."</label>
            </div>";
            unset($_SESSION["mensajeCodigo"]);
        }
    ?>

    <div class="form-group">
        <label for="imagenDeZona"><strong>Responsable</strong></label>
        <select  class="form-control" id="responsable" name="responsable" >
            <option selected disabled>Seleccione responsable</option>
        </select>
    </div>
    
    <?php
        if(isset($_SESSION["mensajeResponsable"])){
           echo "
            <div class='form-group'>
             <label for='nombre' class='text-danger'>".$_SESSION["mensajeResponsable"]."</label>
            </div>";
            unset($_SESSION["mensajeResponsable"]);
        }
    ?>
   
    <div class="form-group">
        <label for="tipoDeZona"><strong>Tipo de zona</strong></label>
        <select  class="form-control" id="tipoDeZona" name="tipoDeZona" >
            <option selected disabled>Seleccione tipo de zona</option>
        </select>
    </div>

    <?php
        if(isset($_SESSION["mensajeTipoDeZona"])){
           echo "
            <div class='form-group'>
             <label for='nombre' class='text-danger'>".$_SESSION["mensajeTipoDeZona"]."</label>
            </div>";
            unset($_SESSION["mensajeTipoDeZona"]);
        }
    ?>
    <div class="form-group">
        <label for="estado"><strong>Estado</strong></label>
        <select  class="form-control" id="estado" name="estado" >
            <option selected disabled>Estado</option>
        </select>
        <span class="help-block" >(Las zonas inactivas no se mostraran en la app)</span>
    </div>
    <?php
        if(isset($_SESSION["mensajeEstado"])){
           echo "
            <div class='form-group'>
             <label for='nombre' class='text-danger'>".$_SESSION["mensajeEstado"]."</label>
            </div>";
            unset($_SESSION["mensajeEstado"]);
        }
    ?>
    <div id="estado"></div>

    <div class="form-group">
     <label for="imagenDeZona"><strong>Imagen de la zona</strong></label>
        <input type="file" class="form-control-file" id="imagenDeZona" name="imagenDeZona">
    </div>
    <?php
        if(isset($_SESSION["mensajeDeImagen"])){
           echo "
            <div class='form-group'>
             <label for='nombre' class='text-danger textoImagen'>".$_SESSION["mensajeDeImagen"]."</label>
            </div>";
            unset($_SESSION["mensajeDeImagen"]);
        }
    ?>
    <?php
        if(isset($_SESSION["mensajeMovida"])){
           echo "
            <div class='form-group'>
             <label for='nombre' class='text-success textoImagen'>".$_SESSION["mensajeMovida"]."</label>
            </div>";
            unset($_SESSION["mensajeMovida"]);
        }
    ?>
    <?php
        if(isset($_SESSION["mensajeZonasIguales"])){
           echo "
            <div class='form-group'>
             <label for='nombre' class='text-danger textoImagen'>".$_SESSION["mensajeZonasIguales"]."</label>
            </div>";
            unset($_SESSION["mensajeZonasIguales"]);
        }
    ?>
    <button type="submit" class="btn btn-primary mb-2">Guardar</button>
    
    </form> 
    </div>  
<?php
include("footer.php");
?>