var j = jQuery.noConflict();
j(function() {
	
    j( ".datepicker" ).datepicker({
		dateFormat: "yy/mm/dd",
		direction: "down"
	});
	if (j(document).height() > $(window).height()) {
		j('footer').css('position','static');
	}
})