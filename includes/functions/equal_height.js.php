<script type="text/javascript">
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
			$('.equal-height[data-group=\'' + G + '\']').height(NH);
		} else {
			$('.equal-height[data-group=\'' + G + '\']').height('auto');
		}
	} else {
		$('.equal-height[data-group=\'' + G + '\']').height(NH);
	}
	if ($('.equal-height[data-group=\'' + G + '\']').hasClass('vcenter')){
		vcenter();
	}
}
var MMS = '<?=$_GET['mms']?>';
$(window).ajaxComplete(function(){
	getGroup();
});
$(window).load(function(){
	if(MMS == 'X'){
		setTimeout(getGroup(),100);
	} else {
		getGroup();
	}
});
$(window).resize(function(){
	getGroup();
});
//console.log('----go');
</script>