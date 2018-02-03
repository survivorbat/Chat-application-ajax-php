<?php
session_start();
require_once('../connect.php');
?>
<div class="sidebar_block">
  <div class="sidebar_blockheader">
    <div style="padding:1px">
      <p>
        Menu
      </p>
    </div>
  </div>
  <div class="sidebar_blockbody">
    <div style="padding:2px">
      <span class="menuitem" onclick="menuOption('Logout')">Log out</span>
      <span class="menuitem" onclick="menuOption('settings')">Settings</span>
    </div>
  </div>
</div>
<div class="sidebar_block">
  <div class="sidebar_blockheader">
    <div style="padding:1px">
      <p>
        Your message rooms
      </p>
    </div>
  </div>
  <div class="sidebar_blockbody">
    <div style="padding:2px">
      <span class="menuitem" onclick="openChat(0)">Public chatroom</span>
      <?php
      $sql = "SELECT chatroom_id FROM chat_users,chat_chatrooms WHERE chat_users.id=chat_chatrooms.user_id AND username='".$_SESSION['user_username']."'";
      foreach($conn->query($sql) as $row){
        $members = "SELECT username,fullname FROM chat_users,chat_chatrooms WHERE chat_users.id=chat_chatrooms.user_id AND chatroom_id='".$row['chatroom_id']."'";
        echo '<span class="menuitem" onclick="openChat('.$row['chatroom_id'].')">Chat with: <span class="chatgroupnames">';
        foreach($conn->query($members) as $member){
          if($member['username']!=$_SESSION['user_username']){
            echo $member['fullname']."&nbsp&nbsp&nbsp";
          }
        }
      echo '</span></span>';
      }
      ?>
    </div>
  </div>
</div>
<div class="sidebar_block">
  <div class="sidebar_blockheader">
    <div style="padding:1px">
      <p>
        Other users
      </p>
    </div>
  </div>
  <div class="sidebar_blockbody">
    <div style="padding:2px">
      <?php
      $sql = "SELECT username,fullname,normal_level FROM chat_users WHERE username<>'".$_SESSION['user_username']."' ORDER BY normal_level DESC";
      foreach($conn->query($sql) as $row){
        switch ($row['normal_level']){
          case '1':
            $color="white";
            break;
          case '2':
            $color="lightyellow";
            break;
          case '3':
            $color="yellow";
            break;
          case '4':
            $color="orange";
            break;
          case '5':
            $color="red";
            break;
          default:
            $color="white";
            break;
        }
        echo '<span class="online_names" onClick="startChat(\''.$row['username'].'\')"><font color="'.$color.'">';
        echo $row['fullname'];
        echo '</font></span>';
      }
       ?>
    </div>
  </div>
</div>
