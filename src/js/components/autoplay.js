// AUTOPLAY
var sliderAutoplay = function (selector, timeout, items, hoverPause) {
  timeout = typeof timeout !== 'undefined' ? timeout : 3000;
  hoverPause = typeof hoverPause !== 'undefined' ? hoverPause : true;

  function sliderAutoplayTimer () {
    var radiosSelectors = selector + ' > [type="radio"]',
        checkboxSelector = selector + ' > [type="checkbox"]',
        radios = k(radiosSelectors),
        len = typeof items !== 'undefined' ? items : radios.length,
        checkedIndex;

    // check radios
    if (len > 0) {
      // autoplay input is checked
      if (k(checkboxSelector)[0].checked) {
        for (var i = 0; i < len; i++) {
          if (radios.eq(i)[0].checked) {
            checkedIndex = i;
          }
        }

        radios.forEach(function (el) {
          el.checked = false;
        });

        if (checkedIndex === len - 1) {
          radios.eq(0)[0].checked = true;
        } else {
          radios.eq(checkedIndex + 1)[0].checked = true;
        }
      }
    }
  }

  // setInterval
  var autoPlayer = setInterval(function(){ sliderAutoplayTimer() }, timeout);

  if (hoverPause) {
    // clearInterval
    k(selector).mouseover(function() {
      clearInterval(autoPlayer);
    });
    k(selector).mouseout(function() {
      autoPlayer = 0;
      autoPlayer = setInterval(function(){ sliderAutoplayTimer() }, timeout);
    });
  }
};

// Usage:
// ready(function () {
//   sliderAutoplay('.js-autoplay', 1000);
// });
