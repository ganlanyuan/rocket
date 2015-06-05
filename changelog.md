# Changelog
### v2.0.0
+ All mixins now require only one parameter(list). The advantage is that you don't need to remeber the order of parameters any more, you just need to remember which element you want to use. For example, `button(16px '.5em 1em' radius)` and ` button(radius '.5em 1em' 16px)` are the same.
+ Add `keep` to `span`, `span-calc` and `gallery`.
+ Add 'isolate mode' to `span`.
+ Combine `breakpoint-mi`, `breakpoint-ma` and `breakpoint-mm` to one mixin `breakpoint`. Now `breakpoint` accept a maximun 6 numbers' list.
+ Simplify `visible` and `hidden` mixins by including `breakpoint` mixin.
+ Add more features to `type`. Now it's very helpful that you can see most of the type properties at one place.
+ Remove javascript dependence from `dropdown`.
+ Remove `debug`.
+ Simplify other functions and mixins.

Things we are working on:
+ Support libsass
+ Update css slider
+ Add more mixins and functions
+ Rocket document

### v1.2.0
+ Add `keep` argument to `span`, `span-calc`, `gallery`. Now you can reduce your code by using `$keep:true` if your want keep some setting(float, margin) when you do media query.
+ Add `span` function to get column width(percentage). Now you can easily set up same `gutter` between nested grid by using `$gutter: $container-gutter / span($container-column, $container-columns, $container-gutter)`.
+ Simplify `span`, `span-calc`, `gallery` and `container`.

### v1.1.11
+ Modify `span`, `wrap`, `gallery`. 

### v1.1.10
+ update `span`, `gallery`.

### v1.1.9
+ `type`, `button`: add "px" value to "rem-non-support" browser.
+ Simplify `wrap`. now argument `$columns` is not required.
+ Fix an issue on `span` and `span-clac`.
+ Update demos.

### v1.1.8
+ Update `off-canvas`. Now you can use `off-canvas` in @mediaquery.

### v1.1.7
+ Simplify layout functions: `span`, `span-calc`, `gallery`, `two-columns` and `debug`.

### v1.1.6
+ Fix an issue on `slider-carousel: center`.
+ Hide `autoplay` on non-supported browsers.

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
