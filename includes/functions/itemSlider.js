
function islideDown(S,D){
	S.siblings('.ISContent').slideDown(D, function(){
		S.removeClass('slUp');
		S.children('.siPlus').html('-');
	});
}
function islideUp(S,D){
	S.siblings('.ISContent').slideUp(D,function(){
		S.addClass('slUp');
		S.children('.siPlus').html('+');
	});
}
function itemSlide(SI){
	var WW = $(window).width();
	$SI = SI
	if($SI.attr('data-width')){
		var WLimit = SI.attr('data-width');
	} else {
		var WLimit = '990';
	}
	if(WW < WLimit){
		if ($SI.hasClass('slUp')){
			islideDown($SI,'fast');
		} else {
			islideUp($SI,'fast');
		}
	}
}
function itemUpCheck(){
	$('.ISControl').each(function(){
		WW = $(window).width();
		$SI = $(this);
		if($SI.attr('data-width')){
			var WLimit = SI.attr('data-width');
		} else {
			var WLimit = '990';
		}
		if(WW < WLimit){
			islideUp($SI,0);
			if($SI.children('span.siPlus').length <= 0){
				$SI.append('<span class="siPlus">+</span>');
			}
		} else {
			islideDown($SI,0);
			$SI.children().remove('span.siPlus');
		}
	});
}
$(window).bind('resize', function(){
   setTimeout(itemUpCheck, 100);
});
$(function(){
	itemUpCheck();
	$('.ISControl').click(function(){
		$SI = $(this);
		itemSlide($SI);
	});
});