<?php
session_start();
require_once('../connect.php');
if(isset($_SESSION['user_viewchat'])){
  include_once('../chatlogs/'.$_SESSION['user_viewchat'].'.log');
} else {
  include_once('../chatlogs/0.log');
  $_SESSION['user_viewchat']=0;
}
