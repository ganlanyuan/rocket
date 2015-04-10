// // AUTO HEIGHT GALLERY
// ready(function () {
//
//   // get max
//   // function getMaxOfArray(numArray) {
//   //   return Math.max.apply(null, numArray);
//   // }
//
//   var containers = k('[autoheight-gallery]');
//
//   // setting original height
//   function setContainerHeight () {
//     containers.forEach(function(el) {
//       var thisHeight = k(el).outerHeight() + 'px';
//       k(el).css('height', thisHeight);
//     });
//   }
//   window.onload = function() { setContainerHeight(); }
//
//   // autoheight-gallery
//   function autoHeightGallery() {
//     containers.forEach(function(el) {
//       var containerH,
//           children = k(el).find('li');
//       children.forEach(function(ele) {
//         var childZindex = k(ele).css('z-index'),
//             childH = k(ele).outerHeight();
//         if ( childZindex == '8') {
//           containerH = childH + 'px';
//         }
//       });
//       k(el).css('height', containerH);
//       console.log(childZindex);
//     });
//   }
//   if (k('[autoheight-gallery]').length > 0) {
//     setInterval(autoHeightGallery, 200);
//   }
// });
//
