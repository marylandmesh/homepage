//
//	common.js
//

$(document).ready(function(){
	// Hide every instance of more
	$(".more").hide();
	
	// Hide/unhide every instance of more
	$(".readmore").click(function() {
		$(this).next().slideToggle(500);
	});
	
});