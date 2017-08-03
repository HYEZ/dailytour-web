<?php 
$query = $db->query("select * from directory where _id='$sidx'");
$rs = $query->fetch();
?>

<div>
	<h2 class="sub-title"><?php echo $rs->title; ?></h2>
	<div class="left padding-box" id="map"></div>
	<div class="right padding-box">
		<form action="/model/add_place_ok/<?php echo $rs->_id; ?>" method="post">
			<div class="place_list">
				<div class="form-group">
	                <input type="text" placeholder="Keword Search" class="form-control search-text" id="keyword" name="keyword">
	                <button class="btn btn-primary search-btn" type="button" id="keyword_search"><i class="fa fa-search" aria-hidden="true"></i></button>
	            </div>
	            <div class="form-group">
					<input type="file" placeholder="Image Search" class="form-control search-text" name="photo" id="photo" size="25" />
					<button type="button" name="submit" class="btn btn-primary search-btn" id="photo_search"><i class="fa fa-search" aria-hidden="true"></i></button>
	            </div>
	            <div class="result">
	            	<input type="hidden" class="form-control" id="lat" name="lat" readonly required>
	            	<input type="hidden" class="form-control" id="lng" name="lng" readonly required>
	            	<input type="text" class="form-control" id="lat_view" name="lat_view" readonly required>
	            	<input type="text" class="form-control" id="lng_view" name="lng_view" readonly required>
	            	<input type="text" class="form-control" id="title" name="title" placeholder="방문지 제목" required>
	            	<textarea name="content" class="form-control" placeholder="방문지 내용을 입력해주세요." required></textarea>
	            	<input class="btn btn-primary" style="width: 100%;" type="submit" value="방문지 추가">
	            </div>
			</div>
		</form>
		
	</div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBx2KOMuHh3r1caF4MuHJq12zTZq5pVlKw&callback=initMap"
    async defer></script>