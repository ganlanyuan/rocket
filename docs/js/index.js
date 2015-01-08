// @codekit-prepend "../../src/js/kit.js"

// jump
ready(function () {
  k('.site-nav a, .mb-nav a').forEach(function (el) {
    el.onclick = function () {
      var targetId = k(this).attr('href');
          targetPosition = k(targetId).getTop();
      scrollTo(targetPosition, 400);
      return false;
    }
  });
});

window.onscroll = function () {
  k('.topic').forEach(function (el) {
    var siteNavActive = k('.site-nav__level1 > li').eq(k.index(k('.topic'), el)),
        mbNavActive = k('.mb-nav__level1').eq(k.index(k('.topic'), el));
    if (k(el).reach('middle',0)) {
      if ( k.hasClass(siteNavActive, 'active') ) {
        return;
      } else {
        siteNavActive.addClass('active').siblings().removeClass('active');
        mbNavActive.addClass('active').siblings().removeClass('active');
      }
    } else {
      siteNavActive.removeClass('active');
      mbNavActive.removeClass('active');
    }
  })
};