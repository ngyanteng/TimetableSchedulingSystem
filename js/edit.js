$(document).on('click', '.edit-subject-btn', function() {
    var row = $(this).closest('tr'); // Find the row
    var targetID = row.attr('data-id');
	var subjectCode = row.find('.subject-code').text();
	var subjectName = row.find('.subject-name').text();
	var spec = row.find(".spec").text();
	var lectHours = row.find('.lect-hours').text();
	var tutoHours = row.find('.tuto-hours').text();
	
	// Set existing data value
	$('[name="subject-id"]').attr('value', targetID);
	$('[name="edit-subject-code"]').attr('value', subjectCode);
	$('[name="edit-subject-name"]').attr('value', subjectName);
	$('#'+spec).prop('checked', true);
	$('[name="edit-lecture-hours"]').attr('value', lectHours);
	$('[name="edit-tutorial-hours"]').attr('value', tutoHours);
	$('#edit-subject-modal').modal('show');
});

$(document).on('click', '.edit-lecturer-btn', function() {
    var row = $(this).closest('tr'); // Find the row
    var targetID = row.attr('data-id');
	var lecturerCode = row.find('.lecturer-code').text();
	var lecturerName = row.find('.lecturer-name').text();
	
	// Set existing data value
	$('[name="lecturer-id"]').attr('value', targetID);
	$('[name="edit-lecturer-code"]').attr('value', lecturerCode);
	$('[name="edit-lecturer-name"]').attr('value', lecturerName);
	$('#edit-lecturer-modal').modal('show');
});

$(document).on('click', '.edit-class-btn', function() {
    var row = $(this).closest('tr'); // Find the row
    var targetID = row.attr('data-id');
	var subjectCode = row.find('.subject-code').text();
	var classCode = row.find('.class-code').text();
	var lecturerCode = row.find('.lecturer-code').text();
	
	// Set existing data value
	$('[name="class-id"]').attr('value', targetID);
	$('option:contains("'+subjectCode+'")').prop('selected', true);
	$('[name="edit-class-code"]').attr('value', classCode);
	
	// Classes with more than one lecturer
	var res = lecturerCode.split("/");
	$('option:contains("'+res[0]+'")').prop('selected', true);

	$('#edit-class-modal').modal('show');
});

$(document).on('click', '.edit-trimester-btn', function() {
    var row = $(this).closest('tr'); // Find the row
    var targetID = row.attr('data-id');
	var trimesterCode = row.find('.trimester-code').text();
	var trimesterName = row.find('.trimester-name').text();
	
	// Set existing data value
	$('[name="trimester-id"]').attr('value', targetID);
	$('[name="edit-trimester-code"]').attr('value', trimesterCode);
	$('[name="edit-trimester-name"]').attr('value', trimesterName);
	$('#edit-trimester-modal').modal('show');
});