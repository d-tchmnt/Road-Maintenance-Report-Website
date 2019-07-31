	<style>
      #googleMap {
	float:right;
	width: 440px;
	height: 440px;
	margin-top:1%;
	border-radius:10%;
	border:3px solid black;
	z-index:+9999;
      }
	  
	  #panel {
		color: black;
        position: absolute;
        bottom: 285px;
        left: 50%;
        margin-left: -180px;
        
        background-color: #fff;
        padding: 0px;
        border: 0px solid #999;
		
      }
	  
	 
	 
	 
	 <?php

	
					include 'connect_db.php';
					$thesi = array();
					$perigrafi = array();
					$j = 0;
					$query = "SELECT anafores.geogr_thesi, anafores.onoma_anaf, katigories_anaf.onoma_kat, anafores.perigr_xristi 
					FROM anafores 
					INNER JOIN katigories_anaf 
					ON anafores.k_id = katigories_anaf.k_id
					WHERE anafores.epilithike = 0 
					ORDER BY anafores.upload_date DESC";
					$result = $con->query($query);
		
					while($row = mysqli_fetch_array($result)) { 
						
					
						$thesi[$j] = $row["geogr_thesi"];
						$eidos[$j] = $row["onoma_kat"];
						$onoma[$j] = $row["onoma_anaf"];
						$perigrafi[$j] = $row["perigr_xristi"];
						$j++;
					}
					
					if( empty( $thesi ) ){ 
						$thesi[] = 1; 
						$perigrafi[] = 1;
						$onoma[] = 1;
						$eidos[] = 1;
						}
						
						
						
	
						?>			


						
	



	  </style>
	  
	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
	</script>

	<script>
	
	
	
		var LocationData = new Array(<?php echo '"'.implode('","',$thesi).'"';?>);
	    var onoma = new Array( <?php echo '"'.implode('","',$onoma).'"' ; ?> );
		var katigoria = new Array( <?php echo '"'.implode('","',$eidos).'"' ; ?> );
		var perigrafi = new Array( <?php echo '"'.implode('","',$perigrafi).'"' ; ?> );
     
	
	var panepistimio = new google.maps.LatLng(38.28855555648361, 21.786017417907715);
	
	function initialize()
	
{
		var mapOptions = {
			zoom: 12,
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
			title: "<b><u>" + "Κατηγορία" + "</u></b>" + ":   " + "&nbsp;  " + katigoria[i] + "<br />" + "<b><u>" + "Όνομα αναφοράς" + "</u></b>" + ":   "+ "&nbsp;  " + onoma[i] + "<br /><br />"
            + "<b><u>" + "Περιγραφή" + "</u></b>" + ":   " + "&nbsp;  " + perigrafi[i]
        }); 
     
        google.maps.event.addListener(marker, 'click', function() {
			
            infowindow.setContent(this.title);
			infowindow.setOptions({maxWidth:250}); 
            infowindow.open(map, this);
	
        });  
    }
	
     
    map.fitBounds(bounds);
	}
}


google.maps.event.addDomListener(window, 'load', initialize);

</script> 
	

	<div id="googleMap"> </div>	
	
