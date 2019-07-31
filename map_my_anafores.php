<?php

					
					include 'connect_db.php';
					$thesi = array();
					$perigrafi = array();
					$j = 0;
					$user=$_SESSION['CurrentUser'];
					
					$query = "SELECT anafores.geogr_thesi, anafores.perigr_xristi 
									FROM anafores 
									JOIN xristes
									ON xristes.x_id=anafores.x_id
									WHERE xristes.x_id='$user'
									ORDER BY anafores.upload_date DESC";
					$result = $con->query($query);
		
					while($row = mysqli_fetch_array($result)) { 
						
					
						$thesi[$j] = $row["geogr_thesi"];
						$perigrafi[$j] = $row["perigr_xristi"];
						$j++;
					}
					if( empty( $thesi ) ){ $thesi[] = 1; }
						
	
						?>			


<!DOCTYPE html>
						
			
<html>

<head>

	<style>
      #googleMap {
    float:right;
  width: 440px;
	height: 440px;
margin-right:70px;
border-radius:10%;
	border:3px solid black;
		 }
      #panel {
		color:black;
        position: relative;
        bottom: 285px;
        left: 50%;
        margin-left: -180px;
        z-index: 5;
        background-color: #fff;
        padding: 0px;
        border: 0px solid #999;
		
      }
	  </style>
	  
	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
	</script>

	<script>
	
	
	
		var LocationData = new Array(<?php echo '"'.implode('","',$thesi).'"';?>);
	    var perigrafi = new Array( <?php echo '"'.implode('","',$perigrafi).'"' ; ?> );
     
	
	var panepistimio = new google.maps.LatLng(38.28855555648361, 21.786017417907715);
	
	function initialize()
{
		var mapOptions = {
			zoom: 17,
			center: panepistimio,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};

    var map = new google.maps.Map(document.getElementById('googleMap'), mapOptions);
    var bounds = new google.maps.LatLngBounds();
    var infowindow = new google.maps.InfoWindow(); 
	
	
    if ( LocationData != "1") {
	for (var i=0; i<LocationData.length; i++)
    {
		if (i == 20) {break;}
        var p = LocationData[i];
		var stringcoor = p.replace(/[()]/g,'');
		var commaPos = stringcoor.indexOf(',');
  		var coordinatesLat = parseFloat(stringcoor.substring(0, commaPos));
		var coordinatesLong = parseFloat(stringcoor.substring(commaPos + 1, stringcoor.length));
		var spot = new google.maps.LatLng(coordinatesLat, coordinatesLong);
        bounds.extend(spot);
        var marker = new google.maps.Marker({
            position: spot,
            map: map,
			title: perigrafi[i]
            
        }); 
     
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.setContent(this.title);
            infowindow.open(map, this);
        });  
    }
	
     
    map.fitBounds(bounds);
	}
}

 
google.maps.event.addDomListener(window, 'load', initialize);

</script> 

</head>		
<body>
	<div id="googleMap"> </div>	
	
</body>
				
</html>	


	
				