// priorityNav
function priorityNav (navClass, buttonText, restore, distory) {
  var restore = (typeof restore !== 'undefined' && typeof restore !== false && typeof restore !== null) ? restore : 0;
  var distory = (typeof distory !== 'undefined' && typeof distory !== false && typeof distory !== null) ? distory : 0;
  
  var nav = kit(navClass);

  if (nav.length > 0) {
    nav.find('ul').first().addClass('visible-links');
    nav.first().prepend('<button class="js-nav-toggle is-hidden" data-count="">' + buttonText + '</button>').append('<ul class="hidden-links is-hidden"></ul>');

    var nav = kit(navClass);
    var btn = kit(navClass + '> .js-nav-toggle');
    var vlinks = kit(navClass + '> .visible-links > li');

    // get breakpoints
    var breaks = [];
    for (var i = 0; i < vlinks.length; i++) {
      var last = breaks[breaks.length - 1],
          thisWidth = vlinks.eq(i).outerWidth(),
          newWidth = (last) ? last + thisWidth : thisWidth;
      breaks.push(newWidth);
    };

    // update nav
    function updateNav () {
      var outerWidth = nav.outerWidth(),
          availableSpace,
          target,
          current;

      var ww = kit.win.W();

      // get target, show / hide btn
      if (outerWidth >= breaks[breaks.length - 1] || ww < restore) {
        btn.addClass('is-hidden');
        availableSpace = outerWidth;
        target = breaks.length;
      } else {
        btn.removeClass('is-hidden');
        availableSpace = outerWidth - btn.outerWidth();

        if (ww < distory) {
          target = 0;
        } else {
          for (var i = 0; i < breaks.length; i++) {
            if (availableSpace >= breaks[i] && availableSpace < breaks[i + 1]) {
              target = i + 1;
            } else if (availableSpace < breaks[0]) {
              target = 0;
            }
          }
        }
      }

      // set current
      var vlinks = kit(navClass + '> .visible-links > li');
      if (vlinks.length) {
        current = vlinks.length;
      } else {
        current = 0;
      }

      // update
      if (target > current) {
        var a = current;
        while (a < target) {
          var vlink = kit(navClass + '> .visible-links');
          var hlinks = kit(navClass + '> .hidden-links > li');

          vlink.append(hlinks.first()[0]);
          a++;
        }
      } else if (target < current) {
        var a = current;
        while (a > target ) {
          var vlinks = kit(navClass + '> .visible-links > li');
          var hlink = kit(navClass + '> .hidden-links');

          hlink.prepend(vlinks.last()[0]);
          a--;
        }
      }

      // update data-count
      var hlinks = kit(navClass + '> .hidden-links > li'),
          count;

      if (hlinks.length) {
        count = hlinks.length;
      } else {
        count = 0;
      }
      btn.attr("data-count", count);
    }

    // run updateNav
    updateNav();
    winResize(function () { updateNav(); });

    // show / hide hidden-links
    kit(navClass + '> .js-nav-toggle').click(function() {
      kit(navClass + '> .hidden-links').toggleClass('is-hidden');
    });
  } else {
    console.log('"' + navClass + '" can\'t be found.');
  }
};