function eqMenu(){
		var WW = $(window).width();
		var NW = $('.nav-wrapper').width();
		var TW = 0;
		var IC = 0
		$('.nav>li>a').each(function(){
			PT = $(this).css('padding-top');
			PB = $(this).css('padding-b');
			TW += $(this).width();
			++IC;
		});
		var IP = (NW-TW)/(IC*2);
		if(WW<770){
			IP -= 2;
		} else (
			//If your padder is padding too much, subtract some from it with the following line.
			//Un-comment and subtract from the "Individual Padding" with -= or add to it with +=
			//IP -= ;
		)
		IP = Math.floor(IP);
		$('.nav>li>a').css('padding-left',IP + 'px');
		$('.nav>li>a').css('padding-right',IP + 'px');
	
}
$(window).load(function(){
	setTimeout(eqMenu(),100);
});
$(window).resize(function(){
	setTimeout(eqMenu(),100);
});