var j = jQuery.noConflict();
j(function() {
	
    j( ".datepicker" ).datepicker({
		dateFormat: "yy/mm/dd",
		direction: "down"
	});
	if (j(document).height() > $(window).height()) {
		j('footer').css('position','static');
	}

	j(".tab_item").click(function(){
		let idName = j(this).parent.attr('id');
		alert(idName);
		j(`#${idName}`).addCss("li-bg-color");
		
	})

	$('.tabrow > li').find('a').each(function() {
		let loc = window.location.pathname;
		console.log(loc);
		let idName = j(`a[href='${loc}']`).parent().attr('id');
		j(`#${idName}`).addClass("li-bg-color");
		
	 });
})