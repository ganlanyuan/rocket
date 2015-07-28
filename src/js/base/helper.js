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
