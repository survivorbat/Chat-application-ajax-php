<?php
session_start();
if(!isset($_GET['action'])) exit();
switch($_GET['action']){
    case 'Logout':
      session_destroy();
      break;
    case 'settings':
      $_SESSION['view_mode']='settings';
      break;
}
