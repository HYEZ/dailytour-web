<?php 
$query = $db->query("select * from route, travels where route.idx='$sidx' and travels.idx=route.travels_idx"); // 질의 전달
$rs = $query->fetch(); // 값을 가져옴
?>
<div class="detail-box-1">
    <h2 class="sub-title">
           <?php echo $rs->name; ?>
            <a class="side-text" href="/view/directory/<?php echo $rs->idx; ?>">in <?php echo $rs->title; ?></a>
    
    </h2>
	<p class="detail-content" style="width: auto">
        <form method="post" action="/model/detail_content_update/<?php echo $sidx; ?>" style="float: left;">
            <textarea name="content" style="float: left; width: 400px; border: none; background: transparent; padding: 0"><?php echo $rs->content; ?></textarea>
            <br>
            <input type="submit" value="edit" style="border: none; background: transparent; color: #0089d8; padding: 0" >
        </form>
    </p>
    <div class="btn-wrap add-btn-wrap detail-add-btn"> 
        <button class="btn btn-primary add-btn" id="detail-add-btn">
            <i class="fa fa-plus" aria-hidden="true"></i>
        </button>
    </div>	
    <div class="upload_box_wrap">   
        <div class="gb_kp"></div>
        <div id="upload_box" class="upload_box">
            <form action="/model/add_photo/<?php echo $sidx; ?>" method="post" enctype="multipart/form-data">
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
        $photo_query = $db->query("select * from photos where route_idx='$sidx'"); // 질의 전달
        for($i = 0;$rs2 = $photo_query -> fetch(); $i++){ //값을 가져옴
    
    	?>
        <div class="col-md-3 detail-img" data-id="<?php echo $i; ?>">
            <img src="/file/<?php echo $rs2->image; ?>"> 
        </div>
    	<?php } ?>
    </div>

    <div class="popup-image">
        <div></div>
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
    $(".popup-background").click(function() {
        onHidePopup(".popup-image");
    });
</script>






