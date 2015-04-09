ready(function () {
  
  // open
  k('[data-icon-nav]').click(function() {
    k('body').addClass('off-canvas-show');
  });

  // close
  k('[data-page-cover],[data-offcanvas-close]').click(function() {
    k('body').removeClass('off-canvas-show');
  });

  // data-icon-haschild
  k('[data-icon-haschild]').click(function() {
    k(this).siblings('[data-offcanvas-subnav]').addClass('mb-subnav-show');
  });

  // nav-back
  k('[data-offcanvas-back]').click(function() {
    k(this).parent().removeClass('mb-subnav-show');
  });

  // set cover height
  function coverHeight() {
    var winH = k.win.H();
    k('[data-page-cover]').css('min-height', winH + 'px');
  }
  coverHeight();

  // on-resize
  window.onresize = function () {
    var winW = k.win.W();
    if (winW > 1023) {
      k('body').removeClass('off-canvas-show');
    }
    
    // set cover height
    coverHeight();
  };

});
