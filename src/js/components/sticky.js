(function (window, undefined) {
  sticky = function (selector) {

    ready(function () {
    // alert('success');
    
    // k(selector).css('border', '1px solid red');
    });
    // sticker-ad
    // *1* 48 = normal nav height
    // *2* 44 = fixed nav height
    // *3* 25 = ad margin-bottom
    // var navOT = k('.nav').getTop();
    // window.onload = function(){
    //   var stickerAd = k('.sticker-ad'),
    //       stickerAdPosition = stickerAd.getTop() - 48 - 44, // *1*, 2** 
    //       panelBottom = k('.wrapper-article').getTop() + k('.wrapper-article').outerHeight() - 250 - 48 - 44 - 25, // *1*, *2* ,*3*
    //       stickerAdFollow = panelBottom + 44 + 'px'; // *2*
    //   window.onscroll = function(){
    //     if (k.win.ST() > stickerAdPosition && k.win.ST() <= panelBottom) {
    //       stickerAd.addClass('fixed')
    //         .removeClass('followed')
    //         .css('top', '44px');
    //     } else if (k.win.ST() > panelBottom) {
    //       stickerAd.addClass('followed')
    //         .removeClass('fixed')
    //         .css('top', stickerAdFollow);
    //     } else {
    //       stickerAd.removeClass('fixed')
    //         .removeClass('followed');
    //     }
        
    //     // fix nav on scroll
    //     var ww = k.win.W(),
    //         ws = k.win.ST();
    //     if (ww >= 768 && ws > navOT) {
    //       k('.nav').addClass('fixed');
    //     } else{
    //       k('.nav').removeClass('fixed');
    //     }
    //   };
    // };

  };
})(window);

// sticky('.container');