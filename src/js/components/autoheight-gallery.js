// AUTO HEIGHT GALLERY
ready(function () {

  var containers = k('[autoheight-gallery]');

  // autoheight-gallery
  function autoHeightGallery() {
    containers.forEach(function(el) {
      var containerH,
          children = k(el).find('li');
      children.forEach(function(ele) {
        var childZindex = k(ele).getCurrentStyle('z-index') + '',
            childH = k(ele).outerHeight();
        if ( childZindex === '8') {
          containerH = childH + 'px';
        }
      });
      k(el).css('height', containerH);
    });
  }
  if (k('[autoheight-gallery]').length > 0) {
    setInterval(autoHeightGallery, 200);
  }

});

