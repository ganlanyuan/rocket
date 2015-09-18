// validation-helper

ready(function () {
  kit('input:not([type="radio"]):not([type="checkbox"]), textarea').blur(function() {
    kit(this).addClass('js-blur');
  });
  kit('input:not([type="radio"]):not([type="checkbox"]), textarea').focus(function() {
    kit(this).removeClass('js-blur');
  });
});
