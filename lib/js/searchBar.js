$('.search-btn').click(function(){
	if($('.search-container').hasClass("show-search")){
		$('.search-container').removeClass("show-search");
	} else {
		$('.search-container').addClass("show-search");
	}
})