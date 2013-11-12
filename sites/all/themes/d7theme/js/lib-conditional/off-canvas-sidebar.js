/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - http://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth

(function ($, Drupal, window, document, undefined) {
  
  // Mobile Nav toggle
  $(document).ready(function() {

    enquire.register("screen and (max-width:47.5em)", {

        // OPTIONAL
        // If supplied, triggered when a media query matches.
        match : function() {
          offCanvas.reinit();
        },
                                    
        // OPTIONAL
        // If supplied, triggered when the media query transitions 
        // *from a matched state to an unmatched state*.
        unmatch : function() {
          // alert('leaving min 45em');
          offCanvas.destroy();
        },
        
        // OPTIONAL
        // If supplied, triggered once, when the handler is registered.
        setup : function() {
          // alert('set up min 45em');
          offCanvas.init();
        },
                                    
        // OPTIONAL, defaults to false
        // If set to true, defers execution of the setup function 
        // until the first time the media query is matched
        deferSetup : false,
                                    
        // OPTIONAL
        // If supplied, triggered when handler is unregistered. 
        // Place cleanup code here
        destroy : function() {
        }
          
    });

  });  // End Ready

  var offCanvas = {

    init : function () {
      var sidebarMenu = $('#sidebar-first');
      var sidebarNavToggle = $('#sidebar-toggle');
      var sidebarNavClose = $('#menu-close');
      var $body = $('body');
      var navTogglehtml = '<div class="sidebar-close">X</div>';
      
      $(sidebarNavToggle).bind('click', function(event){
        event.preventDefault();
        event.stopPropagation();
        $body.toggleClass('show-sidebar');
      });

      $(sidebarNavClose).bind('click', function(event){
        event.preventDefault();
        event.stopPropagation();
        this.click(sidebarNavToggle);
        $body.removeClass('show-sidebar');
      });

      if (Modernizr.touch) {
        var body = $('body');

          var element = document.getElementById('main');
          var openSidebar = Hammer(element).on("swipeleft", function(event) {
            if (body.hasClass('show-sidebar')) {
              body.removeClass('show-sidebar');
            }
          });
          var closeSidebar = Hammer(element).on("swiperight", function(event) {
              body.addClass('show-sidebar');
          });


        // possibly need to add <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
        document.addEventListener("touchstart", function(){}, true);
        //Then, you'll want to use CSS to add active states to our buttons and remove the tap highlight:
        // -webkit-tap-highlight-color: rgba(0,0,0,0);
      }
    },
    reinit : function () {
    },
    destroy : function () {
      $body.removeClass('show-sidebar');
    }
  };



})(jQuery, Drupal, this, this.document);