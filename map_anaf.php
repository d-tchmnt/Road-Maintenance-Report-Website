<?php $thesi = $row["geogr_thesi"]; ?>



	<style>
      #googleMap1 {
  float:right;
  width:400px;
	height: 400px;
	

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
	  
	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
	</script>

	<script>
	
	
	
	//var LocationData = <?php echo $thesi; ?>
	   
     var LocationData = new Array(<?php echo '"',$thesi.'"';?>);
	
	
	
	function initialize()
{

var mapOptions = {
  maxZoom: 17
};
    var map = new google.maps.Map(document.getElementById('googleMap1'), mapOptions );
    var bounds = new google.maps.LatLngBounds();
    var infowindow = new google.maps.InfoWindow(); 
	
	
    
	    
	
		
       var p = LocationData[0];
		var stringcoor = p.replace(/[()]/g,'');
		var commaPos = p.indexOf(',');
  		var coordinatesLat = parseFloat(stringcoor.substring(0, commaPos));
		var coordinatesLong = parseFloat(stringcoor.substring(commaPos + 1, stringcoor.length));
		var spot = new google.maps.LatLng(coordinatesLat, coordinatesLong);
		
        bounds.extend(spot);
        var marker = new google.maps.Marker({
            position: spot,
            map: map
            
        }); 
     
        
   
	
     
    map.fitBounds(bounds);
	
	}


 
google.maps.event.addDomListener(window, 'load', initialize);

</script> 


	<div class="map1" id="googleMap1"> </div>	
	
				
