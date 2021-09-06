<?php
    session_start();
    

    

    @$codigo=$_POST["codigo"];
    @$nombre=$_POST["nombre"];
    @$nombre=strtolower($nombre);
    @$nombre=ucwords($nombre);
    @$latitud=$_POST["latitud"];
    if(strpos($latitud, ",")){
        str_replace ( "," , "." , $latitud);
    }
    @$latitud=floatval($latitud);
    @$longitud=$_POST["longitud"];
    if(strpos($longitud, ",")){
        str_replace ( "," , "." , $longitud);
    }
@$longitud=floatval($longitud);
    @$url=$_POST["url"];
    @$municipio=$_POST["municipio"];
    @$responsable=$_POST["responsable"];
    @$tipoDeZona=$_POST["tipoDeZona"];
    @$estado=$_POST["estado"];
    
    @$archivo = $_FILES['imagenDeZona']['name'];
    @$tipo = $_FILES['imagenDeZona']['type'];
    @$tamano = $_FILES['imagenDeZona']['size'];
    @$temp = $_FILES['imagenDeZona']['tmp_name'];
    
    
     $date = date("Y-m-d");
   
     include("../../conexion.php");
    //consulta para verificar que no se guarden dos zonas iguales.
    $queryZonasIguales="SELECT * FROM zonas WHERE latitud='$latitud' AND longitud='$longitud' AND estadoMostrar=1";
    $hacerQueryZonasIguales=mysqli_query($conexion,$queryZonasIguales);
    $filaZonasIguales=mysqli_fetch_row($hacerQueryZonasIguales);
    
     //consultas para guardar con id los municipios, tipo de zona, responsable y el estado.
     $consultaMunicipio="SELECT * FROM municipio WHERE nombre_municipio='$municipio'";
     $hacerConsultaMunicipio=mysqli_query($conexion,$consultaMunicipio);
     $filaMunicipio=mysqli_fetch_row($hacerConsultaMunicipio);
     echo $filaMunicipio[0]."municipio<br>";
     //------------------------------------------------------------------------------------
     $consultaResponsable="SELECT * FROM responsables WHERE nombreResponsable='$responsable'";
     $hacerConsultaResponsable=mysqli_query($conexion,$consultaResponsable);
     $filaResponsable=mysqli_fetch_row($hacerConsultaResponsable);
     echo $filaResponsable[0]."resposnable <br>";
     //------------------------------------------------------------------------
     $consultaEstado="SELECT * FROM estadozona WHERE nombreEstado='$estado'";
     $hacerConsultaEstado=mysqli_query($conexion,$consultaEstado);
      $filaEstado=mysqli_fetch_row($hacerConsultaEstado);
      echo $filaEstado[0]."estado <br>";
     //------------------------------------------------------------------------     
     $consultaTipoDeZona="SELECT * FROM tipodesitio WHERE nombreTipoSitio='$tipoDeZona'";
     $hacerConsultaTipoDeZona=mysqli_query($conexion,$consultaTipoDeZona);
     $filaTipoDeZona=mysqli_fetch_row($hacerConsultaTipoDeZona);
     echo $filaTipoDeZona[0]."tipo de zona<br>";
    //----------------------------------------------------------------------------------------- 
    //Esta linea es para que en el insert de la url no tenga ningun problema con caracteres especiales
    $url = mysqli_real_escape_string($conexion,$url); 
    //consulta para comprobar que el codigo de la zona a ingresar no lo tenga otra zona y if anidados para comproba
    //que la toda la informacion con respecto a la zona sea ingresada para poder georeferenciarla correctamente./
   include("../consultasPhp/consultaCodigoZona.php");
    if(!empty($codigo)){
       if(empty($nombre)){
                $_SESSION["mensajeNombre"]="Ud no ha ingresado ningún nombre";
                header("Location:../agregarZonas.php?codigo=$codigo&nombre=$nombre&latitud=$latitud&longitud=$longitud&url=$url&municipio=$municipio&responsable=$responsable&tipoDeZona=$tipoDeZona&estado=$estado");
            }elseif(empty($latitud)){
                $_SESSION["mensajeLatitud"]="Ud no ha ingresado la latitud";
                header("Location:../agregarZonas.php?codigo=$codigo&nombre=$nombre&latitud=$latitud&longitud=$longitud&url=$url&municipio=$municipio&responsable=$responsable&tipoDeZona=$tipoDeZona&estado=$estado");
                }elseif(empty($longitud)){
                    $_SESSION["mensajeLongitud"]="Ud no ha ingresado la longitud";
                    header("Location:../agregarZonas.php?codigo=$codigo&nombre=$nombre&latitud=$latitud&longitud=$longitud&url=$url&municipio=$municipio&responsable=$responsable&tipoDeZona=$tipoDeZona&estado=$estado");
                    }elseif(empty($url)){
                        $_SESSION["mensajeUrl"]="Ud no ha ingresado la Url";
                        header("Location:../agregarZonas.php?codigo=$codigo&nombre=$nombre&latitud=$latitud&longitud=$longitud&url=$url&municipio=$municipio&responsable=$responsable&tipoDeZona=$tipoDeZona&estado=$estado");
                        }elseif(empty($municipio)){
                            $_SESSION["mensajeMunicipio"]="Ud no ha seleccionado ningun municipio";
                            header("Location:../agregarZonas.php?codigo=$codigo&nombre=$nombre&latitud=$latitud&longitud=$longitud&url=$url&municipio=$municipio&responsable=$responsable&tipoDeZona=$tipoDeZona&estado=$estado");
                            }elseif(empty($responsable)){
                                $_SESSION["mensajeResponsable"]="Ud no ha seleccionado ningun responsable";
                                header("Location:../agregarZonas.php?codigo=$codigo&nombre=$nombre&latitud=$latitud&longitud=$longitud&url=$url&municipio=$municipio&responsable=$responsable&tipoDeZona=$tipoDeZona&estado=$estado");
                                }elseif(empty($tipoDeZona)){
                                    $_SESSION["mensajeTipoDeZona"]="Ud no ha seleccionado ningun tipo de zona";
                                    header("Location:../agregarZonas.php?codigo=$codigo&nombre=$nombre&latitud=$latitud&longitud=$longitud&url=$url&municipio=$municipio&responsable=$responsable&tipoDeZona=$tipoDeZona&estado=$estado");
                                    }elseif(empty($estado)){
                                        $_SESSION["mensajeEstado"]="Ud no ha seleccionado el estado de la zona";
                                        header("Location:../agregarZonas.php?codigo=$codigo&nombre=$nombre&latitud=$latitud&longitud=$longitud&url=$url&municipio=$municipio&responsable=$responsable&tipoDeZona=$tipoDeZona&estado=$estado");
                                        }elseif(!empty($filaZonasIguales)){
                                            $_SESSION["mensajeZonasIguales"]="La zona que esta intentando crear ya esta creada";
                                            header("Location:../agregarZonas.php?codigo=$codigo&nombre=$nombre&latitud=$latitud&longitud=$longitud&url=$url&municipio=$municipio&responsable=$responsable&tipoDeZona=$tipoDeZona&estado=$estado");
                                        }
                                        elseif(!empty($archivo)){

                                        if (strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png") && ($tamano < 2000000)) {
                                            
                                            
                                            $SoloNombre=explode(".", $archivo);
                                            $ruta_indexphp = dirname(realpath(__FILE__));
                                            $ruta_nuevo_destino = '../../imagenesDeZonas/' .$archivo;
                                            $ruta_base_de_datos='imagenesDeZonas/'.$archivo;
                                            if( move_uploaded_file ( $temp, $ruta_nuevo_destino ) )
                                            {
                                                echo "se entro al if";
                                                $insert="INSERT INTO `zonas`( `nombre_zona`, `latitud`, `longitud`, `enlaceGoogleMaps`, `tipoDeEnlace`, `id_municipio`, `IdResponsable`, `IdEstado`, `idTipoSitio`, `estadoMostrar`, `urlImagen`, `codigoZona`,`fechaDeRegistro`) 
                                                VALUES ('$nombre',$latitud,$longitud,'$url',' ',$filaMunicipio[0],$filaResponsable[0],$filaEstado[0],$filaTipoDeZona[0],1,'$ruta_base_de_datos','$codigo','$date')";
                                                $consultaInsert=mysqli_query($conexion,$insert);
                                                if($consultaInsert==false){
                                                    echo mysqli_error($conexion);
                                                }
                                                $_SESSION["mensajeMovida"]="Datos ingresados correctamente";
                                                header("Location:../agregarZonas.php?codigo=$codigo&nombre=$nombre&latitud=$latitud&longitud=$longitud&url=$url&municipio=$municipio&responsable=$responsable&tipoDeZona=$tipoDeZona&estado=$estado");
                                                
                                            }else{
                                                 echo "Not uploaded because of error #".$_FILES["file"]["error"];
                                                $_SESSION["mensajeMovida"]="error al subir la imagen";
                                                //header("Location:../agregarZonas.php?codigo=$codigo&nombre=$nombre&latitud=$latitud&longitud=$longitud&url=$url&municipio=$municipio&responsable=$responsable&tipoDeZona=$tipoDeZona&estado=$estado");
                                            }
                                        }else{
                                           
                                            $_SESSION["mensajeDeImagen"]='Error. La extensión o el tamaño de los archivos no es correcta
                                            - Se permiten archivos .jpeg, .jpg, .png. y de 200 kb como máximo.';
                                            header("Location:../agregarZonas.php?codigo=$codigo&nombre=$nombre&latitud=$latitud&longitud=$longitud&url=$url&municipio=$municipio&responsable=$responsable&tipoDeZona=$tipoDeZona&estado=$estado");

                                             
                                        }
                                        }else{
                                            $insert="INSERT INTO `zonas`( `nombre_zona`, `latitud`, `longitud`, `enlaceGoogleMaps`, `tipoDeEnlace`, `id_municipio`, `IdResponsable`, `IdEstado`, `idTipoSitio`, `estadoMostrar`, `urlImagen`,`codigoZona`,`fechaDeRegistro`) 
                                                    VALUES ('$nombre',$latitud,$longitud,'$url',' ',$filaMunicipio[0],$filaResponsable[0],$filaEstado[0],$filaTipoDeZona[0],1,'','$codigo','$date')";
                                                    $consultaInsert=mysqli_query($conexion,$insert);
                                                    if($consultaInsert==false){
                                                        echo mysqli_error($conexion);
                                                    }
                                                    $_SESSION["mensajeMovida"]="Datos ingresados correctamente";
                                                    header("Location:../agregarZonas.php?codigo=$codigo&nombre=$nombre&latitud=$latitud&longitud=$longitud&url=$url&municipio=$municipio&responsable=$responsable&tipoDeZona=$tipoDeZona&estado=$estado");
                                        
}
                                        
                    
    }elseif(empty($nombre)){
        echo"se entro al if";
        $_SESSION["mensajeNombre"]="Ud no ha ingresado ningún nombre";
        header("Location:../agregarZonas.php?codigo=$codigo&nombre=$nombre&latitud=$latitud&longitud=$longitud&url=$url&municipio=$municipio&responsable=$responsable&tipoDeZona=$tipoDeZona&estado=$estado");
    }elseif(empty($latitud)){
        $_SESSION["mensajeLatitud"]="Ud no ha ingresado la latitud";
        header("Location:../agregarZonas.php?codigo=$codigo&nombre=$nombre&latitud=$latitud&longitud=$longitud&url=$url&municipio=$municipio&responsable=$responsable&tipoDeZona=$tipoDeZona&estado=$estado");
        }elseif(empty($longitud)){
            $_SESSION["mensajeLongitud"]="Ud no ha ingresado la longitud";
            header("Location:../agregarZonas.php?codigo=$codigo&nombre=$nombre&latitud=$latitud&longitud=$longitud&url=$url&municipio=$municipio&responsable=$responsable&tipoDeZona=$tipoDeZona&estado=$estado");
            }elseif(empty($url)){
                $_SESSION["mensajeUrl"]="Ud no ha ingresado la Url";
                header("Location:../agregarZonas.php?codigo=$codigo&nombre=$nombre&latitud=$latitud&longitud=$longitud&url=$url&municipio=$municipio&responsable=$responsable&tipoDeZona=$tipoDeZona&estado=$estado");
                }elseif(empty($url)){
                    $_SESSION["mensajeUrl"]="Ud no ha ingresado la Url";
                    header("Location:../agregarZonas.php?codigo=$codigo&nombre=$nombre&latitud=$latitud&longitud=$longitud&url=$url&municipio=$municipio&responsable=$responsable&tipoDeZona=$tipoDeZona&estado=$estado");
                    }elseif(empty($municipio)){
                        $_SESSION["mensajeMunicipio"]="Ud no ha seleccionado ningun municipio";
                        header("Location:../agregarZonas.php?codigo=$codigo&nombre=$nombre&latitud=$latitud&longitud=$longitud&url=$url&municipio=$municipio&responsable=$responsable&tipoDeZona=$tipoDeZona&estado=$estado");
                        }elseif(empty($responsable)){
                            $_SESSION["mensajeResponsable"]="Ud no ha seleccionado a ningun responsable";
                            header("Location:../agregarZonas.php?codigo=$codigo&nombre=$nombre&latitud=$latitud&longitud=$longitud&url=$url&municipio=$municipio&responsable=$responsable&tipoDeZona=$tipoDeZona&estado=$estado");
                            }elseif(empty($tipoDeZona)){
                                $_SESSION["mensajeTipoDeZona"]="Ud no ha seleccionado ningun tipo de zona";
                                header("Location:../agregarZonas.php?codigo=$codigo&nombre=$nombre&latitud=$latitud&longitud=$longitud&url=$url&municipio=$municipio&responsable=$responsable&tipoDeZona=$tipoDeZona&estado=$estado");
                                }elseif(empty($estado)){
                                    $_SESSION["mensajeEstado"]="Ud no ha seleccionado el estado de la zona";
                                    header("Location:../agregarZonas.php?codigo=$codigo&nombre=$nombre&latitud=$latitud&longitud=$longitud&url=$url&municipio=$municipio&responsable=$responsable&tipoDeZona=$tipoDeZona&estado=$estado");
                                    }elseif(!empty($filaZonasIguales)){
                                        $_SESSION["mensajeZonasIguales"]="La zona que esta intentando crear ya esta creada";
                                        header("Location:../agregarZonas.php?codigo=$codigo&nombre=$nombre&latitud=$latitud&longitud=$longitud&url=$url&municipio=$municipio&responsable=$responsable&tipoDeZona=$tipoDeZona&estado=$estado");
                                    }
                                    elseif(!empty($archivo)){
                                        if (strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png") && ($tamano < 2000000)) {
                                            
                                           
                                            $SoloNombre=explode(".", $archivo);
                                            $ruta_indexphp = dirname(realpath(__FILE__));
                                            $ruta_nuevo_destino = '../../imagenesDeZonas/' .$archivo;
                                            $ruta_base_de_datos='imagenesDeZonas/'.$archivo;
                                            if( move_uploaded_file ( $temp, $ruta_nuevo_destino ) )
                                            {
                                                echo "se entro al if";
                                                $insert="INSERT INTO `zonas`( `nombre_zona`, `latitud`, `longitud`, `enlaceGoogleMaps`, `tipoDeEnlace`, `id_municipio`, `IdResponsable`, `IdEstado`, `idTipoSitio`, `estadoMostrar`, `urlImagen`, `codigoZona`,`fechaDeRegistro`) 
                                                VALUES ('$nombre',$latitud,$longitud,'$url',' ',$filaMunicipio[0],$filaResponsable[0],$filaEstado[0],$filaTipoDeZona[0],1,'$ruta_base_de_datos','$codigo','$date')";
                                                $consultaInsert=mysqli_query($conexion,$insert);
                                                if($consultaInsert==false){
                                                    echo mysqli_error($conexion);
                                                }
                                                $_SESSION["mensajeMovida"]="Datos ingresados correctamente";
                                                header("Location:../agregarZonas.php?codigo=$codigo&nombre=$nombre&latitud=$latitud&longitud=$longitud&url=$url&municipio=$municipio&responsable=$responsable&tipoDeZona=$tipoDeZona&estado=$estado");
                                                
                                            }else{
                                                  echo "Not uploaded because of error #".$_FILES["file"]["error"];
                                                $_SESSION["mensajeMovida"]="error al subir la imagen";
                                                header("Location:../agregarZonas.php?codigo=$codigo&nombre=$nombre&latitud=$latitud&longitud=$longitud&url=$url&municipio=$municipio&responsable=$responsable&tipoDeZona=$tipoDeZona&estado=$estado");
                                            }
                                        }else{
                                           
                                            $_SESSION["mensajeDeImagen"]='Error. La extensión o el tamaño de los archivos no es correcta
                                            - Se permiten archivos .jpeg, .jpg, .png. y de 200 kb como máximo.';
                                            header("Location:../agregarZonas.php?codigo=$codigo&nombre=$nombre&latitud=$latitud&longitud=$longitud&url=$url&municipio=$municipio&responsable=$responsable&tipoDeZona=$tipoDeZona&estado=$estado");

                                             
                                        }
                                    }else{
                                        $insert="INSERT INTO `zonas`( `nombre_zona`, `latitud`, `longitud`, `enlaceGoogleMaps`, `tipoDeEnlace`, `id_municipio`, `IdResponsable`, `IdEstado`, `idTipoSitio`, `estadoMostrar`,`urlImagen`, `codigoZona`,`fechaDeRegistro`) 
                                                VALUES ('$nombre',$latitud,$longitud,'$url',' ',$filaMunicipio[0],$filaResponsable[0],$filaEstado[0],$filaTipoDeZona[0],1,'','$codigo','$date')";
                                                $consultaInsert=mysqli_query($conexion,$insert);
                                                if($consultaInsert==false){
                                                    echo mysqli_error($conexion);
                                                }
                                                $_SESSION["mensajeMovida"]="Datos ingresados correctamente";
                                                header("Location:../agregarZonas.php?codigo=$codigo&nombre=$nombre&latitud=$latitud&longitud=$longitud&url=$url&municipio=$municipio&responsable=$responsable&tipoDeZona=$tipoDeZona&estado=$estado");
                                    }
            
        
    
    
?>			