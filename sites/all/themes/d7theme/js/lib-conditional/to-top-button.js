(function ($) {

jQuery(document).ready(function($){

  $(window).scroll(function() {
  if($(this).scrollTop() > 300) {
  $("#toTop").fadeIn();
  } else {
  $("#toTop").fadeOut();
  }
  });

  $("#to-top").click(function() {
  $("body,html").animate({scrollTop:0},500);
  return false;
  });

});

} (jQuery));