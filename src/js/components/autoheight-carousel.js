// AUTO HEIGHT CAROUSEL
// get max
function getMaxOfArray(numArray) {
  return Math.max.apply(null, numArray);
}

function autoheightCarousel(selector) {
  if (kit(selector).length > 0) {
    var containers = kit(selector).find('.outer');

    // setting original height
    function setCarouselHeight () {
      containers.forEach(function(el) {
        var thisHeight = kit(el).outerHeight() + 'px';
        if (thisHeight === '0px') { thisHeight = 'auto'; }
        kit(el).css('height', thisHeight);
      });
    }
    winLoad(function () {
      setCarouselHeight();
    });

    // autoheight-carousel
    function autoheightCarouselCore() {
      containers.forEach(function(el) {
        var heights = [],
            containerH,
            containerL = kit(el).getLeft(),
            containerR = containerL + kit(el).outerWidth(),
            children = kit(el).find('li');
        children.forEach(function(ele) {
          var childL = kit(ele).getLeft(),
              childR = childL + kit(ele).outerWidth(),
              childH = kit(ele).outerHeight();
          if ( childL >= containerL && childL < containerR || childR > containerL && childR <= containerR ) {
            heights.push(childH);
          }
        });
        containerH = getMaxOfArray(heights) + 'px';
        kit(el).css('height', containerH);
      });
    }

    setInterval(autoheightCarouselCore, 200);
  }
}

