(function ($) {

jQuery(document).ready(function($){

  $(window).scroll(function() {
  if($(this).scrollTop() > 300) {
  $("#toTop").fadeIn();
  } else {
  $("#toTop").fadeOut();
  }
  });

  $("#toTop").click(function() {
  $("body,html").animate({scrollTop:0},500);
  return false;
  });

});

} (jQuery));