<?php
$db->query("update route set content='$_POST[content]' where idx='{$sidx}'");
move("/view/detail/".$sidx);
