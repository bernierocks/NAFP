<?
$facebook_ID = 'CHESAPEAKEWEA';
echo '<iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2F'.$facebook_ID.'&width=600&colorscheme=light&show_faces=true&border_color&stream=true&header=true&height=435" scrolling="yes" frameborder="0" style="border:none; overflow:hidden; width:600px; height:430px; background: white; float:left; " allowtransparency="true">
</iframe>';
?>

Styles for responsiveness 
.fb_feed_wrapper {
	width: auto;
}	
.fb_feed_wrapper iframe {
/* for responsiveness */
	width: 100%!important;
	float: none!important;
}
.pam {
/* removes Facebook header inside i-frame */
	display: none;
}