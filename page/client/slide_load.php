<?php include "{$_SERVER['DOCUMENT_ROOT']}/include/lib.php"; ?>
<article class="animation_box">
	<div class="slide_box">
		<ul class="slide">
        	<?php
	        $query = $db->query("select * from animation order by num asc");
	        for($i = 0; $rs = $query->fetch(); $i++){
	        ?>
	        <li id="slide<?php echo $i; ?>"><img src="<?php echo $rs->file; ?>"></li>
	        <?php } ?>
	    </ul>
	</div>
	    <ul class="slide_btn">
        <?php
        $query = $db->query("select * from animation order by num asc");
        for($i = 0; $rs = $query->fetch(); $i++){
        ?>
        <li><input class="btn btn-default" type="button" value="<?php echo $i; ?>" onClick="aniSlide(<?php echo $i; ?>)" id="slidebut<?php echo $i; ?>"></li>
        <?php } ?>
</ul>
</article>
<article class="animation_box">
	<h3>슬라이드 적용</h3>
	<ul class="slide_change">
    	<?php 
		$query = $db->query("select * from animation order by num asc");
	    for($i = 0; $rs = $query->fetch(); $i++){
		?>
    	<li class="slide_drag" data-no="<?php echo $rs->no; ?>">
        	<img src="<?php echo $rs->file; ?>">
        </li>
        <?php } ?>
    </ul>
</article>

<script type="text/javascript">
	
function slideSort(){
    $(".slide_change").sortable({
        stop:function(event,ui){
            var s = new Array();
            var a = $(".slide_drag");
            for(var i = 0; i < a.length; i++){
                s[i] = [$(a[i]).attr("data-no"),$(a[i]).index()];
            }
            $.ajax({
                type:"post",
                url:"/page/client/sort.php",
                data:{
                    s:s
                },
                success: function(data){
                    slideLoad();
                }
            });
        }
    });
}
$(function(){
	slideSort();
});

</script>
