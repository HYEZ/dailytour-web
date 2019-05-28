<?php 


// $ps = $db->prepare("insert into detail (directory_id, title, content, lat, lng) values (:directory_id, :title, :content, :lat, :lng)");

// $ps->bindValue(":directory_id", $sidx);
// $ps->bindValue(":title", $_POST['title']);
// $ps->bindValue(":content", $_POST['content']);
// $ps->bindValue(":lat", $_POST['lat']);
// $ps->bindValue(":lng", $_POST['lng']);

// $ps->execute();


$db->query("insert into route set travels_idx='{$sidx}', title='$_POST[title]', content='$_POST[content]'");
move("/view/directory/".$sidx);









