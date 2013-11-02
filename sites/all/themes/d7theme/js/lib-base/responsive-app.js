(function ($, Drupal, window, document, undefined) {

  /*
    @media breakpoints based on SASS breakpoints

    ** Enquire.js utilizes the matchMedia Javascript API: 
    Using enquire JS http://wicky.nillia.ms/enquire.js/
    https://developer.mozilla.org/en-US/docs/Web/API/Window.matchMedia
    https://developer.mozilla.org/en-US/docs/Web/Guide/CSS/Testing_media_queries?redirectlocale=en-US&redirectslug=DOM%2FUsing_media_queries_from_code

    ** Simple State Manager utilizes window width detection

    Typical theme breakpoints:
    Minimum Width: 320px / 20em;
    Phone: 480px / 30em;
    Tablet Small: 600px / 37.5em;
    Tablet: 760px / 47.5em;
    Desktop: 980px / 61.25em;

  */
// Enquire Variables
var breakMobile = "screen and (max-width:47.499em)";
var breakDesktop = "screen and (min-width:47.5em)";

// Simple State Manager Variables
// var breakMobileMax = '47.299em';
// var breakMobileMin = '47.5em';
// var breakDesktopMax = '61.2499em';
// var breakDesktopMin = '61.25em';


// Functions to be executed on all breakpoints
// ...place code here ...

// IF YOU NEED ENQUIRE JS & 
enquire.register(breakMobile, {

    // OPTIONAL
    // If supplied, triggered when a media query matches.
    match : function() {
      // alert('min 45em');

    },
                                
    // OPTIONAL
    // If supplied, triggered when the media query transitions 
    // *from a matched state to an unmatched state*.
    unmatch : function() {
      // alert('leaving min 45em');
    },
    
    // OPTIONAL
    // If supplied, triggered once, when the handler is registered.
    setup : function() {
      // alert('set up min 45em');
    },
                                
    // OPTIONAL, defaults to false
    // If set to true, defers execution of the setup function 
    // until the first time the media query is matched
    deferSetup : true,
                                
    // OPTIONAL
    // If supplied, triggered when handler is unregistered. 
    // Place cleanup code here
    destroy : function() {}
      
});


// IF YOU PREFER SIMPLE STATE MANAGER

// ssm.addStates([
//     {
//         id: 'mobile',
//         maxWidth: breakMobileMax,
//         onEnter: function(){
//             console.log('enter mobile');
//         }
//     },
//     {
//         id: 'tablet',
//         minWidth: breakMobileMin,
//         maxWidth: breakDesktopMax,
//         onEnter: function(){
//             console.log('enter tablet');
//         }
//     },
//     {
//         id: 'desktop',
//         minWidth: breakDesktopMin,
//         onEnter: function(){
//             console.log('enter desktop');
//         }
//     }
// ]);



})(jQuery, Drupal, this, this.document);
