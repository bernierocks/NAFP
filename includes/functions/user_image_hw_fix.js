$(function(){
	$('.user').find('img').each(function(){
		$(this).removeAttr('height');
		$(this).removeAttr('width');
		$(this).css({height:'auto','max-width':'100%'});
		var thisfloat = '';
		var thisfloat = $(this).css('float');
		if(thisfloat != ''){
			$(this).parent('.user').append('<div class="cb"></div>');
		}
	});
});