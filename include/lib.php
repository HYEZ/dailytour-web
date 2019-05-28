<?php

/* Header */
header("Content-Type: text/html; charset=UTF-8");

/* Session */
session_start();

/* DB */

$option = array(PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ);
$db = new PDO("mysql:host=localhost;dbname=dailytour2;charset=utf8", "root", "root", $option);
$db -> exec("SET CHARACTER SET utf8");


/* URL */
$e = explode("/",$_SERVER['REQUEST_URI']);
$page = $e[1];
$midx = $e[2];
$sidx = $e[3];
$action = $e[4];
$endpage = $e[5];
if($page){
	switch($page){
		case "client": $subid = "client"; break;
        case "server": $subid = "server"; break;
        case "model": $subid = "model"; break;
        case "view": $subid = "view"; break;
	}
}


/* Functions */
function alert($msg){
	echo "<script>";
	echo "alert('{$msg}');";
	echo "</script>";
}

function move($url){
	echo "<script>";
	echo $url ? "location.href='{$url}';" : "history.back();";
	echo "</script>";
}

function alertMove($msg,$url){
	echo "<script>";
	echo "alert('{$msg}');";
	echo $url ? "location.href='{$url}';" : "history.back();";
	echo "</script>";
}

function hit($str,$key){
	return str_ireplace($key,"<span style='background:#ffcc66; font-weight:bold'>{$key}</span>",$str);
}


function cutStr($str, $length){
	if(mb_strlen($str,"utf-8") > $length){
		return mb_substr($str,0,$length,"utf-8")."..";
	} else {
		return $str;
	}
}

