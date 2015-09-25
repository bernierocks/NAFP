//console.log('Script: Equal Height');
function getGroup(){
	var G = '';
	var GH = '';
	$('.equal-height').each(function(){
		G = $(this).data('group');
		GH = $(this).height();
		compareHeight(G);
	});
	
}
function compareHeight(G){
	var NH = 0; //new height
	var OH = 0; //old height
	$('.equal-height[data-group=\'' + G + '\']').each(function(){
		$(this).css('height','');
		OH = $(this).height();
		if(OH>NH){
			NH = OH;
		}
	});
	setHeight(NH, G);
}
function setHeight(NH, G){
	var WW = $(window).width();
	DT = $('.equal-height[data-group=\'' + G + '\']').data('to');
	if(DT){
		if(WW>DT){
			$('.equal-height[data-group=\'' + G + '\']').css({'min-height':NH});
		} else {
			$('.equal-height[data-group=\'' + G + '\']').css({'min-height':'auto'});
		}
	} else {
		$('.equal-height[data-group=\'' + G + '\']').css({'min-height':NH});
	}
	if ($('.equal-height[data-group=\'' + G + '\']').hasClass('vcenter')){
		vcenter();
	}
}

$(window).load(function(){
	//when the page loads
	getGroup();
	//after CKEditor has had time to do its thing.
	setTimeout(function(){getGroup();console.log('set timeout');},500);
});
$(window).on("click",function(){
	//On any page click - to help with slideUp/slideDown issues
	setTimeout(function(){getGroup();console.log('set timeout');},500);
});
$(window).resize(function(){
	//when someone resizes their browser
	getGroup();
});
//console.log('----go');

