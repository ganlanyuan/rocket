// AUTO HEIGHT GALLERY
ready(function () {

  k('[autoheight-gallery]').css('height', k('[autoheight-gallery] > .inner').outerHeight() + 'px');
  // autoheight-gallery
  function autoHeightGallery() {
    var container = k('[autoheight-gallery]'),
        containerH = k('[autoheight-gallery]').outerHeight(),
        containerIH = k('[autoheight-gallery] > .inner').outerHeight();
    if (containerH === containerIH) {
      return;
    } else{
      container.css('height', containerIH + 'px');
    }
  }
  if (k('[autoheight-gallery]').length > 0) {
    setInterval(autoHeightGallery, 200);
  }

});

