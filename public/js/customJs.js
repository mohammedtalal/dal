// hide alert div after flash Message
$(document).ready(function(){
            setTimeout(function() {
            $('#alert-block').fadeOut('fast');
	}, 1300); // <-- time in milliseconds
});


// to add more input clickable
$(document).ready(function() {
  $(".add-more").click(function(){ 
      var html = $(".copy").html();
      $(".after-add-more").after(html);
  });
});
