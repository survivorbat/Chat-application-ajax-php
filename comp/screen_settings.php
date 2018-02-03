<?php
$_SESSION['view_mode']='logged';
?>
<div class="smallcontainer centerbox">
  <div style="padding:5px;text-align:center">
    <table style="text-align: center;display: inline;">
      <tr>
        <td>
          Sound:
        </td>
        <td>
          <input type="radio" name="sound" value="true"> Yes <input type="radio" name="sound" value="false"> No
        </td>
      </tr>
      <tr>
        <td>
          Notifcations:
        </td>
        <td>
          <input type="radio" name="notifications" value="true"> Yes <input type="radio" name="notifications" value="false"> No
        </td>
      </tr>
    </table>
    <span style="position:absolute;bottom:0;left:0;right:0;margin-left:auto;margin-right:auto" class="menuitem" onclick="defaultview()">
    Save settings and go back to the previous screen
    </span>
  </div>
</div>
