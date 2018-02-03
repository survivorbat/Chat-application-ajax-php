<?php
// session and connection
session_start();
require_once('../connect.php');
$username=$_GET['username'];
$startinguser=$_SESSION['user_username'];
//easier variables to make life easier

if(!isset($_GET['username'])) exit();
//Stop the script in case there is no username defined

$sql = $conn->prepare("SELECT count(*) as amount FROM chat_users WHERE username='$username'");
$sql->execute();
$res = $sql->fetch();
if($res['amount']==0) exit(0);

//Check if the user even exists
$sql = $conn->prepare("SELECT id FROM chat_users WHERE username='$username'");
$sql->execute();
$user_id = $sql->fetch();
$sql = $conn->prepare("SELECT id FROM chat_users WHERE username='$startinguser'");
$sql->execute();
$current_user_id = $sql->fetch();

$user_id=$user_id['id'];
$current_user_id=$current_user_id['id'];

///Give them ids
$amount=0;
$sql = "SELECT chatroom_id,count(chatroom_id) as amount FROM chat_chatrooms WHERE (user_id='$user_id' OR user_id='$current_user_id')  GROUP BY chatroom_id";
foreach($conn->query($sql) as $row){
  if($row['amount']!=1){
    $roomnumber = $row['chatroom_id'];
    $amount=$row['amount'];
  }
}
if($amount==2) exit($roomnumber);

//If the room already exists then stop the script and open that chat

$done=false;
while($done==false){
  $randomnum = rand(1,3000);
  if(!file_exists('../chatlogs/'.$randomnum.'.log')) $done=true;
}
//Create a new chatlog file

$sql = $conn->prepare("INSERT INTO chat_chatrooms (user_id,chatroom_id) VALUES ('$user_id','$randomnum'),('$current_user_id','$randomnum')");
$sql->execute();
//Create a new chatlink
echo $randomnum;
//Give the random number
