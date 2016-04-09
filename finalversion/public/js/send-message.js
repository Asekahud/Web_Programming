$(document).ready(function(){ 
 $('.send-button').click(function(){ 
   $.ajax({ 
     url: '/user/send', 
     type: "post", 
     data: {'sender_id':$('input[name=sender_id]').val(), 'receiver_id': $('input[name=receiver_id]').val(),'content':$('textarea[name=content]').val()},      
   }); 
 }); 
});