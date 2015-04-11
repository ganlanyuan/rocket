# Changelog

### v1.1.5
+ Add animations to `off-canvas`.
+ Enhance `carousel` slideshow: hide extra dots when per-page items are more than one.
+ Add `autoheight` to `slider-carousel` and `slider-gallery`. `slider-gallery: autoheight` on IE8 are not supported for now.
+ Update `selectivizr`. CSS3 selectors inside `@mediaquery` works well on IE7+ now.
+ Hide *controls* when sliders are set to autoplay.

### v1.1.4
+ Fix an issue on `color` mixin.
+ Fix an `page cover stopped` issue on `off-canvas` mixin.
+ Update Readme.

### v1.1.3
+ Fix an arg issue on `gallery`.
+ Simplify `type` and `button` mixins.

### v1.1.2
+ Fix an issue on `contianer`.
+ Simplify `slider-gallery`, `container`, `wrap` and `breakpoint`.

### v1.1.1
+ Fix `off-canvas` cover height issue when the content is not enough to fill the window.
+ Fix `css-slider` controls shade the content.
+ Update `flex-video`.
+ Rename functions `toem`, `torem` to `em`,`rem`. 

### v1.1.0
+ Add `Pure CSS sliders`: [slider-gallery](designdev.christianpost.com/develop/rocket/docs/#slider-gallery-topic) and [slider-carousel](designdev.christianpost.com/develop/rocket/docs/#slider-carousel-topic).

### v1.0.0
+ Rename `mobile-nav` to `off-canvas`.
+ Update `em`, `toem` and `torem`.

### v0.1.4
+ Add more data to color model based on [http://paletton.com/](http://paletton.com/).
+ Fix an issue: when $hue == 0, color function can not compile.

### v0.1.3
+ Rewrite color core function, and fix everything.
+ Update [demo page](http://designdev.christianpost.com/develop/docs/).

### v0.1.2
+ Upgrade color functions. `square` still need to be fixed.

### v0.1.1
+ Add color mixin. Ready to update color functions.

### v0.1.0
+ Add @mixin two-columns.
+ Add color functions: contrast, complementary, adjacent, triad and tetrad.

### v0.0.3
+ Add 'default' and 'null' options to span and span-calc, change $float to optional.
