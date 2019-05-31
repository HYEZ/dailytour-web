<?php
include "{$_SERVER['DOCUMENT_ROOT']}/include/lib.php";


$pw = md5($_POST['password']);
$db->query("insert into user set user_id='$_POST[id]', user_pw='{$pw}', user_name='$_POST[name]', nickname='$_POST[nickname]', phone='$_POST[phone]', birth='$_POST[birth]'");


move("/");
