<?php
session_start();
function sanitizeInput($data){
	$data = preg_replace("/[<>]/"," ",$data);
	$data = strip_tags($data);
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
$time = date("d-m-y H:i:s");
$message= "\n".'<span class="timestamp">'.$time.'</span> <span class="nametag">> '.$_SESSION['user_fullname'].':</span> '.sanitizeInput($_GET['message']);
$file = '../chatlogs/'.$_SESSION['user_viewchat'].'.log';
$chatfile = fopen($file,'a+');
fwrite($chatfile,$message);
fclose($chatfile);
