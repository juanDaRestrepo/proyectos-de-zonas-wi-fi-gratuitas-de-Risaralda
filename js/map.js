//las siguientes lineas sirven para generar un mapa general de risaralda con todos los puntos wifi del mismo
//usando la api de leaflet

 document.getElementById('map').innerHTML = "<div id='mapid' style='width: 100%; height: 100%;'></div>";
 var osmUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
             osmAttribution = 'Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors,' +
             ' <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
 osmLayer = new L.TileLayer(osmUrl, {maxZoom: 18, attribution: osmAttribution});
 var map = new L.Map('mapid');

 
 map.setView(new L.LatLng(5.16549,-75.7668), 10);
 map.addLayer(osmLayer);
  
 $.ajax({               
  url: "consultaZonasDepartamento.php", 
  type : 'POST',
  success:function(string) {
    var objeto = JSON.parse(string);
     

    var myIconMinTic = L.icon({
      iconUrl: 'mintic.png',
      iconSize: [22, 40],
    });
    var myIconAlcaldia = L.icon({
      iconUrl: 'alcaldia.png',
      iconSize: [22,40 ],
    });
    for(i=0;i<objeto.length;i++){
      if(objeto[i]==1){
        marker = new L.marker([objeto[i+1], objeto[i+2]]).addTo(map);
        i+=2;
      }else if(objeto[i]==2){
        marker = new L.marker([objeto[i+1], objeto[i+2]],{icon: myIconMinTic}).addTo(map);
        i+=2;
      }else if(objeto[i]==3){
        marker = new L.marker([objeto[i+1], objeto[i+2]],{icon: myIconAlcaldia}).addTo(map);
        i+=2;
      }
    } 
  }
  
});


