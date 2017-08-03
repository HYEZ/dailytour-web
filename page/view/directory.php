<?php 
$query = $db->query("select * from directory where _id='$sidx'");
$rs = $query->fetch();
$lat = "";
$lng = "";
?>

<div>
	<h2 class="sub-title"><?php echo $rs->title; ?></h2>
	<div class="left padding-box" id="map"></div>
	<div class="right padding-box">
		<div class="place_list">
			<ul>
				<?php
	            $query = $db->query("select * from detail where directory_id='$rs->_id' order by _id asc");
	            for($i = 0;$rs2 = $query -> fetch(); $i++){
	            	$lat .= $rs2->lat.",";
	            	$lng .= $rs2->lng.",";
	            ?>
	            <li class="place-item" onclick="document.location.href='/view/detail/<?php echo $rs2->_id; ?>'">
	            	<div class="place_list_icon"><i class="fa fa-location-arrow" aria-hidden="true"></i></div>
	            	<div class="place_list_text">
	            		<h5><?php echo cutStr($rs2->title, 15); ?></h5>
	            		<p><?php echo cutStr($rs2->content, 15); ?></p>
	            	</div>
	            </li>
	            <?php
	            }
           	 	?>
           	 	<li>
           	 		<input style="width: 100%; margin-top: 10px;" class="btn btn-primary" onclick="document.location.href='/view/add_place/<?php echo $rs->_id; ?>'" type="button" value="방문지 추가">
           	 	</li>
			</ul>
			
		</div>
	</div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBx2KOMuHh3r1caF4MuHJq12zTZq5pVlKw&callback=initMap2"
    async defer></script>
<script type="text/javascript">
function initMap2() {
	var lat = '<?php echo $lat; ?>';
	lat = lat.split(",");
	var lng = '<?php echo $lng; ?>';
	lng = lng.split(",");
	console.log(lng);

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 14
    });

    var markers = [];
    var path = [];
    var bounds = new google.maps.LatLngBounds();

    for(var i = 0; i < lat.length - 1 ; i++) {
    	var uluru = {lat: parseFloat(lat[i]), lng: parseFloat(lng[i])};
    	console.log(uluru);
    	markers[i] = new google.maps.Marker({
	      position: uluru,
	      map: map
	    });
	    path.push(markers[i].getPosition());
	     bounds.extend(uluru);
    }

	// var bounds = new google.maps.LatLngBounds( markers[0].getPosition(), markers[1].getPosition());
	map.fitBounds(bounds);

	poly = new google.maps.Polyline({
		strokeColor: '#FF0000',
		strokeOpacity: 1.0,
		strokeWeight: 5,
		map: map,
	});
	poly.setPath(path);
}
</script>