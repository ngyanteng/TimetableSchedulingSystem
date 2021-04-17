$(document).ready(function() {	
	//Subjects page forms submit event
	$('#newSubjectForm').submit(function(event){
		submitNewSubjForm();
		return false;
	});
	$('#editSubjectForm').submit(function(event){
		submitEditSubjForm();
		return false;
	});
	$('#deleteSubjectForm').submit(function(event){
		submitDeleteSubjForm();
		return false;
	});
	$('#multiDeleteSubjectForm').submit(function(event){
		submitMultiDeleteSubjForm();
		return false;
	});
	
	//Lecturers page forms submit event
	$('#newLecturerForm').submit(function(event){
		submitNewLectForm();
		return false;
	});
	$('#editLecturerForm').submit(function(event){
		submitEditLectForm();
		return false;
	});
	$('#deleteLecturerForm').submit(function(event){
		submitDeleteLectForm();
		return false;
	});
	$('#multiDeleteLecturerForm').submit(function(event){
		submitMultiDeleteLectForm();
		return false;
	});
	
	//Classes page forms submit event
	$('#newClassForm').submit(function(event){
		submitNewClassForm();
		return false;
	});
	$('#editClassForm').submit(function(event){
		submitEditClassForm();
		return false;
	});
	$('#deleteClassForm').submit(function(event){
		submitDeleteClassForm();
		return false;
	});
	$('#multiDeleteClassForm').submit(function(event){
		submitMultiDeleteClassForm();
		return false;
	});
	
	//Trimesters page forms submit event
	$('#newTrimesterForm').submit(function(event){
		submitNewTrimForm();
		return false;
	});
	$('#editTrimesterForm').submit(function(event){
		submitEditTrimForm();
		return false;
	});
	$('#deleteTrimesterForm').submit(function(event){
		submitDeleteTrimForm();
		return false;
	});
	$('#multiDeleteTrimesterForm').submit(function(event){
		submitMultiDeleteTrimForm();
		return false;
	});
	
	
});

//Subjects page forms ajax submit
function submitNewSubjForm(){
	$.ajax({
		method: 'POST',
		url: '/TimetableSchedulingSystem/src/form/form_new.php',
		data: $('form#newSubjectForm').serialize(),
		success: function(response) {
			$('#new-subject-modal').modal('hide');
			window.location.reload();
		},
        error: function() {
			console.log('Error');
		}
	});
}

function submitEditSubjForm(){
	$.ajax({
		method: 'POST',
		url: '/TimetableSchedulingSystem/src/form/form_edit.php',
		data: $('form#editSubjectForm').serialize(),
		success: function(response) {
			$('#edit-subject-modal').modal('hide');
			window.location.reload();
		},
        error: function() {
			console.log('Error');
		}
	});
}

function submitDeleteSubjForm(){
	$.ajax({
		method: 'POST',
		url: '/TimetableSchedulingSystem/src/form/form_delete.php',
		data: $('form#deleteSubjectForm').serialize(),
		success: function(response) {
			$('#delete-subject-modal').modal('hide');
			window.location.reload();
		},
        error: function() {
			alert('Error');
		}
	});
}

function submitMultiDeleteSubjForm(){
	$.ajax({
		method: 'POST',
		url: '/TimetableSchedulingSystem/src/form/form_multi_delete.php',
		data: $('form#multiDeleteSubjectForm').serialize(),
		success: function(response) {
			$('#multi-delete-subject-modal').modal('hide');
			window.location.reload();
		},
        error: function() {
			alert('Error');
		}
	});
}

//Lecturers page forms ajax submit
function submitNewLectForm(){
	$.ajax({
		method: 'POST',
		url: '/TimetableSchedulingSystem/src/form/form_new.php',
		data: $('form#newLecturerForm').serialize(),
		success: function(response) {
			$('#new-lecturer-modal').modal('hide');
			window.location.reload();
		},
        error: function() {
			alert('Error');
		}
	});
}

