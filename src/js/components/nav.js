ready(function () {
  
  // open
  k('[data-icon-nav]').click(function() {
    k('body').addClass('mb-nav-show');
  });

  // close
  k('[data-page-cover],[data-nav-close]').click(function() {
    k('body').removeClass('mb-nav-show');
  });

  // data-icon-haschild
  k('[data-icon-haschild]').click(function() {
    k(this).siblings('[data-nav-subnav]').addClass('mb-subnav-show');
  });
  // nav-back
  k('[data-nav-back]').click(function() {
    k(this).parent().removeClass('mb-subnav-show');
  });

  // on-resize
  window.onresize = function () {
    var winW = k.win.W();
    if (winW > 1023) {
      k('body').removeClass('mb-nav-show');
    }
  };

});