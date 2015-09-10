// AUTO HEIGHT GALLERY
function autoheightGallery (selector) {
  if (k(selector).length > 0) {
    var outer = k(selector).find('.outer'),
        inner = k(selector).find('.inner');


    // autoheight-gallery-core
    function autoheightGalleryCore() {
      var outerH = outer.outerHeight(),
          innerH = inner.outerHeight();
      if (outerH === innerH) {
        return;
      } else{
        outer.css('height', innerH + 'px');
      }
    }
    // if (outer.length > 0) {
      outer.css('height', inner.outerHeight() + 'px');
      setInterval(autoheightGalleryCore, 200);
    // }
  }
}