function submitEditLectForm(){
	$.ajax({
		method: 'POST',
		url: '/TimetableSchedulingSystem/src/form/form_edit.php',
		data: $('form#editLecturerForm').serialize(),
		success: function(response) {
			$('#edit-lecturer-modal').modal('hide');
			window.location.reload();
		},
        error: function() {
			alert('Error');
		}
	});
}

function submitDeleteLectForm(){
	$.ajax({
		method: 'POST',
		url: '/TimetableSchedulingSystem/src/form/form_delete.php',
		data: $('form#deleteLecturerForm').serialize(),
		success: function(response) {
			$('#delete-lecturer-modal').modal('hide');
			window.location.reload();
		},
        error: function() {
			alert('Error');
		}
	});
}

function submitMultiDeleteLectForm(){
	$.ajax({
		method: 'POST',
		url: '/TimetableSchedulingSystem/src/form/form_multi_delete.php',
		data: $('form#multiDeleteLecturerForm').serialize(),
		success: function(response) {
			$('#multi-delete-lecturer-modal').modal('hide');
			window.location.reload();
		},
        error: function() {
			alert('Error');
		}
	});
}

//Classes page forms ajax submit
function submitNewClassForm(){
	$.ajax({
		method: 'POST',
		url: '/TimetableSchedulingSystem/src/form/form_new.php',
		data: $('form#newClassForm').serialize(),
		success: function(response) {
			$('#new-class-modal').modal('hide');
			window.location.reload();
		},
        error: function() {
			alert('Error');
		}
	});
}

function submitEditClassForm(){
	$.ajax({
		method: 'POST',
		url: '/TimetableSchedulingSystem/src/form/form_edit.php',
		data: $('form#editClassForm').serialize(),
		success: function(response) {
			$('#edit-class-modal').modal('hide');
			window.location.reload();
		},
        error: function() {
			alert('Error');
		}
	});
}

function submitDeleteClassForm(){
	$.ajax({
		method: 'POST',
		url: '/TimetableSchedulingSystem/src/form/form_delete.php',
		data: $('form#deleteClassForm').serialize(),
		success: function(response) {
			$('#delete-class-modal').modal('hide');
			window.location.reload();
		},
        error: function() {
			alert('Error');
		}
	});
}

function submitMultiDeleteClassForm(){
	$.ajax({
		method: 'POST',
		url: '/TimetableSchedulingSystem/src/form/form_multi_delete.php',
		data: $('form#multiDeleteClassForm').serialize(),
		success: function(response) {
			$('#multi-delete-class-modal').modal('hide');
			window.location.reload();
		},
        error: function() {
			alert('Error');
		}
	});
}

//Trimesters page forms ajax submit
function submitNewTrimForm(){
	$.ajax({
		method: 'POST',
		url: '/TimetableSchedulingSystem/src/form/form_new.php',
		data: $('form#newTrimesterForm').serialize(),
		success: function(response) {
			$('#new-trim-modal').modal('hide');
			window.location.reload();
		},
        error: function() {
			alert('Error');
		}
	});
}

function submitEditTrimForm(){
	$.ajax({
		method: 'POST',
		url: '/TimetableSchedulingSystem/src/form/form_edit.php',
		data: $('form#editTrimesterForm').serialize(),
		success: function(response) {
			$('#edit-trim-modal').modal('hide');
			window.location.reload();
		},
        error: function() {
			alert('Error');
		}
	});
}

function submitDeleteTrimForm(){
	$.ajax({
		method: 'POST',
		url: '/TimetableSchedulingSystem/src/form/form_delete.php',
		data: $('form#deleteTrimesterForm').serialize(),
		success: function(response) {
			$('#delete-trim-modal').modal('hide');
			window.location.reload();
		},
        error: function() {
			alert('Error');
		}
	});
}

function submitMultiDeleteTrimForm(){
	$.ajax({
		method: 'POST',
		url: '/TimetableSchedulingSystem/src/form/form_multi_delete.php',
		data: $('form#multiDeleteTrimesterForm').serialize(),
		success: function(response) {
			$('#multi-delete-trimester-modal').modal('hide');
			window.location.reload();
		},
        error: function() {
			alert('Error');
		}
	});
}