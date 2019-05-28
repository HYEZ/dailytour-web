<?php 
$file_name = date("YmdHis")."_".$_FILES['file']['name'];
$file_tmp = $_FILES['file']['tmp_name'];
$file_arr = array("image/jpeg","image/png","image/bmp","image/gif");
$file_type = $_FILES['file']['type'];
$file_rel = "{$_SERVER['DOCUMENT_ROOT']}/file/".$file_name;

// foreach ($_FILES["file"]["error"] as $key => $error) {
//     if ($error == UPLOAD_ERR_OK) {
//         $tmp_name = $_FILES["file"]["tmp_name"][$key];
//         $name = $_FILES["file"]["name"][$key];
//         $chk = getimagesize($tmp_name);

//         if($chk != null && $chk != "") {
//         	echo $_FILES['file']['size'][$key];

//         	print_r($chk);
//         	echo "asdf";
//         }
//     }
// }

if(!in_array($file_type,$file_arr)){
	alertMove("올바른 파일 형식이 아닙니다.","/");
	return false;
} else {
	move_uploaded_file($file_tmp, $file_rel);
	
	$ps = $db->prepare("insert into directory (user_id, title, image, first_date, end_date) values (:user_id, :title, :image, :first_date, :end_date)");

	$ps->bindValue(":user_id", $_SESSION['user_id']);
	$ps->bindValue(":title", $_POST['title']);
	$ps->bindValue(":image", $file_name);
	$ps->bindValue(":first_date", $_POST['from']);
	$ps->bindValue(":end_date", $_POST['to']);

	$ps->execute();

	move("/");
}









