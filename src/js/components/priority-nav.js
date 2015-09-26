// priorityNav
function priorityNav (navClass, buttonText, restore) {
  var nav = kit(navClass);
  var res = typeof restore !== 'undefined' ? restore : 0;
  // var dis = typeof distory !== 'undefined' ? distory : 0;
  nav.find('ul').addClass('visible-links');
  nav.prepend('<button class="js-nav-toggle is-hidden" data-count="">' + buttonText + '</button>').append('<ul class="hidden-links is-hidden"></ul>');

  var nav = kit(navClass);
  var btn = kit(navClass + '> .js-nav-toggle');
  var vlink = kit(navClass + '> .visible-links');
  var hlink = kit(navClass + '> .hidden-links');

  var breaks = [];

  function updateNav() {
    var availableSpace = btn.hasClass('is-hidden') ? nav.outerWidth() : nav.outerWidth() - btn.outerWidth();

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

  function checkBP() {
    var ww = kit.win.W();
    if (res > 0) {
      if (ww >= res) {
        btn.show();
        updateNav();
      } else {
        var hlinks = kit(navClass + '> .hidden-links > li');
        for (var i = 0; i < hlinks.length; i++) {
          vlink.append(hlinks[i]);
        };
        breaks = [];
        btn.hide().attr("data-count", breaks.length);
      }
    // } else if (dis > 0) {
    //   if (ww >= dis) {
    //     updateNav();
    //   } else {
    //     var vlinks = kit(navClass + '> .visible-links > li');
    //     var hlinks = kit(navClass + '> .hidden-links > li');
    //     var a = vlinks.length;
    //     while (a > 0) {
    //       hlink.prepend(vlinks.last()[0]);
    //       a--;
    //     }
    //     breaks = [];
    //     btn.removeClass('is-hidden');
    //     btn.attr("data-count", hlinks.length);
    //   }
    } else {
      updateNav();
    }
  }
  
  winLoad(function () {
    checkBP();
  });
  winResize(function () {
    checkBP();
  });

  kit(navClass + '> .js-nav-toggle').click(function() {
    kit(navClass + '> .hidden-links').toggleClass('is-hidden');
  });
};