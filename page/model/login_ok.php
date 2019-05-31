<?php
include "{$_SERVER['DOCUMENT_ROOT']}/include/lib.php";

$pw = md5($_POST['password']);
$res = $db->query("select * from user where user_id='$_POST[id]' and user_pw='{$pw}'"); // 질의 전달
$rs = $res->fetch(); // 값을 가지고온다.


if($rs->user_id) {
	$_SESSION['user_idx'] = $rs->idx;
	$_SESSION['user_id'] = $rs->user_id;
	$_SESSION['user_name'] = $rs->user_name;
}
move("/");

?>
