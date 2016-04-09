$("#searchterm").keyup(function() 
{ 
 $( "#searchterm" ).autocomplete({ 
   source: "search/autocomplete", 
   minLength: 3, 
   select: function(event, ui) { 
      $('#searchterm').val(ui.item.value); 
    } 
  }); 
});