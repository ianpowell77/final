$('html').append("<div class=\"message\"><div class=\"message-header\"></div><div class=\"message-description\"></div></div>");

$('.add-button').click(function(){
	$('.message-header').html("<h2>Thank You!</h2>");
	$('.message-description').html("<p>Your item has been added to the cart.</p>");
	$('.message').addClass("show");

	// toggle class "shown" on
	setTimeout(function() {
		$('.message').removeClass("show");
		// toggle class shown off
	}, 2000);
});