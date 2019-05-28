<?php
include "{$_SERVER['DOCUMENT_ROOT']}/include/lib.php";

echo $_SESSION[user_idx];
$db->query("delete from user where idx='$_SESSION[user_idx]'");


session_destroy();
alertMove("탈퇴 처리되었습니다.", "/");

?>
