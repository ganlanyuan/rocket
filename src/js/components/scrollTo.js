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
  var wh = k.win.H(),
      bh = k('body').outerHeight(),
      total = to + wh,
      goal = bh - wh - 1;
  if (total > bh) { to = goal; };
  
  to = Math.round(to);

  scroll(document.body, to, duration);
  scroll(document.documentElement, to, duration);
}
