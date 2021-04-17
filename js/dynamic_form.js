$(document).ready(function(){
	
    var addButton = $('.add-lecturer-btn'); //add button selector
    var wrapper = $('.add-lecturer'); //input field wrapper
	var divContent = $('#wrapper').html();
    var fieldHTML = '<div class="input-group"><span>'+divContent+'</span><button type="button" class="btn btn-danger input-group-btn remove-lecturer-btn"><i class="fas fa-user-minus"></i></button></div>'; //new input field html 
    var x = 1; //Initial field counter
    
    //when add button is clicked
	$(addButton).click(function(){
		x++; //increment field counter
		$(wrapper).append(fieldHTML); //add field html
    });
    
    //when remove button is clicked
    $(wrapper).on('click', '.remove-lecturer-btn', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //remove field html
        x--; //decrement field counter
    });
});