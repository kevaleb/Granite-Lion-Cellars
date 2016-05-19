/**
 * main js 
 *
 */
(function(self)
{
	
	
	/**
	 * global go back function used in error pages
	 *
	 * @return {void}
	 */
	self.goBack = function()
	{
		window.history.back();
	};
	
	
	/**
	 * main application function for settting document and window calls
	 *
	 * @return {void}
	 */
	function main()
	{
		
		// add document ready calls to this function
		$(document).ready(function()
		{
				
		});
		

		// Add Class to header on scroll		
		$(window).scroll(function() 
		{
			var scroll = $(window).scrollTop();

			if (scroll >= 50) 
			{
				$("#main-nav").addClass("dark");
			}
			else 
			{
				$("#main-nav").removeClass("dark");
			}
		});


		// By Chris Coyier & tweaked by Mathias Bynens
		$(function() 
		{
			// Find all YouTube videos
			var $allVideos = $("iframe[src^='https://www.youtube.com']"),

			// The element that is fluid width
			$fluidEl = $(".video");

			// Figure out and save aspect ratio for each video
			$allVideos.each(function() 
			{
				// and remove the hard coded width/height
				$(this).data('aspectRatio', this.height / this.width).removeAttr('height').removeAttr('width');
			});

			// When the window is resized
			// (You'll probably want to debounce this)
			$(window).resize(function()
			{
				var newWidth = $fluidEl.width();
			
				// Resize all videos according to their own aspect ratio
				$allVideos.each(function() 
				{
					var $el = $(this);
					$el.width(newWidth).height(newWidth * $el.data('aspectRatio'));
				});

			// Kick off one resize to fix all videos on page load
			}).resize();
		});
	}

	// call main function
	main();

})(this);




