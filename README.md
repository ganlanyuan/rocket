# Rocket

Rocket is a powerful SASS library to help web developer handle layout, color and other components.

# Install

Download [rocket](https://github.com/ganlanyuan/rocket.git) or install with [Bower](http://bower.io/): 
```` bash
$ bower install rocket
````
Or install with [git](http://www.git-scm.com/):
```` bash
$ git clone https://github.com/ganlanyuan/rocket.git
````

# Usage

#### Grid System
##### layout setting #####
```` scss
$layout: (
  container: num | px | em | rem | % 
  columns: num
  gutter: num | px | em | rem | 1/20 | % | 0.1
);
````

##### container #####
The container of the main content. It can be center, left or right aligned.
```` scss
@include container {$container, $gutter, $align}
// $container: px | em | rem
// $gutter (optional): px | em | rem | %
// $align (optional): center | left | right
````

##### wrap #####
Grid wrap, works with `span`.
```` scss
@include wrap($columns, $gutter);
// $gutter: px | em | rem | %
// $columns (optional): num
//
// $columns is only needed when using gutter as percentage
````

##### span #####
`span` is used to create columns. You can use fixed gutter (px, em, rem) or flexible gutter (%). If you use fixed gutter, you need set the parent element as a `wrap`, otherwise you need use `span-calc`.
```` scss
@include span($column, $columns, $gutter, $pull, $push, $float, $last)
// $column: num
// $columns: default | null | num
// $gutter: default | null | num | px | em | rem | 1/2 | 5% | 0.1
// $pull(optional): num
// $push(optional): num
// $float(optional): left | right
// $last(optional): false | true

// note: 
// if you set $gutter as fraction, percentage or decimal,
// it's related to column-width, not container-width
// e.g. $gutter: 1/2 means $gutter = 1/2 * $column-width
````

##### span-calc #####
`span-calc` is using `css-calc` to create columns, old browser (e.g. IE8) will not be supported.
```` scss
@include span-calc($column, $columns, $gutter, $pull, $push, $float, $last)
// $column: num
// $columns: default | null | num
// $gutter: default | null | num | px | em | rem
// $pull(optional): num
// $push(optional): num
// $float(optional): left | right
// $last(optional): false | true

// Note: if you want use a fixible $gutter (e.g. 30%), 
// use span mixin instead.
````
[demo](http://designdev.cmcigroup.com/develop/rocket/docs/layout-grid.php)

##### gallery #####
`gallery` is for creating picture galleries.
```` scss
@include gallery($per-row, $gutter, $child, $columns, $position);
// $per-row: num
// $gutter: num | px | em | rem | 1/20 | 5% | 0.1
// $child: div | span | ...
// $columns (optional): num
// $position (optional): middle | bottom
//
// $columns is only needed when using gutter as percentage
````
[demo](http://designdev.cmcigroup.com/develop/rocket/docs/layout-gallery.php)

##### justify #####
`justify` is for creating `justify` list.
```` scss
@include justify-flex();
.no-flexbox {
  @include justify($child); // for old browsers
}
````
[demo](http://designdev.cmcigroup.com/develop/rocket/docs/layout-justify.php)

##### center #####
`center` is for creating both horizontal and vertical center aligned layout.
```` scss
@include center($child, $align)
// $child: div | li | span | ...
// $align: left | center
````
[demo](http://designdev.cmcigroup.com/develop/rocket/docs/layout-center.php)

##### two-columns #####
`two-columns` is for creating a two columns layout. One of them has a fixed width.
```` scss
@include two-columns($direction, $aside, $gutter);
// $direction (fixed columns direction): left | right
// $aside (fixed columns width): px | em | rem
// $gutter: px | em | rem
````
[demo](http://designdev.cmcigroup.com/develop/rocket/docs/layout-two-columns.php)

##### debug #####
Use `debug` to show your grid.
```` scss
@include debug($columns, $gutter, $color)
// $columns: num
// $gutter: num | px | em | rem | 1/20 | 5% | 0.1
// $color: rgba | ...
````
[demo](http://designdev.cmcigroup.com/develop/rocket/docs/layout-debug.php)

#### Pure CSS slideshow
A 100% pure CSS responsive slider with `previous/next` buttons, `nav dots`, `autoplay` and more. It works well on modern browsers and IE8+, but it doesn't support `loop`, `autoheight` and `lazyload` for now.

##### markup #####
First, set a specific class (or ID) for each slider.   
Then, use this class (or id) to set up the radio names and IDs as well as labels.   
In the example shows on the left, I used banner as my specific class.    
```` html
<div class="banner">
  <input type="radio" name="banner" id="banner-1" checked="">
  <input type="radio" name="banner" id="banner-2">
  <input type="radio" name="banner" id="banner-3">
  <input type="radio" name="banner" id="banner-4">
  <input type="radio" name="banner" id="banner-5">
  <input type="checkbox" name="banner-autoplay" id="banner-autoplay" checked="">
  <div class="slider-container">
    <ul class="inner">
      <li> slider01 </li>
      <li> slider02 </li>
      <li> slider03 </li>
      <li> slider04 </li>
      <li> slider05 </li>
    </ul>
  </div>
  <div class="controls">
    <label for="banner-1"><span class="prev"></span><span class="next"></span></label>
    <label for="banner-2"><span class="prev"></span><span class="next"></span></label>
    <label for="banner-3"><span class="prev"></span><span class="next"></span></label>
    <label for="banner-4"><span class="prev"></span><span class="next"></span></label>
    <label for="banner-5"><span class="prev"></span><span class="next"></span></label>
  </div>
  <div class="dots">
    <label for="banner-1"><span class="normal"></span><span class="active"></span></label>
    <label for="banner-2"><span class="normal"></span><span class="active"></span></label>
    <label for="banner-3"><span class="normal"></span><span class="active"></span></label>
    <label for="banner-4"><span class="normal"></span><span class="active"></span></label>
    <label for="banner-5"><span class="normal"></span><span class="active"></span></label>
  </div>
  <div class="autoplay"><label for="banner-autoplay"><span></span></label></div>
</div>
````
##### slider-gallery #####
```` scss
// basic
@include slider-gallery($items, $ratio, $autoplay, $hide, $default);
// $items: num
// $ratio: height/width 
// $autoplay: false | true
// $hide: none | controls | dots | autoplay
// $default: true | false
.yourSlider { @include slider-gallery(10, 9/16, false, 'autoplay dots', false); }

// autoplay
.autoplay { @include slider-gallery($autoplay: true); }

// customise dots and controls
.yourSlider .dots .normal { ... }
.yourSlider .dots .active { ... }
.yourSlider .controls .prev { ... }
.yourSlider .controls .next { ... }

// customise items
.yourSlider {
  .slider-container { overflow: visible; }
  li { @include transform(scale(1.1)); }
  @for $i from 1 through 5 {
    #gallery-b-#{$i}:checked ~ .slider-container li:nth-child(#{$i}) { @include transform(scale(1)); }
  }
}
````
[demo](http://designdev.cmcigroup.com/develop/rocket/docs/slider-gallery.php)

##### slider-carousel #####
```` scss
// basic
@include slider-carousel($items, $perpage, $gutter, $slide-by-page, $center, $autoplay, $hide, $default);
// $items: num
// $perpage: num
// $gutter: px | em | rem
// $slide-by-page: false | true
// $center: false | true
// $autoplay: false | true
// $hide: none | autoplay | dots | controls
// $default: true | false

.yourSlider { @include slider-carousel(8, 1, 0px, true, false, false, none, true); }
@media screen and (min-width: 48em) {
  .yourSlider { @include slider-carousel($perpage: 2); }
}
@media screen and (min-width: 64em) {
  .yourSlider { @include slider-carousel($perpage: 3); }
}
````
[demo](http://designdev.cmcigroup.com/develop/rocket/docs/slider-carousel.php)

#### Addons
##### type #####
`type` is a shorthand mixin for type.
```` scss
@include type($type...);
$type: ($font-size, $font-weight, $font-style, $line-height, $font-family);
// font-size: null | num | px | em | rem
// font-weight: null | normal | bold | num | ...
// font-style: null | normal | italic | ...
// line-height: null | num | %
// font-family: null | ...

h1 { @include type(32px,700,null,1.1); }
````
[demo](http://designdev.cmcigroup.com/develop/rocket/docs/addons-type.php)

##### button #####
`button` is not just for "button". Everything which is an inline-block box can be considered as a button.
```` scss
@include button(font-size, padding, background-color, border, border-radius);
// font-size: value | null
// padding: value | null
// background-color: value | null
// border: value | null
// border-radius: value | null
````
[demo](http://designdev.cmcigroup.com/develop/rocket/docs/addons-button.php)

##### Media list #####
`media` displays a media object (images, video, audio) to the left or right of a block.
```` scss
.news { @include media($gutter, $media, $media-body, $direction); }
// $gutter(optional): px | em | rem
// $media(optional): null | . | # | tag
// $media-body(optional): null | . | # | tag
// $direction(optional): left | right

.news { @include media(); } 
// $gutter: 10px
// $media: [data-media-left] or [data-media-right]
// $media-body: [data-media-body]
// $direction: left

.news-right { @include media(1em, '.media', '.media-body', right); } 
.news-left { @include media(15px, 'figure', 'div'); } 
````
[demo](http://designdev.cmcigroup.com/develop/rocket/docs/addons-media-list.php)

##### off-canvas #####
`off-canvas` is for creating the navigation of mobile site.
```` html
<nav>
  <ul>
    <li><span data-offcanvas-close>close</span></li>
    <li><a href="">item01</a></li>
    <li><a href="">item02</a></li>
    <li><span data-icon-haschild><span class="ic-angle-right"></span></span><a href="">item03</a>
      <ul data-offcanvas-subnav>
        <li data-offcanvas-back>back</li>
        <li><a href="">sub item02</a></li>
        <li><a href="">sub item03</a></li>
        <li><a href="">sub item04</a></li>
      </ul>
    </li>
    <li><a href="">item04</a></li>
  </ul>
</nav>
<div class="page">
  <div data-page-cover=""></div>
  <div data-icon-nav></div>
</div>
````
```` scss
nav { @include off-canvas($style, $direction, $font-size, $padding, $bg); }
// $style: move | translate | reveal
// $direction: left | right
// $font-size: font-size (nav-item)
// $padding: padding (nav-item)
// $bgc: background-color (nav-item)
.page { @include page-container($style, $direction); }
// $style: move | translate | reveal
// $direction: left | right
````
[demo](http://designdev.cmcigroup.com/develop/rocket/docs/addons-off-canvas.php)

##### dropdown #####
There are two ways to show a dropdown menu. If you set as `click`, you need add an `<span data-dropdown-toggle></span>` beside your dropdown menu.
```` scss
@include dropdown($bgc, $padding, $border, $border-radius, $shadow, $open);
// $bgc: dropdown menu background-color
// $padding: dropdown menu item padding
// $border: value | null
// $border-radius: value | null
// $shadow: value | null
// $open: hover | click

// If you set $open: click, 
// you need insert <span data-dropdown-toggle></span> inside your dropdown tag.
````
[demo](http://designdev.cmcigroup.com/develop/rocket/docs/addons-dropdown.php)

##### tooltip #####
This is a pure css tooltip.
```` scss
@include tooltip($direction, $color, $radius, $width, $height, $content);
// $direction: top | bottom | left | right
// $color: background-color
// $radius: value | null
// $width: max-width
// $height: (for old browser)
// $content: attr(data-tooltip) | your content

// To make tooltip shows perfect, 
// it's better to set tooltip box as a block element, 
// or give it a width;
````
[demo](http://designdev.cmcigroup.com/develop/rocket/docs/addons-tooltip.php)

##### breakpoint #####
A shorthand @mixin for break point.
```` scss
@include bp-mi(
  $min: num | px | em | rem, 
  $media: false | screen | print | ...
);
// @include bp-mi(640) { ... };
// output: @media (min-width: 40em) { ... };

@include bp-ma(
  $max: num | px | em | rem, 
  $media: false | screen | print | ...
);
// @include bp-ma(640, screen) { ... };
// output: @media screen and (max-width: 40em) { ... };

@include bp-mm(
  $min: num | px | em | rem, 
  $max: num | px | em | rem, 
  $media: false | screen | print | ...
);
// @include bp-mi(640, 767) { ... };
// output: @media (min-width: 40em) and (max-width: 47.94em) { ... };
````

##### visibility #####
A shorthand @mixin for hide elements on some parts of viewport.
```` scss
@include visible($media, $bp...);
@include hidden($media, $bp...);
// $media: null | screen | print | ...
// $bp: num | px | em | ... (accept maximum 5 values)

// @include visible(null, 500)
// visible on 500px up on all media
// @include hidden(screen, 300, 500, 700)
// hidden between 300px and 500px, and 700px up on screen
````
[demo](http://designdev.cmcigroup.com/develop/rocket/docs/addons-visibility.php)

##### flex video #####
```` scss
@include flex-video($ratio);
// $ratio: 9/16 | ...
// $child (optional): false | 'div' | ...

.flex-video { @include flex-video(3/4); }
````
[demo](http://designdev.cmcigroup.com/develop/rocket/docs/addons-flex-video.php)

#### Color Functions
Please refer to [Adobe Kuler](https://color.adobe.com/create/color-wheel/) and [paletton](http://paletton.com/#uid=1000u0kllllaFw0g0qFqFg0w0aF).   

##### adjacent #####
`adjacent` is for creating adjacent colors.
```` scss
adjacent( $color, $order, $saturation, $lightness, $dist );
// $color: #dbdbdb | rgb | rgba | hsl | hsla | ...
// $order: num,
// $saturation (optional): false | null | %,
// $lightness (optional): false | null | %
// $dist (optianal): 30 | num

// .youclass { color: adjacent(#a6e36e, 1, $dist: 20); }
````
[demo](http://designdev.cmcigroup.com/develop/rocket/docs/color-adjacent.php)

##### complementary #####
`complementary` is for getting a complementary color.
```` scss
complementary( $color, $saturation, $lightness );
// $color: #dbdbdb | rgb | rgba | hsl | hsla | ...
// $saturation (optional): false | null | %,
// $lightness (optional): false | null | %

// .youclass { color: complementary(#a6e36e, null, 20%); }
````
[demo](http://designdev.cmcigroup.com/develop/rocket/docs/color-complementary.php)

##### split-complementary #####
`split-complementary` is for getting split-complementary colors based on a given color.
```` scss
split-complementary( $color, $order, $saturation, $lightness, $dist );
// $color: #dbdbdb | rgb | rgba | hsl | hsla | ...
// $order: num,
// $saturation (optional): false | null | %,
// $lightness (optional): false | null | %
// $dist (optianal): 30 | num

// .youclass { color: split-complementary(#a6e36e, 1); }
````
[demo](http://designdev.cmcigroup.com/develop/rocket/docs/color-split-complementary.php)

##### triad #####
`triad` is for getting triad colors based on a given color.
```` scss
triad( $color, $order, $saturation, $lightness, $dist );
// $color: #dbdbdb | rgb | rgba | hsl | hsla | ...
// $order: num,
// $saturation (optional): false | null | %,
// $lightness (optional): false | null | %
// $dist (optianal): 30 | num

// .youclass { color: triad(#a6e36e, 1); }
````
[demo](http://designdev.cmcigroup.com/develop/rocket/docs/color-triad.php)

##### rectangle #####
`rectangle` is for getting rectangle colors based on a given color.
```` scss
rectangle( $color, $order, $saturation, $lightness, $dist );
// $color: #dbdbdb | rgb | rgba | hsl | hsla | ...
// $order: num,
// $saturation (optional): false | null | %,
// $lightness (optional): false | null | %
// $dist (optianal): 30 | num

// .youclass { color: rectangle(#a6e36e, -3); }
````
[demo](http://designdev.cmcigroup.com/develop/rocket/docs/color-rectangle.php)

##### square #####
`square` is for getting square colors based on a given color.
```` scss
square( $color, $order, $saturation, $lightness, $dist );
// $color: #dbdbdb | rgb | rgba | hsl | hsla | ...
// $order: num,
// $saturation (optional): false | null | %,
// $lightness (optional): false | null | %
// $dist (optianal): 30 | num

// .youclass { color: square(#a6e36e, -3); }
````
[demo](http://designdev.cmcigroup.com/develop/rocket/docs/color-square.php)

#### kit.js
Kit.js is small Javascript library similar with jQuery. Kit.js works well on IE8 and up, and on other morden browsers.   
The follow metheds are available:   
`on`, `off`, `click`, `mouseover`, `mouseout`, `focus`, `blur`, `submit`, `keydown`, `keyup`,   
`find`, `eq`, `filter`, `first`, `last`, `parent`, `parents`, `children`, `firstChild`, `lastChild`, `siblings`, `prev`, `prevAll`, `next`, `nextAll`,   
`hide`, `show`, `fadeIn`, `remove`,   
`text`, `html`, `attr`, `css`, `addClass`, `removeClass`, `toggleClass`, `hasClass`,   
`outerWidth`, `outerHeight`, `getTop`, `getLeft`, `offset(left top)`,   
`before`, `after`, `append`, `prepend`  

##### Ready #####
```` javascript
ready(function () {
  ...
});
````

##### Dom methods #####
```` javascript
k('.header').parent().addClass('newclass');
k('.button').siblings('p').css({
  'color': 'red',
  'line-height': '1.5'
});
````

##### Event #####
```` javascript
k('.icon-menu').click(function() {
  k(this).parent().toggleClass('active');
});

k('.news').on('mouseover', function() {
  k(this).css('background-color', 'blue');
});
````

##### forEach #####
```` javascript
k('.site-nav a').forEach(function (el) {
  el.onclick = function () {
    var targetId = k(this).attr('href');
        targetPosition = k(targetId).getTop();
    scrollTo(targetPosition, 400);
    return false;
  }
});
````

##### Reach #####
`reach` is a function to check if target element reach the edge of browser.  
```` javascript
if (k(el).reach('middle',0)) {
  // if target element reach the middle of the browser, do something
}
if (k(el).reach('top',20)) {
  // if target element reach the point which is under the top of the browser 20px, do something
}
if (k(el).reach('bottom',0)) {
  // if target element reach the bottom of the browser, do something
}
````

##### scrollTo #####
Scroll to some point in a given period of time.  
```` javascript
scrollTo (to,duration);

k('.icon-menu').click(function() {
  scrollTo (0,200); // scroll to top in 200ms
});
````

##### numIncrease #####
Increase numbers in given period of time.
```` javascript
numIncrease(element, from, to, duration);

document.onload = function  () {
  numIncrease(k('.follows'), 0, 200000, 400);
};
````

##### animate #####
```` javascript
animate(el, attr, from, to, duration);
animate(k('.target'), 'left', 0, 20, 400);
````

# Changelog
[Changelog](https://github.com/ganlanyuan/rocket/blob/master/changelog.md)
