// ========== SCROLL TO ==========
function scroll(element, to, duration) {
  if (duration < 0) {return;}
  var difference = to - element.scrollTop;
  var perTick = difference / duration * 10;

  setTimeout(function() {
  element.scrollTop = element.scrollTop + perTick;
  if (element.scrollTop === to) {return;}
  scroll(element, to, duration - 10);
  }, 10);
}
function scrollTo (to,duration) {
  scroll(document.body, to, duration);
  scroll(document.documentElement, to, duration);
}
