// AUTO HEIGHT GALLERY
function autoheightGallery (selector) {
  if (kit(selector).length > 0) {
    var outer = kit(selector).find('.outer'),
        inner = kit(selector).find('.inner');


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
