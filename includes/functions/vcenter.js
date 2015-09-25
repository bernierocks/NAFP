console.log('Script: Vcenter');
function vert_center(){
	var DT = '';
	var WW = $(window).width();
	$('.vcenter').each(function(){
		var DT = $(this).data('to');
		var LM = $(this).css('margin-left');
		var RM = $(this).css('margin-right');
		$(this).css('margin','0px')
		var PH = 0; //parent height reset
		var PH = $(this).parent().height();
		var TH = $(this).height();
		var NM = (PH - TH)/2;
		if(LM == RM){
			var AM = NM + 'px ' + LM ;
		} else {
			var AM = NM + 'px ' + RM + ' ' + NM + 'px ' + LM;
		}
		console.log('DT: ' + DT);
		if(typeof DT != 'undefined'){	
			if(WW>=DT){
				$(this).css('margin', AM);
			} else {
				$(this).css('margin','auto ' + RM + ' auto' + LM);
			}
		} else {
			$(this).css('margin', AM);
		}
	});
}
$(window).resize(function(){
	vert_center();
});
$(window).load(function(){
	vert_center();
});
console.log('----go');