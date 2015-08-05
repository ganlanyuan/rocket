# Rocket 2.0

Rocket is a powerful SASS library to help web developers handle layout, color and other components.    
[sassdoc](http://creatiointl.org/gallery/william/sassdoc/)   
[demos](http://creatiointl.org/gallery/william/rocket/layout-grid.php)   
[Changelog](https://github.com/ganlanyuan/rocket/blob/master/changelog.md)   

# Install

Download [rocket](https://github.com/ganlanyuan/rocket.git) or install with [Bower](http://bower.io/): 
```` bash
$ bower install rocket
````
Or install with [git](http://www.git-scm.com/):
```` bash
$ git clone https://github.com/ganlanyuan/rocket.git
````
# Requirements
+ Sass > 3.4.0    
+ LibSass > 3.2.0    

# Structure
【 Components 】
```` html      
     == layout ==                == components ==
        |container                  |button
        |wrap                       |media
        |span                       |offcanvas
        |span-calc                  |dropdown
        |two-columns                |tabs
        |gallery                    |push-toggle
        |justify                    |checkbox
        |center                     |tooltip
                                    |flex-video
                                    |switch
                                               
                                                
     == addons ==                == color functions ==
        |opacity                    |analogous
        |ie-rgba                    |contrast
        |rems                       |adjacent
        |breakpoint (bp)            |complementary
        |visible                    |split-complementary
        |hidden                     |triad
        |type                       |rectangle
                                    |square
                                             
````

#【 Layout 】
#### layout setting
```` scss
// default setting
// items: 5;
// perpage: 2;
// gutter: 10px; (default)
// slide-by-page: true;
// default: true; (default styles for controls and dots)
$ro-layout: (
  container: 1024px,
  columns: 12,
  gutter: 2%,
);
````

#### container
The container of the main content. It can be center, left or right aligned.
```` scss
@mixin container($key)
// pattern
$key: ($container $gutter) $align

.wrapper { @include container(1200px); }
// container: 1200px;
// gutter: 2%; (default)
// align: center; (default)

.wrapper { @include container(1200px 20px left); }
// container: 1200px
// gutter: 20px;
// align: left;

.wrapper { @include container(64em 2% center); }
// container: 64em;
// gutter: 2%;
// align: center;
````

#### wrap
Grid wrapper, works with `span` when using a fixed value for `gutter`.
```` scss
@mixin wrap($key);
// pattern
$key: $gutter

.wrapper { @include wrap(20px); }
// gutter: 20px;
````

#### span
`span` is used to create grid. You can use fixed gutter (px, em, rem) or flexible gutter (%). If you use fixed gutter, you need set the parent element as a `wrap`, or you can use `span-calc`.
```` scss
@mixin span($key);
// pattern
$key: ($column at $location of $columns) $gutter (move $move) (float $float) last keep

.nav { @include span(3); }
// column: 3;
// columns: 12; (default)
// columns: 2%; (default)

.nav { @include span(11 of 16 2%); }
// column: 3;
// columns: 12;
// gutter: 2%;

.nav { @include span(11 at 5 of 16 2%); }
// location: 5; (isolate mode)

.nav { @include span(11 of 16 2% right move -5 last); }
// last: true; (The last column)
// float: right;
// move: -5; (move left 5 columns)
````
*Isolate mode*: read [this article](http://www.palantir.net/blog/responsive-design-s-dirty-little-secret) for more detail. If you want to use isolate mode on one column, other siblings columns also need use isolate mode: 
````scss
.col-1 { @include span(.. at ..); } 
.col-2 { @include span(.. at ..); } 
````
*Keep*: you may want keep some parts(float, gutter) constant when doing media query, then you can use `keep`;
````scss
// scss
.nav { @include span(7 of 11 2%); }

@media screen and (min-width: 800px) {
  .nav { @include span(4 of 11 keep); }
}
````
````css
/* css */
.nav {
  float: left;
  width: 62.9090909091%;
  margin-right: 2%;
}

@media screen and (min-width: 800px) {
  .nav { width: 35.0909090909%; }
}
````
*Nested grid*: use function `span` to calculate child element's gutter. 
```` html
<!-- nested grid -->
<div class="parent">
  <div class="child-1"></div>
  <div class="child-2"></div>
</div>
<div class="aside"></div>
````
```` scss
$gutter: 2%;
$parent-layout: (7 of 10 $gutter); 

.parent {
  @include span($parent-layout);
  .child-1 { @include span(9 of 16 ($gutter / span($parent-layout))); }
  .child-2 { @include span(7 of 16 ($gutter / span($parent-layout))); }
  // or .child-2 { @include span(7 of 16 ($gutter / 69.9%)); }
}
.aside { @include span(3 of 10 $gutter); }
````

#### span-calc
`span-calc` is using `css-calc` to create columns, old browser (e.g. IE8) will not be supported.
```` scss
@mixin span-calc($key);
// pattern
$key: ($column of $columns) $gutter (move $move) (float $float) last

.nav { @include span-calc(3); }
// column: 3;
// columns: 12; (default)
// columns: 20px; (default)

.nav { @include span-calc(11 of 16 30px); }
// column: 3;
// columns: 12;
// gutter: 2%;

.nav { @include span(last right 11 of 16 30px move -5); }
// last: true; (The last column)
// float: right;
// move: -5; (move left 5 columns)

// Tips: gutter must be a fixed value(px, em, rem).
````

[Grid demos](http://creatiointl.org/gallery/william/rocket/layout-grid.php)

#### gallery
`gallery` is for creating picture galleries.
```` scss
@mixin gallery($key);
//pattern
$key: $per-row $gutter (child $child) $float $position keep

.pic { @include gallery(3 2% child li middle); }
// per-row: 3;
// gutter: 2%;
// child: li;
// float: left; (default)
// position: middle; (same padding on the top and bottom for each item)

@media screen and (min-width: 768px) {
  .pic { @include gallery(4 child li keep); }
}
// Keep: similar with span(keep).
````
[demo](http://creatiointl.org/gallery/william/rocket/layout-gallery.php)

#### justify
`justify` is for creating `justify` list.
```` scss
@mixin justify-flex();
@mixin justify();
$key: (child $child)

.example {
  @include justify-flex();
  .no-flexbox {
    @include justify(div);
    // for old browsers
    // child: div
  }
}
````
[demo](http://creatiointl.org/gallery/william/rocket/layout-justify.php)

#### center
`center` is for creating both horizontal and vertical center aligned layout.
```` scss
@mixin center($key);
// pattern
$key: $child $align

.banner { @include center(div left); }
// child: div;
// align: left; (left | right | center, for old browser)
````
[demo](http://creatiointl.org/gallery/william/rocket/layout-center.php)

#### two-columns
`two-columns` is for creating a two columns layout. One of them has a fixed width.
````html
<!-- Add "data-col-main", "data-col-aside" attributes to your markup. -->

<div class="wrapper">

  <!-- main -->
  <div data-col-main=""></div>

  <!-- aside -->
  <div data-col-aside=""></div>
</div>
````
```` scss
// scss
@mixin two-columns($key);
// pattern
$key: $direction $aside-width (gutter $gutter)

.wrapper { @include two-columns(left 300px gutter 30px); }
// direction: left; (aside is on the left)
// aside-width: 300px;
// gutter: 30px;
````
[demo](http://creatiointl.org/gallery/william/rocket/layout-two-columns.php)


#【 Components 】
#### button
````scss
@mixin button($key);
// pattern
$key: $font-size $padding $background-color radius round hover

.button { @include button(14px #00c8ff '0.8em 1em' radius hover); }
// font-size: 14px;
// background-color: #00c8ff;
// padding: 0.8em 1em; (Tips: padding must be quoted)
// radius: 0.22em; (default, you can modify it by change the varible "$ro-button-radius: 0.22em;" )
// hover: true; (change background-color when mouse over)
````
[demo](http://creatiointl.org/gallery/william/rocket/components-button.php)

#### Media list
`media` displays a media object (images, video, audio) to the left or right of a block.
```` scss
@mixin media($key);
// pattern
$key: $role $gutter $direction

.media { @include media(); } 
// role: 'media'; (media:default | media-body)
// gutter: 10px; (default)
// direction: left; (default)

.media { @include media('media' 15px right); }
// role: 'media';
// gutter: 15px;
// direction: right;
.media-body { @include media('media-body'); }
// role: 'media-body'; 
````
[demo](http://creatiointl.org/gallery/william/rocket/components-media-list.php)

#### flex video
```` scss
@mixin flex-video($key);
// pattern
$key: $ratio $child

.flex-video { @include flex-video(3/4); }
// ratio: 3/4;
// child: iframe, object, embed; (default)

.flex-video { @include flex-video(9/16 embed); }
// ratio: 9/16;
// child: embed; 
````
[demo](http://creatiointl.org/gallery/william/rocket/components-flex-video.php)

#### dropdown
```` html
<!-- 
  if you set $show: click, add these markup to your dropdown 
  make sure the value of "for" match the checkbox id
  -->

<div class="dropdown">
  <span>dropdown</span>
  <input type="checkbox" name="" id="dropdown">
  <label for="dropdown">▼</label>
  <ul>
    <li><a href="">item01</a></li>
    <li><a href="">item02</a></li>
    <li><a href="">item03</a></li>
  </ul>
</div>
````
```` scss
@mixin dropdown($key);
// pattern
$key: $child $show $style $direction default

.dropdown { @include dropdown(ul hover display right default); }
// child: ul;
// show: hover; (hover | click)
// style: display; (scale | display)
// direction: right; (left | right)
// default: true; (use default dropdown menu style)
````
[demo](http://creatiointl.org/gallery/william/rocket/components-dropdown.php)

#### tabs
Pure css tabs.   
```` html
<!-- 
  .ro-tabs and .ro-panels are required
  -->

<div class="your-tab-class">
  <input type="radio" name="your-radio-name" id="your-radio-id-1" checked>
  <input type="radio" name="your-radio-name" id="your-radio-id-2">
  <input type="radio" name="your-radio-name" id="your-radio-id-3">
  <!-- ... -->
  <div class="ro-tabs">
    <label for="your-radio-id-1">tab 1</label>
    <label for="your-radio-id-2">tab 2</label>
    <label for="your-radio-id-3">tab 3</label>
    <!-- ... -->
  </div>
  <div class="ro-panels">
    <div>
      <!-- Your tab-panels 1 -->
    </div>
    <div>
      <!-- Your tab-panels 2 -->
    </div>
    <div>
      <!-- Your tab-panels 3 -->
    </div>
  </div>
</div>
````
```` scss
@mixin tabs($key);
// pattern
$key: `$length $style`

.your-tab-class { @include tabs(3 'carousel'); }
// length: 3; (3 tabs)
// style: carousel; (normal | carousel | customize)
````
[demo](http://creatiointl.org/gallery/william/rocket/components-tabs.php)

#### tabs-active
Set tabs' active styles.   
```` scss
@mixin tabs-active($key);
// pattern
$key: `$length`

.your-tab-class { 
  @include tabs-active(3) {
    // tab active style
  } 
}
// length: 3; (3 tabs)
````
[demo](http://creatiointl.org/gallery/william/rocket/components-tabs.php)

#### tabs-panel-active
Set panels' active styles.   
```` scss
@mixin tabs-panel-active($key);
// pattern
$key: `$length`

.your-tab-class { 
  @include tabs-panel-active(3) {
    // panel active style
  } 
}
// length: 3; (3 tabs)
````
[demo](http://creatiointl.org/gallery/william/rocket/components-tabs.php)

#### switch
Pure css switch.   
```` html
<div class="switch">
  <input type="checkbox" id="switch1" name="switch">
  <label for="switch1"></label>
</div>
````
```` scss
@mixin switch()
//pattern
$key: `$size $active-color radius round`

.switch { @include switch(30px #3DD754 round); }
// $size: 30px (default 20px)
// $active-color: #3DD754 (default #3DD754)
// $round: true (default false)
````
[demo](http://creatiointl.org/gallery/william/rocket/components-switch.php)

#### push-toggle
Pure css push toggle.   
```` html
<div class="push-toggle">
  <input type="radio" id="male" name="gender" checked="">
  <label for="male">Male</label>
  <input type="radio" id="female" name="gender">
  <label for="female">Female</label>
</div>
````
```` scss
@mixin push-toggle()

.your-tab-class { 

  // default style
  label {
    padding: 1em 1.5em;
    background-image: linear-gradient(to bottom, #fff, #e1e1e1);
    border: 1px solid #ccc;
  }

  // active style
  @include push-toggle(){
    background-image: linear-gradient(to bottom, #ebebeb, #fff);
    box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.1) inset;
  }
 }
````
[demo](http://creatiointl.org/gallery/william/rocket/components-push-toggle.php)    

#### checkbox
Customize radios or checkboxes.
```` html
<!-- make sure label right after radio or checkbox -->
<div class="radio">
  <input type="radio" name="my-radio-name" id="my-radio-id-1" checked>
  <label for="my-radio-id-1">item 1</label>
  <br />
  <input type="radio" name="my-radio-name" id="my-radio-id-2">
  <label for="my-radio-id-2">item 2</label>
  <br />
  <input type="radio" name="my-radio-name" id="my-radio-id-3">
  <label for="my-radio-id-3">item 3</label>
  <br />
</div>
````
```` scss
@mixin checkbox()

.radio {
  @include checkbox() {
    padding: 4px 0 4px 26px;
    background: url('../images/radio.png') 0 50% no-repeat;
  }
}
````
[demo](http://creatiointl.org/gallery/william/rocket/components-checkbox.php)   

#### checkbox-active
Radios or checkboxes' active style.   

```` scss
@mixin checkbox-active()

.radio {
  @include checkbox-active() {
    background-image: url('../images/radio-active.png');
  }
}
````
[demo](http://creatiointl.org/gallery/william/rocket/components-checkbox.php)    

#### tooltip
pure css `tooltip`
```` scss
@mixin tooltip($key);
// pattern
$key: $direction $color radius (width $width) (height $height)

.tooltip { @include tooltip(radius right #b02df3 width 300px); }
// radius: 0.22em; (This can be custmized by changing "$ro-tooltip-radius: 0.22em !default;")
// direction: right;
// background-color: #b02df3;
// width: 300px; (for old browsers)
````
[demo](http://creatiointl.org/gallery/william/rocket/components-tooltip.php)

#### offcanvas
`offcanvas` is for creating the navigation of mobile site.
````html
<!-- include kit.js -->
<script src="path/to/kit.min.js"></script>

<!-- page -->
<div class="page">
  <!-- nav icon -->
  <div data-icon-nav></div>

  <!-- offcanvas -->
  <nav class="nav">
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

  <!-- page cover -->
  <div data-page-cover=""></div>
</div>
````
```` scss
// *** offcanvas *** //
@mixin offcanvas($key);
// pattern
$key: $style $direction animation $offcanvas-width $padding $background-color

.nav { @include offcanvas(translate 300px '1em' left #102244 animation); }
// style: translate; (move | transition | reveal)
// offcanvas-width: 300px;
// nav-item-padding: 1em;
// direction: left; (left | right)
// offcanvas-background-color: #102244;
// animation: true;

// *** page-container *** //
@mixin page-container($key);
// pattern
$key: $style $direction $offcanvas-width $cover-bg

.page { @include page-container(translate left 300px); }
// style: translate;
// offcanvas-width: 300px;
// direction: left;
````
[demo](http://creatiointl.org/gallery/william/rocket/components-offcanvas.php)

## Pure CSS Sliders
A pure CSS responsive slider with previous/next buttons, nav dots, autoplay(IE8- are not supported), autoheight and more. It works well on modern browsers and IE8+, but it doesn't support loop and lazyload for now.
#### markup

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
  <div class="outer">
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

#### slider-gallery
```` html
// basic
@include slider-gallery($key);
// pattern
$key: $items $time (speed $speed) (timeout $timeout) hoverpause autoplay default

.slider { @include slider-gallery(5 speed 0.5s timeout 4s autoplay default); }
// items: 5;
// speed: 0.5s; (default 1s)
// timeout: 4s; (default 3s)
// autoplay: true;
// default: true; (default styles for controls and dots)

// customise dots and controls
.slider .dots .normal { ... }
.slider .dots .active { ... }
.slider .controls .prev { ... }
.slider .controls .next { ... }

// customise items
.slider {
  // setting item
  .outer { overflow: visible; }
  li { 
    @include transform(scale(1.1)); 
    transition: all 1s ease 0s;
  }
  @for $i from 1 through 5 {
    #gallery-c-#{$i}:checked ~ .outer li:nth-child(#{$i}) { @include transform(scale(1)); }
  }
  // setting .info
  .info { opacity: 0; margin-left: 0;
    -webkit-transition: all 1s $ro-global-bezier 0.5s;
    transition: all 1s $ro-global-bezier 0.5s;
   }
  @for $i from 1 through 5 {
    #gallery-c-#{$i}:checked ~ .outer li:nth-child(#{$i}) .info {
      opacity: 1;
      margin-left: 20px;
    }
  }
}
````
*Autoheight*
Add `kit.min.js` to `html`, and then put `autoheight-carousel` attribute to the slideshow container (.outer).
```` html
<!-- include kit.js -->
<script src="path/to/kit.min.js"></script>

<!-- add "autoheight-gallery" attribute -->
<div class="outer" autoheight-gallery></div>
````
[demo](http://creatiointl.org/gallery/william/rocket/components-slider-gallery.php)

#### slider-carousel
```` scss
// basic
@mixin slider-carousel($key);
// pattern
$key: ($items by $perpage) (speed $speed) (timeout $timeout) hoverpause $gutter bypage center autoplay default;

.slider { @include slider-carousel(5 by 2 bypage default); }
// items: 5;
// perpage: 2;
// gutter: 10px; (default)
// bypage: true;
// default: true; (default styles for controls and dots)
````

*Autoheight*
Add `kit.min.js` to `head`, and then put `autoheight-carousel` attribute to the slideshow container (.outer).
```` html
<!-- include kit.js -->
<script src="path/to/kit.min.js"></script>

<!-- add "autoheight-carousel" attribute -->
<div class="outer" autoheight-carousel></div>
````
[demo](http://creatiointl.org/gallery/william/rocket/components-slider-carousel.php)

#【 Addons 】
#### type
`type` is a shorthand mixin for type.
```` scss
@mixin type($key);
// pattern
$key: $font-size $font-weight $font-style $line-height $font-family $text-align $text-transform 

h1 { @include type(20px 'Georgia, Helvetica, sans-serif' center 1.4 bold italic) }
// font-size: 20px;
// font-weight: bold; 
// font-style: italic; 
// font-family: 'Georgia, Helvetica, sans-serif';
// text-align: center;
// line-height: 1.4;

// Tips: to set 'font-weight', 'font-style', 'text-align' or 'text-transform' value 
// to 'inherit' or 'normal', 
// you need add prefix 'weight-', 'style-' or 'transform-'.

// $ro-font-weights: thin, hairline, 'extra light', 'ultra light', lighter, light, normal, medium, 'semi bold', 'demi bold', bold, bolder, 'extra bold', black, heavy, 100, 200, 300, 400, 500, 600, 700, 800, 900, weight-normal, weight-inherit !default;
// $ro-font-styles: italic, oblique, style-normal, style-inherit !default;
// $ro-text-aligns: left, right, center, justify, align-inherit !default;
// $ro-text-transforms: capitalize, uppercase, lowercase, none, full-width, transform-inherit !default;
````
[demo](http://creatiointl.org/gallery/william/rocket/addons-type.php)

#### opacity
Use `opacity` to set `opacity` property for old IE and modern browsers.
```` scss
@mixin opacity($key);
// pattern
$key: $opacity

.example { @include opacity(0.3); }
````

#### ie-rgba
`ie-rgba` is for getting rgba property for IE8.
```` scss
@mixin ie-rgba($key);
// pattern
$key: $rgba

.lt-ie9 .example { @include ie-rgba(rgba(0,0,0,0.7)); }
// output:
// .lt-ie9 .example {
//   background: none;
//   filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#B3000000,endColorstr=#B3000000);
//   zoom: 1;
// }
````

#### breakpoint (bp)
A shorthand @mixin for break point.
```` scss
@mixin breakpoint($key);
// or @mixin bp($key);
// pattern
$key: $condition $media $breakpoints

@include breakpoint('min' 640) {};
// output: @media (min-width: 40em) {};
@include breakpoint('max' 640 screen) {};
// output: @media screen and (max-width: 40em) {};
@include breakpoint(640 767) {};
// output: @media (min-width: 40em) and (max-width: 47.94em) {};
````
[demo](http://creatiointl.org/gallery/william/rocket/addons-breakpoint.php)

#### visible
A shorthand @mixin for hide elements on some parts of viewport.
```` scss
@mixin visible($key);
// pattern
$key: $media $breakpoints

@include visible(500)
// visible on 500px up on all media
````
[demo](http://creatiointl.org/gallery/william/rocket/addons-visibility.php)

#### hidden
A shorthand @mixin for hide elements on some parts of viewport.
```` scss
@mixin hidden($key);
// pattern
$key: $media $breakpoints

@include hidden(screen 300 500 700)
// hidden between 300px and 500px, and 700px up on screen
````
[demo](http://creatiointl.org/gallery/william/rocket/addons-visibility.php)


#【 Color Functions 】
Please refer to [Adobe Kuler](https://color.adobe.com/create/color-wheel/) and [paletton](http://paletton.com/#uid=1000u0kllllaFw0g0qFqFg0w0aF).   

#### contrast
Get a contrast `font-color` based on the `background-color`.
```` scss
@mixin contrast($key);
// pattern
$key: $color (light $light) (dark $dark)

.main { color: contrast(#a6e36e); }
// color: #a6e36e;
// light: #fff; (default)
// dark: #000; (default)
````
[demo](http://creatiointl.org/gallery/william/rocket/color-contrast.php)

#### adjacent
`adjacent` is for creating adjacent colors.
```` scss
@mixin adjacent($key);
// pattern
$key: $color $order (saturation $saturation) (lightness $lightness) (dist $dist)

.main { color: adjacent(#a6e36e -1 saturation 10% lightness -20% dist 20); }
// color: #a6e36e;
// order: -1;
// saturation: 10%;
// lightness -20%;
// distribution: 20;
````
[demo](http://creatiointl.org/gallery/william/rocket/color-adjacent.php)

#### complementary
`complementary` is for getting a complementary color.
```` scss
@mixin complementary($key);
// pattern
$key: $color (saturation $saturation) (lightness $lightness) (dist $dist)

.main { color: complementary(#a6e36e saturation 20%); }
// color: #a6e36e;
// saturation: 20%;
````
[demo](http://creatiointl.org/gallery/william/rocket/color-complementary.php)

#### split-complementary
`split-complementary` is for getting split-complementary colors based on a given color.
```` scss
@mixin split-complementary($key);
// pattern
$key: $color $order (saturation $saturation) (lightness $lightness) (dist $dist)

.main { color: split-complementary(#a6e36e 2); }
// color: #a6e36e;
// order: 2; (-2 | -1 | 1 | 2)
````
[demo](http://creatiointl.org/gallery/william/rocket/color-split-complementary.php)

#### triad
`triad` is for getting triad colors based on a given color.
```` scss
@mixin triad($key);
// pattern
$key: $color $order (saturation $saturation) (lightness $lightness) (dist $dist)

.main { color: triad(#a6e36e, 2); }
// color: #a6e36e;
// order: 2; (-2 | -1 | 1 | 2)
````
[demo](http://creatiointl.org/gallery/william/rocket/color-triad.php)

#### rectangle
`rectangle` is for getting rectangle colors based on a given color.
```` scss
@mixin rectangle($key);
// pattern
$key: $color $order (saturation $saturation) (lightness $lightness) (dist $dist)

.main { color: rectangle(#a6e36e, -3); }
// color: #a6e36e;
// order: -3; (-3 | -2 | -1 | 1 | 2 | 3)
````
[demo](http://creatiointl.org/gallery/william/rocket/color-rectangle.php)

#### square
`square` is for getting square colors based on a given color.
```` scss
@mixin square($key);
// pattern
$key: $color $order (saturation $saturation) (lightness $lightness) (dist $dist)

.main { color: square(#a6e36e, 3); }
// color: #a6e36e;
// order: 3; (-3 | -2 | -1 | 1 | 2 | 3)
````
[demo](http://creatiointl.org/gallery/william/rocket/color-square.php)


#【 kit.js 】
Kit.js is small Javascript library similar with jQuery. Kit.js works well on IE8 and up, and on other morden browsers.   
The follow metheds are available:   
`on`, `off`, `click`, `mouseover`, `mouseout`, `focus`, `blur`, `submit`, `keydown`, `keyup`,   
`find`, `eq`, `filter`, `first`, `last`, `parent`, `parents`, `children`, `firstChild`, `lastChild`, `siblings`, `prev`, `prevAll`, `next`, `nextAll`,   
`hide`, `show`, `fadeIn`, `remove`,   
`text`, `html`, `attr`, `css`, `addClass`, `removeClass`, `toggleClass`, `hasClass`,   
`outerWidth`, `outerHeight`, `getTop`, `getLeft`, `offset(left top)`,   
`before`, `after`, `append`, `prepend`  

#### Ready
```` javascript
ready(function () {
  ...
});
````

#### Dom methods
```` javascript
k('.header').parent().addClass('newclass');
k('.button').siblings('p').css({
  'color': 'red',
  'line-height': '1.5'
});
````

#### Event
```` javascript
k('.icon-menu').click(function() {
  k(this).parent().toggleClass('active');
});

k('.news').on('mouseover', function() {
  k(this).css('background-color', 'blue');
});
````

#### forEach
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

#### Reach
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

#### scrollTo
Scroll to some point in a given period of time.  
```` javascript
scrollTo (to,duration);

k('.icon-menu').click(function() {
  scrollTo (0,200); // scroll to top in 200ms
});
````

#### numIncrease
Increase numbers in given period of time.
```` javascript
numIncrease(element, from, to, duration);

document.onload = function  () {
  numIncrease(k('.follows'), 0, 200000, 400);
};
````

#### animate
```` javascript
animate(el, attr, from, to, duration);
animate(k('.target'), 'left', 0, 20, 400);
````

#### equalizer
```` javascript
equalizer('.item1', '.item2');
equalizer('.gallery li');
````

#### sticky
```` javascript
sticky(sticky, sticky_container, distance_to_window_top);
sticky('.sticky', '.wrapper', '.header');
sticky('.sticky', '.wrapper', 20);
````
