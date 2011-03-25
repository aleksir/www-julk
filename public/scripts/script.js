/* Javascriptit sivustolle */

$(function() {
	
	$(".close_btn").append( $('<span>',{
		/*'alt' : 'x',
		"src" : "tyyli/kansio.png",*/
		"class" : 'right-corner close',
	}) );
	
	$(".close").click(function() {
		$(this).parent().addClass('hidden');
	});
	
    $("#kirjaudu").click(function(){
		var login_form = $("#login_form");
		if ( login_form.hasClass('hidden') ) {
			login_form.removeClass('hidden');
		} else {
			login_form.addClass('hidden');
		}
		return false; //ei seurata linkkiä
	});
});