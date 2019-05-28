<?php 
$query = $db->query("select * from detail where _id='$sidx'");
$rs = $query->fetch();
$dir_query = $db->query("select * from directory where _id='$rs->directory_id'");
$dir_rs = $dir_query->fetch();
$image = $rs->image;
?>

<div class="detail-box-1">
    <h2 class="sub-title">
        <?php echo $rs->title; ?>
        <a class="side-text" href="/view/directory/<?php echo $dir_rs->_id; ?>">in <?php echo $dir_rs->title; ?></a>
    </h2>
	<p class="detail-content"><?php echo $rs->content; ?><a href="/model/detail_content_update/<?php echo $rs->_id; ?>">edit</a></p>
    <div class="btn-wrap add-btn-wrap detail-add-btn"> 
        <button class="btn btn-primary add-btn" id="detail-add-btn">
            <i class="fa fa-plus" aria-hidden="true"></i>
        </button>
    </div>	
    <div class="upload_box_wrap">   
        <div class="gb_kp"></div>
        <div id="upload_box" class="upload_box">
            <form action="/model/add_photo/<?php echo $rs->_id; ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="file" class="form-control" id="imageName" name="file[]" required multiple>
                </div>
                <div class="form-group text-right">
                    <input class="btn btn-primary" type="submit" value="사진 추가">
                </div>
            </form>
        </div>
    </div>
</div>
<div class="detail-box-2">
    <div>
    	<?php
    	$image = explode(",",$image);
    	for($i = count($image) - 2; $i >= 0; $i--) {
    	?>
        <div class="col-md-3 detail-img" data-id="<?php echo $i; ?>">
            <img src="/file/<?php echo $image[$i]; ?>"> 
        </div>
    	<?php } ?>
    </div>

    <div class="popup-image">
        <button data-type="prev" class="prev arrow-btn"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
        <div></div>
        <button data-type="next" class="next arrow-btn"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
    </div>
    <div class="popup-background"></div>

</div>

<script type="text/javascript">
    $(".detail-img").click(function() {
        var idx = $(this).attr("data-id");
        var src = $(this).children("img").attr("src");
        $(".popup-image > div").html("<img src='" + src + "'>");
        $(".popup-image").attr("data-id", idx);
        onShowPopup(".popup-image");
    });
    $(".popup-image button").click(function() {
        var idx = $(this).parent("div").attr("data-id");
        var image = '<?php echo $rs->image; ?>';
        image = image.split(",");
        if($(this).attr("data-type") == "prev") {
            var no = idx == image.length-2 ?  image.length-2 : ++idx;
            $(".popup-image > div").html("<img src='/file/" + image[no] + "'>");
        } else {
            var no = idx == 0 ?  0 : --idx;
            $(".popup-image > div").html("<img src='/file/" + image[no] + "'>");
        }
        $(this).parent("div").attr("data-id", no);
    });
    $(".popup-background").click(function() {
        onHidePopup(".popup-image");
    });
</script>