//------------------------------------------------------------------------------------------------------------------
//esta funcion sirve para generar el mapa con el marcador de cada zona especifica cada que se da click
//en la misma
function crearMapa(lat,lon,id,propietario)  {
  
    document.getElementById('map').innerHTML = "<div id='mapid' style='width: 100%; height: 100%;'></div>";
    var osmUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
                osmAttribution = 'Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors,' +
                ' <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
    osmLayer = new L.TileLayer(osmUrl, {maxZoom: 18, attribution: osmAttribution});
    var map = new L.Map('mapid');
    map.setView(new L.LatLng(lat,lon), 20 );
    map.addLayer(osmLayer);
    var myIconMinTic = L.icon({
      iconUrl: 'mintic.png',
      iconSize: [22, 40],
    });

    var myIconAlcaldia = L.icon({
      iconUrl: 'alcaldia.png',
      iconSize: [22, 40],
    });
    if(propietario==1){
      marker = new L.marker([lat, lon]).addTo(map);
    }else if(propietario==2){
      marker = new L.marker([lat, lon],{icon: myIconMinTic}).addTo(map);
    }else if(propietario==3){
      
      marker = new L.marker([lat, lon],{icon: myIconAlcaldia}).addTo(map);
    }
     
    marker.addEventListener('click',function(){
      $.ajax({        
        url: "consultaUrl.php",
        data: { idZona : id},
        type : 'POST',
        success:function(urlZona) {   
          location.href = urlZona;
        }          
      })
   
    });
    
  
      $.ajax({
        url:"consultaInformacionZona.php",
        data:{ idZona : id},
        type:'POST',
        success:function(stringZonas){
          var ventanaInfo= document.getElementById('ventanaInformativa');
          ventanaInfo.classList.add("ventanaInfo");
            console.log(stringZonas);
            let objeto_e = JSON.parse(stringZonas);
            console.log(objeto_e);
            if(objeto_e[4].length>0){

              ventanaInfo.innerHTML = `   <form class='form-zona'> 
                                            <div class="form-row">
                                            <img class='imagenDeZona form-group col-md-6 img-fluid'  src="${objeto_e[4]}" alt="foto de la zona wifi">
                                              <div class="form-group col-md-6 formulario-info mb-4">
                                                
                                                <label for="Zona">Zona:</label>
                                                <input type="text" class="form-control" value="${objeto_e[0]}" readonly>
                                                <label for="municipio">Municipio:</label>
                                                <input type="text" class="form-control" value="${objeto_e[1]}" readonly>                                 
                                                <label for="Código">Codigo municipio:</label>
                                                <input type="text" class="form-control" value="${objeto_e[5]}" readonly>
                                                <label for="Responsable">Responsable:</label>
                                                <input type="text" class="form-control" value="${objeto_e[2]}" readonly>
                                                <label for="TipoDeZona">Tipo De Zona:</label>
                                                <input type="text" class="form-control" value="${objeto_e[3]}" readonly>
                                              </div>
                                          </form>`;
                                          if(screen.width<800){
                                            let menu=$(".dropdownMenu");
                                            menu.hide("slow");
                                            $(".iconoMenuOcultar").hide();
                                            $(".iconoMenuMostrar").show();
                                            }
            }else{
              ventanaInfo.innerHTML = `
              <form class='form-zona'>
              <div class="form-row">
              <img class='imagenNoDisponible col-md-6 img-fluid'  src='imagenesDeZonas/imagenNoDisponible.png' alt='imagen de zona no disponible'>
                <div class="form-group col-md-6 formulario-info mb-4">
                  
                  <label for="Zona">Zona:</label>
                  <input type="text" class="form-control" value="${objeto_e[0]}" readonly>
                  <label for="municipio">Municipio:</label>
                  <input type="text" class="form-control" value="${objeto_e[1]}" readonly>
                  <label for="Código">Codigo municipio:</label>
                  <input type="text" class="form-control" value="${objeto_e[5]}" readonly>                                 
                  <label for="Responsable">Responsable:</label>
                  <input type="text" class="form-control" value="${objeto_e[2]}" readonly>
                  <label for="TipoDeZona">Tipo De Zona:</label>
                  <input type="text" class="form-control" value="${objeto_e[3]}" readonly>
                </div>
            </form> `;
            if(screen.width<800){
             let menu=$(".dropdownMenu");
             menu.hide("slow");
             $(".iconoMenuOcultar").hide();
             $(".iconoMenuMostrar").show();
            }
            }
        }
      });
      

    
    
    
    
    
}
//----------------------------------------------------------------------------------------------------------------
//-Esta función sirve para generar el mapa de cada municipio con todas sus zonas wifi
function crearMapaMunicipio(id,lat,lon){

  document.getElementById('map').innerHTML = "<div id='mapid' style='width: 100%; height: 100%;'></div>";
 var osmUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
             osmAttribution = 'Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors,' +
             ' <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
 osmLayer = new L.TileLayer(osmUrl, {maxZoom: 20, attribution: osmAttribution});
 var map = new L.Map('mapid');
 console.log(lat,lon);
 map.setView(new L.LatLng(lat,lon), 11);
 map.addLayer(osmLayer);
  
  $.ajax({
                
    url: "consultaZonasMunicipio.php",
    data: { idMunicipio : id},
    type : 'POST',
    success:function(string) {
      var objeto = JSON.parse(string);
       

       var myIconMinTic = L.icon({
        iconUrl: 'mintic.png',
        iconSize: [22, 40],
      });
      var myIconAlcaldia = L.icon({
        iconUrl: 'alcaldia.png',
        iconSize: [22, 40],
      });
      for(i=0;i<objeto.length;i++){
        if(objeto[i]==1){
          marker = new L.marker([objeto[i+1], objeto[i+2]]).addTo(map);
          i+=2;
        }else if(objeto[i]==2){
          marker = new L.marker([objeto[i+1], objeto[i+2]],{icon: myIconMinTic}).addTo(map);
          i+=2;
        }else if(objeto[i]==3){
          marker = new L.marker([objeto[i+1], objeto[i+2]],{icon: myIconAlcaldia}).addTo(map);
          i+=2;
        }
      } 
    }
    
  })

 
}

