<?php
include "{$_SERVER['DOCUMENT_ROOT']}/include/lib.php";


$pw = md5($_POST['password']);
$db->query("insert into member set user_id='$_POST[email]', user_pw='{$pw}', user_name='$_POST[name]'");


move("/");
