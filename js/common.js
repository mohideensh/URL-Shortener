$(document).ready(function(){

	//Hide progress bar when initially
	$('#progress').hide();

	//This is to select result by cliking
	$('#result').on('click', function(){
		this.select();
	});

	//Hide error message
	$('#url').on('focus', function () {
		$('.form-control.custom').removeClass('error');
		$('.error-message').removeClass('show-error');
	});

	//Submit action
	$('#submit-url').on('click', function(e){

		e.preventDefault();
		var inputUrl = $('#url').val();

		if(validateUrl(inputUrl)){
			$('#progress').show();
			var data = {
			"inputURL": inputUrl
			};
			data = $(this).serialize() + "&" + $.param(data);
			$.ajax({
				type: "POST",
				dataType: "json",
				url: "app/shortner.php",
				data: data,
				success: function(data) {
					if(data){
						$('#progress').hide();
						$('#result').val(data);
						$('#result-container').addClass('show-result');
					}
				}
			});
			return false;
		}else{
			$('.form-control.custom').addClass('error');
			$('.error-message').addClass('show-error');
		}
	});
});

//Validate URL
function validateUrl(urlString) {
    var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
    return regexp.test(urlString);
}