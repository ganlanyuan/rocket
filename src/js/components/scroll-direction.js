var lastScrollTop = 0,
    scrollDirection;
winScroll(function() {
  var st = kit.win.ST();
  if(st < lastScrollTop) {
    scrollDirection = 'up';
  } else {
    scrollDirection = 'down';
  }
  lastScrollTop = st;

  return scrollDirection;
});
