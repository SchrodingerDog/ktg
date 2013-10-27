$(document).ready(function() {
	var pics = ['/background_pics/1.jpg', '/background_pics/2.jpg', '/background_pics/3.jpg', '/background_pics/4.jpg'];
	var bg = Math.floor((Math.random()*pics.length));
	$('.bg').css('background-image', 'url(/ktg'+pics[bg]+')');
	$('.bg').fadeIn('slow');
});