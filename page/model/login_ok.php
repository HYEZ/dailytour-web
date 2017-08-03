<?php
include "{$_SERVER['DOCUMENT_ROOT']}/include/lib.php";

$pw = md5($_POST['password']);
$res = $db->query("select * from member where user_id='$_POST[email]' and user_pw='{$pw}'");
$rs = $res->fetch();


if($rs->user_id) {
	$_SESSION['user_id'] = $rs->user_id;
}
move("/");

?>
