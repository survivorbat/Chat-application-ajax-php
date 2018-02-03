<?php
session_start();
$TEXT = parse_ini_file('configfiles/textfiles.ini');
//Validation
if(!isset($_SESSION['view_mode'])) $_SESSION['view_mode']='default';
if(!isset($_SESSION['user_username']) || !isset($_SESSION['user_password'])) $_SESSION['view_mode']='default';


//What viewmode
switch($_SESSION['view_mode']){
  case 'logged':
    include_once('comp/screen_normal_interface.php');
    break;
  case 'default':
    include_once('comp/screen_login.php');
    break;
  case 'settings':
    include_once('comp/screen_settings.php');
    break;
}
