$( document ).ready(function() {

    console.log("ready");
    $.ajax({        
        url: "consultasPhp/consultaMunicipios.php",
        
        
        success:function(stringMunicipios) {   
            let objetoMunicipios= JSON.parse(stringMunicipios);
            let divMunicipios=$("#municipios");
            console.log(divMunicipios);
            console.log(objetoMunicipios.length);

            for(i=0;i<objetoMunicipios.length;i++){
                console.log(objetoMunicipios[i]);
                divMunicipios.append(`<option value='${objetoMunicipios[i]}'>${objetoMunicipios[i]}</option>`);
            }
        }          
      });
   

      $.ajax({        
        url: "consultasPhp/consultaResponsable.php",
        
        
        success:function(stringResponsable) {   
            let objetoResponsable= JSON.parse(stringResponsable);
            let divResponsable=$("#responsable");
            console.log(divResponsable);
            console.log(objetoResponsable.length);

            for(i=0;i<objetoResponsable.length;i++){
                console.log(objetoResponsable[i]);
                divResponsable.append(`<option value='${objetoResponsable[i]}'>${objetoResponsable[i]}</option>`);
            }
        }          
      });
   
      $.ajax({        
        url: "consultasPhp/consultaTipoDeZona.php",
        
        
        success:function(stringtipoDeZona) {   
            let objetotipoDeZona= JSON.parse(stringtipoDeZona);
            let divtipoDeZona=$("#tipoDeZona");
            console.log(divtipoDeZona);
            console.log(objetotipoDeZona.length);

            for(i=0;i<objetotipoDeZona.length;i++){
                console.log(objetotipoDeZona[i]);
                divtipoDeZona.append(`<option value='${objetotipoDeZona[i]}'>${objetotipoDeZona[i]}</option>`);
            }
        }          
      });
   
      $.ajax({        
        url: "consultasPhp/consultaEstado.php",
        
        
        success:function(stringEstado) {   
            let objetoEstado= JSON.parse(stringEstado);
            let divEstado=$("#estado");
            console.log(divEstado);
            console.log(objetoEstado.length);

            for(i=0;i<objetoEstado.length;i++){
                console.log(objetoEstado[i]);
                divEstado.append(`<option value='${objetoEstado[i]}'>${objetoEstado[i]}</option>`);
            }
        }          
      });

      if($(".textoImagen").length>0){
        window.scroll({
            top: 300,
        
            behavior: 'smooth'
          });
      }

      $(window).resize(function() {
        var ancho = window.innerWidth;
        var alto = window.innerHeight;
        if(ancho<600){
            console.log("se entro al if");
          
          
        }
        
      });
      
     
      
     
      
});