// @codekit-prepend "../../src/js/kit.js"

ready(function () {
  // sliderAutoplay('.gallery-b', 2000);
  // sliderAutoplay('.carousel-g', 3000, 4);

  k('.btn').click(function() {
    k('.p').toggleClass('red');
  });
});

