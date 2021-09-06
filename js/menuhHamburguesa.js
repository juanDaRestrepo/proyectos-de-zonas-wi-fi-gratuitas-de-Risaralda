$(document).ready(function() {

  
  console.log("estoy aqui");
   
    $(".iconoMenuMostrar").on( "click", function(){
       console.log("haz dado click en mostrar");
        let menu=$(".dropdownMenu");
        menu.show("slow");
        

        window.scrollTo( 0, 0 );
       $(".iconoMenuMostrar").hide();
       $(".iconoMenuOcultar").show();
      });


    $(".iconoMenuOcultar").on( "click", function() {
        let menu=$(".dropdownMenu");
        menu.hide("slow");
        $(this).hide();
        window.scrollTo( 0, 0 );
        $(".iconoMenuMostrar").show();
        
    });
    
    $.ajax({        
      url: "panelDeAdministrador/consultasPhp/consultaMunicipios.php",
      
      
      success:function(stringMunicipios) {   
          let objetoMunicipios= JSON.parse(stringMunicipios);
          let divMunicipios=$("#select-municipios");
          

          for(i=0;i<objetoMunicipios.length;i++){
            
              divMunicipios.append(`<option value='${objetoMunicipios[i]}' class='option'>${objetoMunicipios[i]}</option>`);
          }

          
      }          
    });

    
  // función para generar select de las zonas segun municipio y generar mapa especifico de municipio
    
    $("#select-municipios").on('change',function(){
      $("#select-zona").empty();
      $("#select-zona").append('<option selected disabled>Seleccione zona</option>');
      var nombre_municipio=$("#select-municipios").val();
      $.ajax({        
        url: "consultaNombreZonas.php",
        method:'POST',
        data: { nombre_m: nombre_municipio },
        
        success:function(stringZonas) {   
            let objetoZonas= JSON.parse(stringZonas);
            let divZonas=$("#select-zona");
            console.log("Esto es lo que esta llegando:"+objetoZonas);
  
            for(i=0;i<objetoZonas.length;i++){
               
                divZonas.append(`<option value='${objetoZonas[i]}' class='option'>${objetoZonas[i]}</option>`);
            }
        }          
      });

      $.ajax({        
        url: "consultaIdMunicipio.php",
        method:'POST',
        data: { nombre_m: nombre_municipio },
        
        success:function(idMunicipio) {  
          
          
            let objetoId= JSON.parse(idMunicipio);
            console.log(objetoId);
            
            crearMapaMunicipio(objetoId[0],objetoId[1],objetoId[2]);
            
        }          
      });
    });

    $("#select-zona").on('change',function(){
      let nombre_zona=$("#select-zona").val();
      $.ajax({        
        url: "consultaInformacionZonaEspecifica.php",
        method:'POST',
        data: { nombre_z: nombre_zona },
        
        success:function(objetoZona) {   
            let objeto= JSON.parse(objetoZona);
            
            
            crearMapa(objeto[0],objeto[1],objeto[2],objeto[3]);
        }          
      });
    
    
    })


  
    
});