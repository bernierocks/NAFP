//console.log('Script: linkConverter');
$(function(){
	$('.link-convert').each(function(){
		var NA = '<ul class="quick-links">';
		$(this).children('a').each(function(){
			HREF = $(this).attr('href');
			TEXT = $(this).text();
			NA += '<li><a href="' + HREF + '">' + TEXT + '</a></li>'
		});
		NA += '</ul>';
		$(this).html(NA);
	});
});
//console.log('----go'); 