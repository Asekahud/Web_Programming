$(document).ready(function displayMessage(){ 
 $('.send-button').click(function(){ 
   $.ajax({ 
     url: '/message/display',
     data: {'sender_id':$('input[name=sender_id]').val(), 'receiver_id': $('input[name=receiver_id]').val()},
     dataType:'json',
     success:function(data) {
        alert("thank you");
     }
   }); 
 }); 
});