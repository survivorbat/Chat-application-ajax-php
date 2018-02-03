<?php
session_start();
$chatid = $_GET['id'];
if(file_exists('../chatlogs/'.$chatid.'.log')){
  $_SESSION['user_viewchat'] = $chatid;
} else {
  $file = fopen('../chatlogs/'.$chatid.'.log','w');
  fwrite($file,'');
  fclose($file);
  $_SESSION['user_viewchat'] = $chatid;
}
