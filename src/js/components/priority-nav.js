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

  // var vlink = kit(navClass + '> .visible-links > li');
  // var breakpoints = [kit(vlink[0]).outerWidth()];
  // for (var i = 1; i < vlink.length; i++) {
  //   var itemWidth = breakpoints[breakpoints.length - 1] + kit(vlink[i]).outerWidth();
  //   breakpoints.push(itemWidth);
  // };

  // function checkSpace() {
  //   var nav = kit(navClass);
  //   var btn = kit(navClass + '> .js-nav-toggle');
  //   var vlink = kit(navClass + '> .visible-links');
  //   var vlink = kit(navClass + '> .visible-links > li');
  //   var hlink = kit(navClass + '> .hidden-links > li');
  //   var hlink = kit(navClass + '> .hidden-links');

    
  //   var availableSpace = nav.outerWidth() - btn.outerWidth();
  //   if (availableSpace > breakpoints[breakpoints.length - 1]) {
  //     var a = 0;
  //     var h = hlink.length;
  //     while (a < h) {
  //       vlink.append(hlink[a]);
  //       a++;
  //     }
  //     btn.addClass('is-hidden');
  //   } else {
  //     var a;
  //     for (var i = 0; i < breakpoints.length; i++) {
  //       if (availableSpace > breakpoints[i] && availableSpace <= breakpoints[i + 1]) {
  //         a = i + 1;
  //       }
  //     };
  //     var b = kit(navClass + '> .visible-links > li').length;
  //     if (b > a) {
  //       while (b > a) {
  //         hlink.prepend(vlink.eq(b - 1)[0]);
  //         b--;
  //       }
  //     } else {
  //       console.log(b + ' | ' + a);
  //       while (b < a) {
  //         vlink.append(hlink.first()[0]);
  //         b++;
  //       }
  //     }
  //     btn.removeClass('is-hidden');
  //   }
  // }

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