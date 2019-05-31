<?php 
$query = $db->query("select * from travels where idx='$sidx'");
$rs = $query->fetch();
?>

<div>
	<h2 class="sub-title"><?php echo $rs->title; ?></h2>
	<div class="place_list">
		<ul>
			<?php
            $query = $db->query("select * from route where travels_idx='$rs->idx' order by idx asc");
            for($i = 0;$rs2 = $query -> fetch(); $i++){
            ?>
            <li class="place-item" onclick="document.location.href='/view/detail/<?php echo $rs2->idx; ?>'">
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
       	 		<input style="width: 100%; margin-top: 10px;" class="btn btn-primary" onclick="document.location.href='/view/add_place/<?php echo $rs->idx; ?>'" type="button" value="행선지 추가">
       	 	</li>
		</ul>
			
	</div>
</div>
