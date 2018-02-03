<div class="smallcontainer centerbox">
  <div style="padding:5px;text-align:center">
    <p style="margin-bottom:3vh">
      <?php print $TEXT['login_title_main'];?>
    </p>
    <p class="lesspowerfultext">
      <?php print $TEXT['login_title_username'];?>
    </p>
    <input type="text" class="login_style" placeholder="Username" name="chatun" id="inputbox_username" />
    <p class="lesspowerfultext">
      <?php print $TEXT['login_title_password'];?>
    </p>
    <input type="password" class="login_style" placeholder="Password" name="chatpw" id="inputbox_password" />
    <br />
    <br />
    <input type="submit" class="login_style" value="Login" onclick="login()" />
    <br />
    <p id="login_errors">
    </p>
  </div>
</div>
