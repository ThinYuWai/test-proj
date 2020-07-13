'use strict';

var chatPage = document.querySelector('#chat');

$(document).ready(function(){
	  
	$('#chat_btn').on('click',function(){	
		if ( chatPage.classList.contains('hidden')) {
			chatPage.classList.remove('hidden'); 
		} else {
			chatPage.classList.add('hidden'); 
		}
	});
	
	$('#approve').on('click',function(){	
	  updateUser(2);
	});
	
	$('#disapprove').on('click',function(){	
	  updateUser(3);
	});
});

function updateUser(status) {
	// Get form
    var data = {};
    data["userId"] = $('#user_id').val();
    data["comment"] = $('#inputComment').val();
    data["status"] = $('#inputComment').val();
    console.log(data);
    $.ajax({
    	type: "POST",
    	contentType: "application/json",
    	url: "/user_detail/updateData",
    	data: JSON.stringify(data),
    	dataType: 'json',
        timeout: 600000,
        success: function (data) {
        	alert(data);
        	console.log(data);
        },
        error: function (e) {
        	console.log(e);
        }
    })
}