var myStyle = [
       {
         elementType: "labels",
         stylers: [
           { visibility: "off" }
         ]
       }
     ];

var map;
function initMap() {
  var geocoder = new google.maps.Geocoder();
  var location = "Paris";
  geocoder.geocode( { 'address': location }, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
        map.setCenter(results[0].geometry.location);
    } else {
        alert("Could not find location: " + location);
    }
});
  
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 12,
    mapTypeControlOptions: {
         mapTypeIds: ['mystyle', google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.TERRAIN]
       },
    mapTypeId: 'mystyle'
  }); 

  map.mapTypes.set('mystyle', new google.maps.StyledMapType(myStyle, { name: 'My Style' }));


  

  google.maps.event.addListener(map, "click", function(event) {
    var lat = event.latLng.lat();
    var lng = event.latLng.lng();
    //console.log("Lat=" + lat + "; Lng=" + lng);

    var R = 6378137; // Earth’s mean radius in meter
    var dLat = rad(48.873777 - lat);
    var dLong = rad(2.295021 - lng);
    var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
      Math.cos(rad(lat)) * Math.cos(rad(48.873777)) *
      Math.sin(dLong / 2) * Math.sin(dLong / 2);
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    var d = Math.round(R * c);
    console.log(d);
    if(d>100){
      document.getElementById("target").innerHTML="Vous êtes à "+ d + " mètres de la cible";
    }
    else{
      document.getElementById("target").innerHTML="Bien joué";
    }
});

}

var rad = function(x) {
  return x * Math.PI / 180;
}
