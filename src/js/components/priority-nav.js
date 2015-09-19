// priorityNav
var priorityNav = function (navClass, buttonText) {
  var nav = kit(navClass);
  nav.find('ul').addClass('visible-links');
  nav.prepend('<button class="js-nav-toggle is-hidden" data-count="">' + buttonText + '</button>').append('<ul class="hidden-links is-hidden"></ul>');

  var nav = kit(navClass);
  var btn = kit(navClass + '> .js-nav-toggle');
  var vlink = kit(navClass + '> .visible-links');
  var hlink = kit(navClass + '> .hidden-links');

  var breaks = [];

  function updateNav() {
    var availableSpace = nav.outerWidth() - btn.outerWidth();

    // The visible list is overflowing the nav
    if(vlink.outerWidth() > availableSpace) {
      var vlinks = kit(navClass + '> .visible-links > li');

      // Record the width of the list
      breaks.push(vlink.outerWidth());

      // Move item to the hidden list
      hlink.prepend(vlinks.last()[0]);

      // Show the dropdown btn
      btn.removeClass('is-hidden');

    // The visible list is not overflowing
    } else {
      var hlinks = kit(navClass + '> .hidden-links > li');

      // There is space for another item in the nav
      if(availableSpace > breaks[breaks.length-1]) {

        // Move the item to the visible list
        vlink.append(hlinks.first()[0]);
        breaks.pop();
      }

      // Hide the dropdown btn if hidden list is empty
      if(breaks.length < 1) {
        btn.addClass('is-hidden');
        hlink.addClass('is-hidden');
      }
    }

    // Keep counter updated
    btn.attr("data-count", breaks.length);

    // Recur if the visible list is still overflowing the nav
    if(vlink.outerWidth() > availableSpace) {
      updateNav();
    }

  }
  
  winLoad(function () {
    updateNav();
  });
  winResize(function () {
    updateNav();
  });

  kit(navClass + '> .js-nav-toggle').click(function() {
    kit(navClass + '> .hidden-links').toggleClass('is-hidden');
  });
};