// hide alert div after flash Message
$(document).ready(function(){

	// to add more input field for company phone in(companies.create)
	$('#add-more').click(function () {
		$('#dynamic-field').append('<div class="form-group  col-md-6 alert"> <label>Phone</label> <button type="button" class="close" data-dismiss="alert">×</button> <input type="tel" class="form-control " id="phone" name="phone[]" pattern="[0-9]{11}" >  </div>')
	});


    setTimeout(function() {
    	$('#alert-block').fadeOut('fast');
	}, 1300); // <-- time in milliseconds


  // real time filteration
  var $rows = $('#categories-table tbody tr');
  $('#search').keyup(function() {
      var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
      
      $rows.show().filter(function() {
          var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
          return !~text.indexOf(val);
      }).hide();
  })  

});
