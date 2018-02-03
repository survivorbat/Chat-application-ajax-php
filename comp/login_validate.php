<?php
session_start();
require_once('../connect.php');
$TEXT = parse_ini_file('../configfiles/textfiles.ini');
function sanitizeInput($data){
	$data = preg_replace("/[<>]/"," ",$data);
	$data = strip_tags($data);
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

$username= sanitizeInput($_POST['username']);
$password = sanitizeInput($_POST['password']);

if(empty($username) || empty($password)) exit($TEXT['login_emptyinput']);

$sql = $conn->prepare("SELECT * FROM chat_users WHERE username=:user LIMIT 1");
$sql->bindParam(':user', $username);
$sql->execute();
$res = $sql->fetch();
if(empty($res)) exit($TEXT['login_wronginput']);
if(!password_verify($password,$res['password'])){
  exit($TEXT['login_wronginput']);
} else {
  $_SESSION['view_mode']='logged';
  $_SESSION['user_username']=$username;
  $_SESSION['user_password']=$res['password'];
	$_SESSION['user_fullname']=$res['fullname'];
  echo 'succes';
}
