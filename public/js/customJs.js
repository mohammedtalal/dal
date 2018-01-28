// hide alert div after flash Message
$(document).ready(function(){

	// to add more input field for company phone in(companies.create)
	$('#add-more').click(function () {
		$('#dynamic-field').append('<div class="form-group  col-md-6 alert"> <label>Phone</label> <button type="button" class="close" data-dismiss="alert">×</button> <input type="number" class="form-control " id="phone" name="phone[]"  </div>')
	});


    setTimeout(function() {
    	$('#alert-block').fadeOut('fast');
	}, 1300); // <-- time in milliseconds

  
  // to use data tables 
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })

});
