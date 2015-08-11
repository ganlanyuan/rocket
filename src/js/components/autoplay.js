// AUTOPLAY
  var sliderAutoplay = function (timeout) {
    timeout = typeof timeout !== 'undefined' ? timeout : 3000;

    if (k('.js-autoplay').length > 0) {
      return window.setInterval(function () {
        var radios = k('.js-autoplay > [type="radio"]'),
            len = radios.length,
            checkedIndex;
        for (var i = 0; i < len; i++) {
          if (radios.eq(i)[0].checked) {
            checkedIndex = i;
          }
        }

        radios.removeAttr('checked');
        if (checkedIndex === len - 1) {
          radios.eq(0)[0].checked = true;
        } else {
          radios.eq(checkedIndex + 1)[0].checked = true;
        }
      }, timeout);
    }
  };
  // k('.js-autoplay').mouseover(function() {
  //   window.clearInterval(sliderAutoplay);
  // });

// Usage:
// ready(function () {
//   sliderAutoplay();
// })
