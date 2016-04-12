$(document).ready(function (){
setInterval(checkDB,3000);
function checkDB(){ 
   $.ajax({
     type:'post',
     url: '/message/display',
     data: {'sender_id':$('input[name=sender_id]').val(), 'receiver_id': $('input[name=receiver_id]').val(),},
     dataType:'json',
     success:function(response) {
        for (var i=0; i < response.length;i++) {
          if (response[i].from_id ==  $('input[name=sender_id]').val()) {
            $('.chatspace').append("Me:"+response[i].content +"<br>");
          }
          else {
            $('.chatspace').append($('input[name=receiver_name]').val()+":"+response[i].content+"<br>");
          }           
        }
     },
     error: function(data) {
       alert("Not Yolooo");
     }    
   }); 
  }; 
}); 