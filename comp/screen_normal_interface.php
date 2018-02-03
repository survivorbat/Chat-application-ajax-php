<div class="bigcontainer centerbox">
  <div style="display:relative">
    <script>
      var autoscroll=true;
      $(document).ready(function(){
        reloadChat();
        reloadSidebar();
        if($('.chatArea').length){
          $(".chatArea").scroll(function() {
            if($(".chatArea").scrollTop() + Math.floor($(".chatArea").outerHeight()) + 50 >= $(".chatArea")[0].scrollHeight) {
              autoscroll=true;
            } else {
              autoscroll=false;
            }
          });
        }
      })
      function reloadChat(){
        setInterval(function(){
          if($('.chatArea').length){
            $.ajax({
              url: "comp/interface_chat.php",
              success: function(e){
                $("#chatAreaUpdate").html(e);
                if(autoscroll==true){
                  $(".chatArea").scrollTop($(".chatArea")[0].scrollHeight);
                }
              }
            })
          }
        },200)
      }
    </script>
    <div class="chatArea">
      <pre id="chatAreaUpdate">

      </pre>
    </div>
    <div class="chatInput">
      <input type="text" id="chat_userinput" placeholder="Type your message..." /><input type="submit" id="interface_chat_submitbutton" onClick="submitChatInput()" value="<?php print $TEXT['interface_chat_button'];?>">
    </div>
    <script>
    function reloadSidebar(){
      setInterval(function(){
        $.ajax({
          url: "comp/interface_sidebar.php",
          success: function(e){
            $(".sidebar").html(e);
          }
        })
      },2000)
    }
  </script>
    <div class="sidebar">

    </div>
  </div>
</div>
