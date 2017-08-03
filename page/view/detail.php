<?php 
$query = $db->query("select * from detail where _id='$sidx'");
$rs = $query->fetch();
$image = $rs->image;
echo $rs->title;
?>

<div>
	<p><?php echo $rs->content; ?></p>	
	<a href="/model/detail_content_update/<?php echo $rs->_id; ?>">edit</a>
</div>
<div>
	<form action="/model/add_photo/<?php echo $rs->_id; ?>" method="post" enctype="multipart/form-data">
		<div class="form-group">
	        <input type="file" class="form-control" id="imageName" name="file[]" required multiple>
	    </div>
		<div class="form-group text-right">
	        <input class="btn btn-primary" type="submit" value="사진 추가">
	    </div>
    </form>
    <div>
    	<?php
    	$image = explode(",",$image);
    	for($i = count($image) - 2; $i >= 0; $i--) {
    	?>
    	<img src="/file/<?php echo $image[$i]; ?>">
    	
    	<?php

    	}

    	?>
    </div>
    <div id="asdf"></div>

    <div id="popup-background"></div>

</div>
