  // Scroll 1px to hide url bar if url is not a hashed target: http://remysharp.com/2010/08/05/doing-it-right-skipping-the-iphone-url-bar/#comment-360208
  /mobi/i.test(navigator.userAgent) && !location.hash && setTimeout(function () {
    if (!pageYOffset) window.scrollTo(0, 1);
  }, 1000);