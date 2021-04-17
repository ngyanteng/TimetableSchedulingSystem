$(document).ready(function() {	
	$('#selectTrimesterForm').submit(function(event){
		selectTrimesterFormFilter();
		return false;
	});	
	
	$('#filterSubjectForm').submit(function(event){
		filterSubjectFormFilter();
		return false;
	});
	
	$('#filterLecturerForm').submit(function(event){
		filterLecturerFormFilter();
		return false;
	});
});

function selectTrimesterFormFilter(){
	var trimID = $('#trimester-code  option:selected').val();
	var trimCode = $('#trimester-code  option:selected').text();
	$('[name="trim-id"]').attr('value', trimID);
	$('[name="trim-code"]').attr('value', trimCode);
	
	if (trimID == 'none') {
		$('#page-title').text('Classes');
	}
	else {
		$('#page-title').text('Classes ('+trimCode+')');
	}	
	$('#trimester-modal').modal('hide');
	
	var table, tr, td, trimesterID, noResults;

	table = document.getElementById('classes-table');
	tr = table.getElementsByTagName('tr');
	noResults = true;

	// Loop through all table rows, and hide those who don't match the search query
	for (var i = 1; i < tr.length; i++) {
		td = tr[i];
		trimesterID = $(td).attr('data-trim');
		if (trimesterID == trimID) {
			$(tr[i]).removeClass('d-none');
			noResults = false;
		} 
		else {
			$(tr[i]).addClass('d-none');
		}
	}
	$('.btn-add').prop('disabled', false);
	$('.btn-import').prop('disabled', false);
	$('.btn-export').prop('disabled', false);
	
	if (trimID == 'none') {
		$(tr[tr.length-2]).removeClass('d-none');
		$(tr[tr.length-1]).addClass('d-none');
		$('.btn-add').prop('disabled', true);
		$('.btn-import').prop('disabled', true);
		$('.btn-export').prop('disabled', true);
			
	}
	else if (noResults){
		$(tr[tr.length-1]).removeClass('d-none');
	}
}

function filterSubjectFormFilter(){
	var subjCode = $('#subject-code  option:selected').val();
	
	$('#filter-subject-modal').modal('hide');
	
	var table, tr, td, trimesterID;

	table = document.getElementById('timetable-table');
	tr = table.getElementsByTagName('tr');

	// Loop through all table rows, and hide those who don't match the search query
	for (var i = 1; i < tr.length; i++) {
		td = tr[i].getElementsByTagName('td');
		for (var j = 1; j < td.length; j++) {
			div = td[j].getElementsByClassName('card');
			for (var k = 0; k < div.length; k++) {
				subjectCode = $(div[k]).attr('data-subj');
				console.log(div[k].length);
				if (subjectCode == subjCode || subjCode == 'none') {
					$(div[k]).removeClass('d-none');
				} 
				else {
					$(div[k]).addClass('d-none');
				}
			}
		}
	}
}

function filterLecturerFormFilter(){
	var lectCode = $('#lecturer-code  option:selected').val();
	
	$('#filter-lecturer-modal').modal('hide');
	
	var table, tr, td, trimesterID;

	table = document.getElementById('timetable-table');
	tr = table.getElementsByTagName('tr');

	// Loop through all table rows, and hide those who don't match the search query
	for (var i = 1; i < tr.length; i++) {
		td = tr[i].getElementsByTagName('td');
		for (var j = 1; j < td.length; j++) {
			div = td[j].getElementsByClassName('card');
			for (var k = 0; k < div.length; k++) {
				lecturerCode = $(div[k]).attr('data-lect');
				if (lecturerCode == lectCode || lectCode == 'none') {
					$(div[k]).removeClass('d-none');
				} 
				else {
					$(div[k]).addClass('d-none');
				}
			}
		}
	}
}