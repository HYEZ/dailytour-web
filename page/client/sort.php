<?php
include "{$_SERVER['DOCUMENT_ROOT']}/include/lib.php";
$a = $_POST['s'];
for($i = 0; $i < count($a); $i++){
	$no = $a[$i][0];
	$num = $a[$i][1];
	$db->query("update animation set num='{$num}' where no='{$no}'");	
}
