// ========== ANIMATE ==========
function animate(el, attr, from, to, duration){
  if (duration < 0) {return;}
  if (typeof attr === "string") {
    var difference = to - from,
        perTick = difference / duration * 10;

    setTimeout(function () {
      from += perTick;
      el.style[toCamelCase(attr)] = from + 'px';
      if (from === to) { return; }
      animate(el, attr, from, to, duration - 10);
    }, 10);
  } else { throw { message: "Invalid parameters passed to css()" }; }
}

// function animate(el, attr, to, duration){
//   if (duration < 0) {return;}
//   if (typeof attr === "string") {
//     var from = parseFloat(getStyle(el, attr)),
//         difference = to - from,
//         perTick = difference / duration * 10;
//         alert(from);

//     setTimeout(function () {
//       from += perTick;
//       el.style[toCamelCase(attr)] = from + 'px';
//       if (from === to) { return; }
//       animate(el, attr, to, duration - 10);
//     }, 10);
//   } else { throw { message: "Invalid parameters passed to css()" }; }
// };

// ready(function () {
//   k('button').click(function() {
//     animate(k('.target')[0], 'height', k('.target').outerHeight(), 50, 500);
//   });
// })
