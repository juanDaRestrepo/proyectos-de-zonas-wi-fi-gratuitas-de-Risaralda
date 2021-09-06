<?php
    session_start();
    

    
    @$id_zona=$_POST["id_zona"];
    @$codigo=$_POST["codigo"];
    @$nombre=$_POST["nombre"];
    //funciones para para primero convertir toda la cadena ingresada en el nombre
    //a minuscula y despues poner todas las inciales del nombre de la zona en mayuscula
    @$nombre=strtolower($nombre);
    @$nombre=ucwords($nombre);
    //funciones para reemplazar comas por puntos para el correcto funcionamiento de la georeferenciación 
    //de la zona
    @$latitud=$_POST["latitud"];
    if(strpos($latitud, ",")){
        str_replace ( "," , "." , $latitud);
    }
    @$longitud=$_POST["longitud"];
    if(strpos($longitud, ",")){
        str_replace ( "," , "." , $longitud);
    }
    @$url=$_POST["url"];
    

    @$municipio=$_POST["municipio"];
    @$responsable=$_POST["responsable"];
    @$tipoDeZona=$_POST["tipoDeZona"];
    @$estado=$_POST["estado"];
    
    @$archivo = $_FILES['imagenDeZona']['name'];
    @$tipo = $_FILES['imagenDeZona']['type'];
    @$tamano = $_FILES['imagenDeZona']['size'];
    @$temp = $_FILES['imagenDeZona']['tmp_name'];


    

    //consulta para comprobar que el codigo de la zona a ingresar no lo tenga otra zona y if anidados para comproba
    //que la toda la informacion con respecto a la zona sea ingresada para poder georeferenciarla correctamente./
   include("../conexion.php");
   include("consultasPhp/consultaCodigoZona.php");
   //consultas para guardar con id los municipios, tipo de zona, responsable y el estado.
                                          
   $consultaMunicipio="SELECT * FROM municipio WHERE nombre_municipio='$municipio'";
   $hacerConsultaMunicipio=mysqli_query($conexion,$consultaMunicipio);
   $filaMunicipio=mysqli_fetch_row($hacerConsultaMunicipio);
 
   //------------------------------------------------------------------------------------
   $consultaResponsable="SELECT * FROM responsables WHERE nombreResponsable='$responsable'";
   $hacerConsultaResponsable=mysqli_query($conexion,$consultaResponsable);
   $filaResponsable=mysqli_fetch_row($hacerConsultaResponsable);
   
   //------------------------------------------------------------------------
   $consultaEstado="SELECT * FROM estadozona WHERE nombreEstado='$estado'";
   $hacerConsultaEstado=mysqli_query($conexion,$consultaEstado);
    $filaEstado=mysqli_fetch_row($hacerConsultaEstado);
    
   //------------------------------------------------------------------------     
   $consultaTipoDeZona="SELECT * FROM tipodesitio WHERE nombreTipoSitio='$tipoDeZona'";
   $hacerConsultaTipoDeZona=mysqli_query($conexion,$consultaTipoDeZona);
   $filaTipoDeZona=mysqli_fetch_row($hacerConsultaTipoDeZona);
    //------------------------------------------------------------------------     
   $consultaInfoZona="SELECT * FROM zonas WHERE id_zona='$id_zona'";
   $hacerConsultaInfoZona=mysqli_query($conexion,$consultaInfoZona);
   $filaInfoZona=mysqli_fetch_row($hacerConsultaInfoZona);
   
   
  //-----------------------------------------------------------------------------------------
    if(!empty($codigo)){
        if($fila=mysqli_fetch_row($hacerConsultaDeCodigoZona)){
            if($fila[0]!=$id_zona){
            $_SESSION["mensajeCodigoEditar"]="No pueden haber dos zonas con el mismo código.";
             header("Location:formularioEditarZona.php?id_zona=$id_zona");
            }
            goto marca;
            echo "aca estoy";
            
        }
        marca:
        if(empty($nombre)){
                $_SESSION["mensajeNombreEditar"]="Ud no ha ingresado ningún nombre";
                header("Location:formularioEditarZona.php?id_zona=$id_zona");
            }elseif(empty($latitud)){
                $_SESSION["mensajeLatitudEditar"]="Ud no ha ingresado la latitud";
                header("Location:formularioEditarZona.php?id_zona=$id_zona");
                }elseif(empty($longitud)){
                    $_SESSION["mensajeLongitudEditar"]="Ud no ha ingresado la longitud";
                    header("Location:formularioEditarZona.php?id_zona=$id_zona");
                    }elseif(empty($url)){
                        $_SESSION["mensajeUrlEditar"]="Ud no ha ingresado la Url";
                        header("Location:formularioEditarZona.php?id_zona=$id_zona");
                        }elseif(empty($municipio)){
                            $_SESSION["mensajeMunicipioEditar"]="Ud no ha seleccionado ningun municipio";
                            header("Location:formularioEditarZona.php?id_zona=$id_zona");
                            }elseif(empty($responsable)){
                                $_SESSION["mensajeResponsableEditar"]="Ud no ha seleccionado ningun responsable";
                                header("Location:formularioEditarZona.php?id_zona=$id_zona");
                                }elseif(empty($tipoDeZona)){
                                    $_SESSION["mensajeTipoDeZonaEditar"]="Ud no ha seleccionado ningun tipo de zona";
                                    header("Location:formularioEditarZona.php?id_zona=$id_zona");
                                    }elseif(empty($estado)){
                                        $_SESSION["mensajeEstadoEditar"]="Ud no ha seleccionado el estado de la zona";
                                        header("Location:formularioEditarZona.php?id_zona=$id_zona");
                                        }elseif(!empty($archivo)){
                                            echo "Se cumplio la condicion archivo cargado<br>";
                                        if (strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png") && ($tamano < 2000000)) {
                                            
                                             
                                            echo "se cumplio la condicion de formato<br>";
                                            $SoloNombre=explode(".", $archivo);
                                            $ruta_indexphp = dirname(realpath(__FILE__));
                                            
                                            $ruta_base_de_datos='imagenesDeZonas/'.$archivo;
                                            
                                            $ruta_nuevo_destino = '../imagenesDeZonas/'.$archivo;
                                            

                                            if( move_uploaded_file ( $temp, $ruta_nuevo_destino ) )
                                            {
                                                echo "se movio la imagen a su carpeta corre<br>";
                                                $url = mysqli_real_escape_string($conexion,$url); 
                                                $ruta_base_de_datos = mysqli_real_escape_string($conexion,$ruta_base_de_datos); 
                                                $insert="UPDATE `zonas` SET `nombre_zona`='$nombre', `latitud`=$latitud, `longitud`=$longitud, `enlaceGoogleMaps`='$url', `id_municipio`=$filaMunicipio[0],  `IdResponsable`=$filaResponsable[0], `IdEstado`=$filaEstado[0], `idTipoSitio`=$filaTipoDeZona[0], `urlImagen`='$ruta_base_de_datos', `codigoZona`='$codigo' WHERE `id_zona`=$id_zona";
                                                $consultaInsert=mysqli_query($conexion,$insert);
                                                
                                                if($consultaInsert==false){
                                                    echo mysqli_error($conexion);
                                                }
                                                $_SESSION["mensajeMovidaEditar"]="se hizo el cambio correctamente";
                                                header("Location:formularioEditarZona.php?id_zona=$id_zona&imagen=$archivo");
                                                
                                            }else{
                                                $_SESSION["mensajeMovidaEditar"]="error al subir la imagen";
                                                header("Location:formularioEditarZona.php?id_zona=$id_zona");
                                            }
                                        }else{
                                           
                                            $_SESSION["mensajeDeImagenEditar"]='Error. La extensión o el tamaño de los archivos no es correcta
                                            - Se permiten archivos .jpeg, .jpg, .png. y de 200 kb como máximo.';
                                            header("Location:formularioEditarZona.php?id_zona=$id_zona");

                                             
                                        }
                                    
                                        }else{
                                            echo "se entro al if a este";
                                                $url = mysqli_real_escape_string($conexion,$url); 
                                                
                                                $insert="UPDATE `zonas` SET `nombre_zona`='$nombre',`latitud`=$latitud,`longitud`=$longitud,`enlaceGoogleMaps`='$url',`id_municipio`=$filaMunicipio[0],`IdResponsable`=$filaResponsable[0],`IdEstado`=$filaEstado[0],`idTipoSitio`=$filaTipoDeZona[0],`codigoZona`='$codigo' WHERE `id_zona`=$id_zona";
                                                $consultaInsert=mysqli_query($conexion,$insert);
                                                
                                                
                                                if($consultaInsert==false){
                                                    echo mysqli_error($conexion);
                                                }
                                                $_SESSION["mensajeMovidaEditar"]="Datos ingresados correctamente";
                                                header("Location:formularioEditarZona.php?id_zona=$id_zona");
                                        }
                                    
                                        
                    
    }elseif(empty($nombre)){
        echo"se entro al if";
        $_SESSION["mensajeNombreEditar"]="Ud no ha ingresado ningún nombre";
        header("Location:formularioEditarZona.php?id_zona=$id_zona");
    }elseif(empty($latitud)){
        $_SESSION["mensajeLatitudEditar"]="Ud no ha ingresado la latitud";
        header("Location:formularioEditarZona.php?id_zona=$id_zona");
        }elseif(empty($longitud)){
            $_SESSION["mensajeLongitudEditar"]="Ud no ha ingresado la longitud";
            header("Location:formularioEditarZona.php?id_zona=$id_zona");
            }elseif(empty($url)){
                $_SESSION["mensajeUrlEditar"]="Ud no ha ingresado la Url";
                header("Location:formularioEditarZona.php?id_zona=$id_zona");
                }elseif(empty($url)){
                    $_SESSION["mensajeUrlEditar"]="Ud no ha ingresado la Url";
                    header("Location:formularioEditarZona.php?id_zona=$id_zona");
                    }elseif(empty($municipio)){
                        $_SESSION["mensajeMunicipioEditar"]="Ud no ha seleccionado ningun municipio";
                        header("Location:formularioEditarZona.php?id_zona=$id_zona");
                        }elseif(empty($responsable)){
                            $_SESSION["mensajeResponsableEditar"]="Ud no ha seleccionado a ningun responsable";
                            header("Location:formularioEditarZona.php?id_zona=$id_zona");
                            }elseif(empty($tipoDeZona)){
                                $_SESSION["mensajeTipoDeZonaEditar"]="Ud no ha seleccionado ningun tipo de zona";
                                header("Location:formularioEditarZona.php?id_zona=$id_zona");
                                }elseif(empty($estado)){
                                    $_SESSION["mensajeEstadoEditar"]="Ud no ha seleccionado el estado de la zona";
                                    header("Location:formularioEditarZona.php?id_zona=$id_zona");
                                    }elseif(!empty($archivo)){
                                        if (strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png") && ($tamano < 2000000)) {
                                            
                                            
                                            
                                            echo "se cumplio la condicion de formato<br>";
                                            $SoloNombre=explode(".", $archivo);
                                            $ruta_indexphp = dirname(realpath(__FILE__));
                                            
                                            $ruta_base_de_datos='imagenesDeZonas/'.$archivo;
                                            
                                            $ruta_nuevo_destino = '../imagenesDeZonas/'.$archivo;
                                            

                                            if( move_uploaded_file ( $temp, $ruta_nuevo_destino ) )
                                            {
                                                echo "se movio la imagen a su carpeta corre<br>";
                                                $url = mysqli_real_escape_string($conexion,$url); 
                                                $ruta_base_de_datos = mysqli_real_escape_string($conexion,$ruta_base_de_datos); 
                                                $insert="UPDATE `zonas` SET `nombre_zona`='$nombre', `latitud`=$latitud, `longitud`=$longitud, `enlaceGoogleMaps`='$url', `id_municipio`=$filaMunicipio[0],  `IdResponsable`=$filaResponsable[0], `IdEstado`=$filaEstado[0], `idTipoSitio`=$filaTipoDeZona[0], `urlImagen`='$ruta_base_de_datos', `codigoZona`='$codigo' WHERE `id_zona`=$id_zona";
                                                $consultaInsert=mysqli_query($conexion,$insert);
                                                
                                                if($consultaInsert==false){
                                                    echo mysqli_error($conexion);
                                                }
                                                $_SESSION["mensajeMovidaEditar"]="Se hizo el cambio correctamente";
                                                header("Location:formularioEditarZona.php?id_zona=$id_zona&imagen=$archivo");
                                                
                                            }else{
                                                $_SESSION["mensajeMovidaEditar"]="error al subir la imagen";
                                                header("Location:formularioEditarZona.php?id_zona=$id_zona");
                                            }
                                        }else{
                                           
                                            $_SESSION["mensajeDeImagenEditar"]='Error. La extensión o el tamaño de los archivos no es correcta
                                            - Se permiten archivos .jpeg, .jpg, .png. y de 200 kb como máximo.';
                                            header("Location:formularioEditarZona.php?id_zona=$id_zona");

                                             
                                        }
                                    
                                        }else{
                                            echo "se entro al if a este";
                                                $url = mysqli_real_escape_string($conexion,$url); 
                                               
                                                $insert="UPDATE `zonas` SET `nombre_zona`='$nombre',`latitud`=$latitud,`longitud`=$longitud,`enlaceGoogleMaps`='$url',`id_municipio`=$filaMunicipio[0],`IdResponsable`=$filaResponsable[0],`IdEstado`=$filaEstado[0],`idTipoSitio`=$filaTipoDeZona[0],`codigoZona`='$codigo' WHERE `id_zona`=$id_zona";
                                                $consultaInsert=mysqli_query($conexion,$insert);
                                                
                                                
                                                if($consultaInsert==false){
                                                    echo mysqli_error($conexion);
                                                }
                                                $_SESSION["mensajeMovidaEditar"]="Datos ingresados correctamente";
                                                header("Location:formularioEditarZona.php?id_zona=$id_zona");
                                        }
                                    
            
        
   
    
?>			