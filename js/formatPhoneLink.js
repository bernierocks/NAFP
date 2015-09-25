$(function(){
	$('a.phone-link').each(function(){
		var PN = $(this).html();
		var NN = PN.replace(/[^0-9]/g, '');
		$(this).attr('href','tel:' + NN);
	})
});