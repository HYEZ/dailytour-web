<?php

if(!((int)$midx) && $midx){
	include "{$_SERVER['DOCUMENT_ROOT']}/page/{$subid}/{$midx}.php";
} else {
	include "{$_SERVER['DOCUMENT_ROOT']}/page/{$subid}/index.php";
}