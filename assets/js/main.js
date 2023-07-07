$(document).ready(function() {
	
	$(window).scroll(function() {
		if ($(this).scrollTop() > 0){  
			$('.page-title').addClass("sticky");
		}
		else{
			$('.page-title').removeClass("sticky");
		}
	});

});