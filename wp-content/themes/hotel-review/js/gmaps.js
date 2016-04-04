//google maps



//
//function initialize() {
//        var mapCanvas = document.getElementById('map');
//        var mapOptions = {
//          center: new google.maps.LatLng(php_vars.latitude, php_vars.longitude),
//          zoom: 8,
//          mapTypeId: google.maps.MapTypeId.ROADMAP
//        }
//        var map = new google.maps.Map(mapCanvas, mapOptions)
//      }
//      
//        // Create a marker and set its position.
//  
//      
//      google.maps.event.addDomListener(window, 'load', initialize);


// function initialize() {
//  var mapProp = {
//    center: new google.maps.LatLng(php_vars.latitude, php_vars.longitude),
//    zoom:5,
//    mapTypeId:google.maps.MapTypeId.ROADMAP
//  };
//  var map=new google.maps.Map(document.getElementById("map"),mapProp);
//  
//  
//}
//google.maps.event.addDomListener(window, 'load', initialize);



var myCenter=new google.maps.LatLng(php_vars.latitude, php_vars.longitude);

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:15,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("map"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter,
  });

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);

