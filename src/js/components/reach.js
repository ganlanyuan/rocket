kit.prototype.reach = function (edge,distance) {
  var winH = kit.win.H(),
        target,
        elTop = kit(this[0]).offset().top;
    switch (edge) {
      case 'top':
        target = distance;
        break;
      case 'middle':
        target = distance + (winH / 2);
        break;
      case 'bottom':
        target = distance + winH;
        break;
    }

    if (elTop < target) {
      return true;
    } else {
      return false;
    }
};

// <ul class="target">
//   <li>item1</li>
//   <li>item2</li>
//   <li>item3</li>
//   <li>item4</li>
// </ul>
// <ul class="content">
//   <li>content1</li>
//   <li>content2</li>
//   <li>content3</li>
//   <li>content4</li>
// </ul>

// window.onscroll = function () {
//   kit('.target li').forEach(function (el) {
//     if (kit(el).reach('middle',0)) {
//       kit('.content li').eq(k.index(kit('.target li'), el)).css('color', 'red');
//     } else {
//       kit('.content li').eq(k.index(kit('.target li'), el)).css('color', 'black');
//     }
//   })
// };