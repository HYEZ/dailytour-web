<?php 


$db->query("insert into route set travels_idx='{$sidx}', name='$_POST[title]', content='$_POST[content]'");
move("/view/directory/".$sidx);









