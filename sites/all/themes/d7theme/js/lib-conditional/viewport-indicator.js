(function ($) {

  'use strict';

  /**
   * Renders a widget for displaying the current width of the browser.
   */
  Drupal.behaviors.d7themeBrowserWidth = {
    attach: function (context) {
      $('body', context).once('resize.browser-width', function () {
        var $indicator = $('<div class="browser-width" />').appendTo(this);

        // Bind to the window.resize event to continuously update the width.
        $(window).bind('resize.browser-width', function () {
        	var convertToEms = '';

			// Non-webkit browsers include the scrollbar width in their CSS media query calculations
			if( !$.browser.webkit  ) {

				var currentWidth = $(window).width();
				var scrollBarWidth = window.innerWidth - $(this).width();

				currentWidth = currentWidth + scrollBarWidth;
				convertToEms = currentWidth / 16;

				$indicator.text(currentWidth + 'px, ' + convertToEms + "em");

			} else {
				var thisWidth = $(this).width();
				convertToEms = thisWidth / 16;

				$indicator.text(thisWidth + 'px, ' + convertToEms + " em");

			}

        }).trigger('resize.browser-width');
      });
    }
  };

})(jQuery);