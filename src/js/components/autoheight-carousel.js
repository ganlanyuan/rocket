// AUTO HEIGHT CAROUSEL
ready(function () {

  // get max
  function getMaxOfArray(numArray) {
    return Math.max.apply(null, numArray);
  }

  var containers = k('[autoheight-carousel]');

  // setting original height
  function setContainerHeight () {
    containers.forEach(function(el) {
      var thisHeight = k(el).outerHeight() + 'px';
      console.log(thisHeight);
      k(el).css('height', thisHeight);
    });
  }
  window.onload = function() { setContainerHeight(); }

  // autoheight-carousel
  function autoHeightCarousel() {
    containers.forEach(function(el) {
      var heights = [],
          containerH,
          containerL = k(el).getLeft(),
          containerR = containerL + k(el).outerWidth(),
          children = k(el).find('li');
      children.forEach(function(ele) {
        var childL = k(ele).getLeft(),
            childR = childL + k(ele).outerWidth(),
            childH = k(ele).outerHeight();
        if ( childL >= containerL && childL < containerR || childR > containerL && childR <= containerR ) {
          heights.push(childH);
        }
      });
      containerH = getMaxOfArray(heights) + 'px';
      k(el).css('height', containerH);
    });
  }
  if (k('[autoheight-carousel]').length > 0) {
    setInterval(autoHeightCarousel, 200);
  }
});

