<?php 
$query = $db->query("select * from travels where idx='$sidx'");
$rs = $query->fetch();
?>

<div>
    <form action="/model/add_place_ok/<?php echo $rs->idx; ?>" method="post">
    	<input type="text" class="form-control" id="title" name="title" placeholder="행선지 이름" required>
    	<textarea name="content" class="form-control" style="height: 300px;" placeholder="행선지 내용을 입력해주세요." required></textarea>
    	<input class="btn btn-primary" style="width: 100%;" type="submit" value="행선지 추가">
    </form>
	          
</div>
