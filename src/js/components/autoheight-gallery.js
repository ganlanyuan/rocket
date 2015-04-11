// AUTO HEIGHT GALLERY
ready(function () {

  // get max
  // function getMaxOfArray(numArray) {
  //   return Math.max.apply(null, numArray);
  // }

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
      k(el).css('padding-bottom', containerH);
    });
  }
  if (k('[autoheight-gallery]').length > 0) {
    setInterval(autoHeightGallery, 200);
  }

});

