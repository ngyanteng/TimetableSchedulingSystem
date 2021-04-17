$(document).on('click', '.delete-subject-btn', function() {
	
    var row = $(this).closest('tr');    // Find the row
    var targetID = row.attr('data-id');

	$('[name="subject-id"]').attr('value', targetID);
	$('#delete-subject-modal').modal('show');
});

$(document).on('click', '.delete-lecturer-btn', function() {
	
    var row = $(this).closest('tr');    // Find the row
    var targetID = row.attr('data-id');

	$('[name="lecturer-id"]').attr('value', targetID);
	$('#delete-lecturer-modal').modal('show');
});


$(document).on('click', '.delete-class-btn', function() {
	
    var row = $(this).closest('tr');    // Find the row
    var targetID = row.attr('data-id');

	$('[name="class-id"]').attr('value', targetID);
	$('#delete-class-modal').modal('show');
});

$(document).on('click', '.delete-trimester-btn', function() {
	
    var row = $(this).closest('tr');    // Find the row
    var targetID = row.attr('data-id');

	$('[name="trimester-id"]').attr('value', targetID);
	$('#delete-trimester-modal').modal('show');
});