jQuery(function ($) {
	$(window).scroll(function (evt) {
		if ($(window).width() > 767) {
			var topOffset = -parseInt(0.60*$(window).scrollTop());
			$('#bootstrap-post-parallax-header-widget').find('.parallax-bg').css('background-position', 'center ' + topOffset + 'px');
		}
	});
	
	var $grid = $('#bootstrap-posts-panels-widget').find('.grid').masonry({
		// set itemSelector so .grid-sizer is not used in layout
		itemSelector: '.grid-item'
		// use element for option
		//columnWidth: '.grid-sizer',
		//percentPosition: true
	});
	
	$('#bootstrap-posts-panels-widget').find('.infinite-scroll-container').bind('scroll-set-loaded', function () {
		console.log('loaded');
		$grid.masonry('destroy');
		$grid.masonry();
	});
});