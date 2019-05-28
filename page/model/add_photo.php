<?php 
$query = $db->query("select * from detail where _id='$sidx'");
$rs = $query->fetch();
$str = $rs->image;
foreach($_FILES['file']["error"] as $key => $error) {
	$tmp_name = $_FILES["file"]["tmp_name"][$key];
	$file_name = date("YmdHis")."_".$_FILES['file']['name'][$key];
	$file_arr = array("image/jpeg","image/png","image/bmp","image/gif");
	$file_type = $_FILES['file']['type'][$key];
	$str.= $file_name.",";
	$file_rel = "{$_SERVER['DOCUMENT_ROOT']}/file/".$file_name;
	if(!in_array($file_type,$file_arr)){
		alertMove("올바른 파일 형식이 아닙니다.","/view/detail/".$sidx);
		return false;
	} else {
		move_uploaded_file($tmp_name, $file_rel);
	}
}

	
$db->query("update detail set image='{$str}' where _id='{$sidx}'");

move("/view/detail/".$sidx);









