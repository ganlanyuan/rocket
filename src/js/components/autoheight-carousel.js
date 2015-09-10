// AUTO HEIGHT CAROUSEL
// get max
function getMaxOfArray(numArray) {
  return Math.max.apply(null, numArray);
}

function autoheightCarousel(selector) {
  if (k(selector).length > 0) {
    var containers = k(selector).find('.outer');

    // setting original height
    function setCarouselHeight () {
      containers.forEach(function(el) {
        var thisHeight = k(el).outerHeight() + 'px';
        if (thisHeight === '0px') { thisHeight = 'auto'; }
        k(el).css('height', thisHeight);
      });
    }
    winLoad(function () {
      setCarouselHeight();
    })

    // autoheight-carousel
    function autoheightCarouselCore() {
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

    setInterval(autoheightCarouselCore, 200);
  }
};

