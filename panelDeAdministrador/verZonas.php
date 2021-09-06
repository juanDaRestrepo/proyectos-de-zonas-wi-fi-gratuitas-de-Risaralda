<?php

include("header.php");
include("consultasParaDatatable/consultaZona.php");

?>


<div class="mt-4">
<table id="table_id" class="display">
    <thead>
        <tr>
            
            <th>Nombre</th>
             <th>Fecha de registro</th>
            <th>Latitud</th>
            <th>Longitud</th>
            
            <th>Municipio</th>
            <th>Codigo municipio</th>
            <th>Responsable</th>
            <th>Estado</th>
            <th>Tipo de lugar</th>
            <th>Foto de la zona</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
       <?php
            while($fila=mysqli_fetch_row($matrizZonas)){
                  //consultas para nombre de municipio,responsable,estado y tipo de cada zona
                  $consultaMunicipio="SELECT * FROM municipio WHERE id_municipio='$fila[6]'";
                  $hacerConsultaMunicipio=mysqli_query($conexion,$consultaMunicipio);
                  $filaMunicipio=mysqli_fetch_row($hacerConsultaMunicipio);
                  //--------------------------------------------------------------------------
                  $consultaResponsable="SELECT * FROM responsables WHERE IdResponsable='$fila[7]'";
                  $hacerConsultaResponsable=mysqli_query($conexion,$consultaResponsable);
                  $filaResponsable=mysqli_fetch_row($hacerConsultaResponsable);
                  //-----------------------------------------------------------------------------
                  $consultaEstado="SELECT * FROM estadozona WHERE IdEstado='$fila[8]'";
                  $hacerConsultaEstado=mysqli_query($conexion,$consultaEstado);
                   $filaEstado=mysqli_fetch_row($hacerConsultaEstado);
                 //-----------------------------------------------------------------------------
                   $consultaTipoDeZona="SELECT * FROM tipodesitio WHERE idTipoSitio='$fila[9]'";
                   $hacerConsultaTipoDeZona=mysqli_query($conexion,$consultaTipoDeZona);
                   $filaTipoDeZona=mysqli_fetch_row($hacerConsultaTipoDeZona);
            echo "<tr>
                    
                    <th>$fila[1]</th>
                    <th>$fila[13]</th>
                    <th>$fila[2]</th>
                    <th>$fila[3]</th>
                    
                    <th>$filaMunicipio[1]</th>
                   <th>$fila[12]</th>
                    <th>$filaResponsable[1]</th>
                    <th>$filaEstado[1]</th>
                    <th>$filaTipoDeZona[1]</th>";
            if(empty($fila[11])){
                  echo"<th><img src='../imagenesDeZonas/imagenNoDisponible.png' width='120' heigth='120'></th>";
                }else{
                    echo "<th><img src='../$fila[11]' width='120' heigth='120'></th>";
                }
                echo"
                    <th><a href='formularioEditarZona.php?id_zona=$fila[0]&codigo=$fila[12]&nombre=$fila[1]&latitud=$fila[2]&longitud=$fila[3]&municipio=$filaMunicipio[1]&responsable=$filaResponsable[1]&estado=$filaEstado[1]&tipoDeZona=$filaTipoDeZona[1]&url=$fila[4]&imagen=$fila[11]'>
                    <img src='../imagenesDeZonas/editar.png' width='30' heigth='30'></a></th>
                    <th><img src='../imagenesDeZonas/eliminar.png' class='cursor-pointer' width='30' heigth='30' onclick='eliminarZona($fila[0])'></th>
                </tr>";

            }
            
       ?>
    </tbody>
</table>
</div>
<?php
include("footer.php");
?>
<script>
    function eliminarZona(id){
          if(window.confirm("Esta seguro que desea borrar este registro?")){
           window.location.href="eliminarZona.php?id_zona="+id;
          }
      }
</script>
	