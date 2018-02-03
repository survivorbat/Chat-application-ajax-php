var interval;

$(document).ready(function(){
	construct_view();
	enterkeyhandle();
})

function enterkeyhandle(){
	$(document).keypress(function(e) {
  	if(e.which == 13) {
      	submitChatInput();
				login();
  	}
	});
}

function construct_view(){
	$.ajax({
		url: "view.php",
		success: function(view){
      $("body").html(view);
    }
	});
}

function login(){
	var input_username = $("#inputbox_username").val();
	var input_password = $("#inputbox_password").val();
	var formData = {
		username:input_username,
		password:input_password
	};
	sendLogin(formData);
}

function sendLogin(formData){
	$.ajax({
		url: "comp/login_validate.php",
		type: 'POST',
		data: formData,
		success: function(result){
			if(result!="succes"){
				$("#login_errors").html(result);
			} else {
				defaultview();
				$("#login_errors").html('<i>Logging in...</i>');
			}
		}
	})
}

function defaultview(){
	$.ajax({
		url: "view.php",
		success: function(view){
    	$("body").html(view);
  	}
	})
}

function chatAreaAjax() {
	$.ajax({
		url: "comp/chatarea.php",
		success: function(view){
    	$("#chatarea").html(view);
  	}
	})
}

function submitChatInput(){
	if(!$('#chat_userinput').val() || $('#chat_userinput').val().length===0) return;
	var message = {message:$('#chat_userinput').val()};
	$('#chat_userinput').val('');
	$.ajax({
		url: "comp/chatinput_add.php",
		type: 'GET',
		data: message
	})
}

function menuOption(kind){
	var action = {
		action:kind
	}
	switch(kind){
		case 'Logout':
			$.ajax({
				url: "comp/menu_controller.php",
				data: action,
				type: 'GET',
				success: function(){
					defaultview();
				}
			})
			break;
		case 'settings':
			$.ajax({
				url: "comp/menu_controller.php",
				data: action,
				type: 'GET',
				success: function(){
					defaultview();
				}
			})
			break;
	}
}

function openChat(chatbox){
	var chat = {id:chatbox};
	$.ajax({
		url: "comp/move_to_chat.php",
		type: 'GET',
		data: chat
	})
}

function startChat(name){
	var name = {username:name};
	$.ajax({
		url: "comp/startchatwith.php",
		type: 'GET',
		data: name,
		success: function(e){
			openChat(e);
			console.log(e);
		}
	})
}
