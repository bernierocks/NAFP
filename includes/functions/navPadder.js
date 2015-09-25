function eqMenu(){
	var WW = $(window).width();
	var NW = $('#NP').width();
	var TW = 0;
	var IC = 0;
	var BRW = 0;
	var BLW = 0;
	$('#NP .nav>li>a').each(function(){
		PT = $(this).css('padding-top');
		PB = $(this).css('padding-b');
		TW += $(this).width();
		BRW += parseInt($(this).css('border-right-width'));
		BLW += parseInt($(this).css('border-left-width'));
		++IC;
	});
	TW = TW + BRW + BLW;
	var IP = (NW-TW)/(IC*2);
	if(WW<770){
		IP -= 2;
	} else {
		//If your padder is padding too much, subtract some from it with the following line.
		//Un-comment and subtract from the "Individual Padding" with -= or add to it with +=
		//IP -= ;
	}
	IP = Math.floor(IP);
	$('#NP .nav>li>a').css('padding-left',IP + 'px');
	$('#NP .nav>li>a').css('padding-right',IP + 'px');
	
}
$(window).load(function(){
	setTimeout(eqMenu(),100);
});
$(window).resize(function(){
	setTimeout(eqMenu(),100);
});
$('body').click(eqMenu);