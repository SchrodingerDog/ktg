$(document).ready(function() {
		$(".fancybox")
		.fancybox({
			beforeShow: function () {
            /* Disable right click */
	            $.fancybox.wrap.bind("contextmenu", function (e) {
	                    return false; 
	            });
        	},
			padding:1,
			helpers	: {
				thumbs	: {
					width	: 50,
					height	: 50
				}
			}

		});
});