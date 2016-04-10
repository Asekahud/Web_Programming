$(document).ready(function displayMessage(){ 
 $('.send-button').click(function(){ 
   $.ajax({ 
     url: '/message/display', 
     type: "GET", 
     data: {'sender_id':$('input[name=sender_id]').val(), 'receiver_id': $('input[name=receiver_id]').val(),},
     success:function(data) {
       $('textarea[name=content]').val(data);
     }
   }); 
 }); 
});