      var map;
      var latitude,longitude;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 2
        });
        map.addListener('click', function(e) {
          placeMarkerAndPanTo(e.latLng, map);
        });
        var infoWindow = new google.maps.InfoWindow({map: map});

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };


            latitude = pos.lat;
            longitude = pos.lng;

            document.getElementById("util").value=localStorage.getItem('login');

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found');
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }


      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
      }
      function deg2rad(deg) {
        return deg * (Math.PI/180)
      }
      function placeMarkerAndPanTo(latLng, map) {
        var marker = new google.maps.Marker({
          position: latLng,
          map: map
        });

        var R = 6371; // Radius of the earth in km
        var dLat = deg2rad(marker.getPosition().lat()-latitude);  // deg2rad below
        var dLon = deg2rad(marker.getPosition().lng()-longitude); 
        var a = 
          Math.sin(dLat/2) * Math.sin(dLat/2) +
          Math.cos(deg2rad(latitude)) * Math.cos(deg2rad(marker.getPosition().lat())) * 
          Math.sin(dLon/2) * Math.sin(dLon/2)
          ; 
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
        var d = R * c; // Distance in km
        alert("latitude : "+marker.getPosition().lat()+" \nlongitude : "+marker.getPosition().lng()+"\n Distance : "+d+" KM");
        map.panTo(latLng);
      }