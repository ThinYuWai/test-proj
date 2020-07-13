'use strict';

var colors = [
    '#2196F3', '#32c787', '#00BCD4', '#ff5652',
    '#ffc107', '#ff85af', '#FF9800', '#39bbb0'
];

$(document).ready(function(){

	$('#send_btn').unbind('click').click(function() {
		sendMessage();
	});
});

function sendMessage() {
	
	var search = {};
    search["user_id"] = $("#user_id").val();
	search["message"] = $("#message").val();
	$( "#send_btn" ).prop( "disabled", true );
	$.ajax({
    	type: "POST",
    	contentType: "application/json",
    	url: "/chat/send_message",
    	data: JSON.stringify(search),
    	dataType: 'json',
        timeout: 600000,
        success: function (data) {
        	$("#message").val('');
        	$( "#send_btn" ).prop( "disabled", false );
        },
        error: function (e) {
        	console.log(e);
        }
    })
}

function timeConverter(UNIX_timestamp){
	  var a = new Date(UNIX_timestamp * 1000);
	  var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
	  var year = a.getFullYear();
	  var month = months[a.getMonth()];
	  var date = a.getDate();
	  var hour = a.getHours();
	  var min = a.getMinutes();
	  var sec = a.getSeconds();
	  var time = date + '/' + month + '/' + year + ' ' + hour + ':' + min ;
	  return time;
	}