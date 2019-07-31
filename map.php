
    
    <style>
      #map-canvas {
	  
float:right;
  width: 390px;
	height: 390px;
	margin-top:5%;
	margin-right:0%;

border-radius:10%;
	border:3px solid black;
		z-index:+9999;
      }
	  #panel {
	  color:black;
        position: absolute;
        bottom: 285px;
        left: 50%;
        margin-left: -180px;
        
        background-color: #fff;
        padding: 0px;
        border: 0px solid #999;
		
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script>

var map;
var panepistimio = new google.maps.LatLng(38.28855555648361, 21.786017417907715);


function initialize() {
  var mapOptions = {
    zoom: 17,
    center: panepistimio,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
	  
	  
var marker = new google.maps.Marker({
    position: panepistimio,
	draggable: true,
    
  });
marker.setMap(map);

google.maps.event.addListener(marker, 'dragend', function (event) {
     var latitude = this.getPosition().lat();
     var longtitude = this.getPosition().lng();
	 var mark = new google.maps.LatLng(latitude, longtitude);
	 document.getElementById("geocode").value = mark;
	 
	 
	
});


 

}





google.maps.event.addDomListener(window, 'load', initialize);

    </script>
	
	
  </head>
  <body>
  
    
	
    <div id="map-canvas"></div>
    
	
	
  
 
