// ========== HELPER FUNCTIONS ==========
function toCamelCase(str) {
  return str.replace(/-([a-z])/ig, function( all, letter ) {
    return letter.toUpperCase();
  });
}

var getStyle = (function() {
  if (typeof getComputedStyle !== "undefined") {
    return function(el, cssProp) {
      return window.getComputedStyle(el, null).getPropertyValue(cssProp);
    };
  } else {
    return function(el, cssProp) {
      return el.currentStyle[toCamelCase(cssProp)];
    };
  }
}());

// get px value
function getPxValue (val) {
  var unit = val.match(/\D+$/),
      valPx;
  if (unit === 'em') {
    valPx = Math.round(val.replace(/[A-Za-z]+/, '') * 16);
  } else {
    valPx = val.replace(/[A-Za-z]+/, '');
  }

  return Number(valPx);
}

// bind window load
function winLoad (fn) {
  if (typeof addEventListener !== "undefined") {
    window.addEventListener('load', fn, false);
  } else if (typeof attachEvent !== "undefined") {
    window.attachEvent('onload', fn);
  }
}

// bind window resize
function winResize (fn) {
  if (typeof addEventListener !== "undefined") {
    window.addEventListener('resize', fn, false);
  } else if (typeof attachEvent !== "undefined") {
    window.attachEvent('onresize', fn);
  }
}

// bind window scroll
function winScroll (fn) {
  if (typeof addEventListener !== "undefined") {
    window.addEventListener('scroll', fn, false);
  } else if (typeof attachEvent !== "undefined") {
    window.attachEvent('onscroll', fn);
  }
}

// bind keydown
function keyDown (fn) {
  if (typeof addEventListener !== "undefined") {
    document.addEventListener('keydown', fn, false);
  } else if (typeof attachEvent !== "undefined") {
    document.attachEvent('onkeydown', fn);
  }
}

// check keydown
function checkKeyDown (code, callback) {
  function checkKey(e) {
      e = e || window.event;
      if (e.keyCode == code) {
        callback();
      }
  }
  keyDown(checkKey);
}
// checkKeyDown(37, alertThis);
// function alertThis () {
//   alert('left arrow');
// }

var lastScrollTop = 0,
    scrollDirection;
winScroll(function() {
  st = k.win.ST();
  if(st < lastScrollTop) {
    scrollDirection = 'up';
  } else {
    scrollDirection = 'down';
  }
  lastScrollTop = st;

  return scrollDirection;
});
