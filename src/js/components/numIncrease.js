// ========== NUMINCREASE ==========
function numIncrease(element, from, to, duration){
  if (duration < 0) {return;}
  var difference = to - from,
      perTick = difference / duration * 10;

  setTimeout(function () {
    from += perTick;
    element.text(Math.round(from));
    if (from === to) { return; }
    numIncrease(element, from, to, duration - 10);
  }, 10);
}
