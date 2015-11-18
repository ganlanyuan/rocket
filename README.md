# Rocket v3
<p>
  <img src="https://img.shields.io/badge/sass-3.4.0-ff69b4.svg">
  <img src="https://img.shields.io/badge/Libsass-3.2.0-b6f07e.svg">
  <img src="https://img.shields.io/badge/Version-3.1.1-blue.svg">
</p>
Rocket is a powerful SASS library to help web developers handle layout, color and build components.   
[demos](http://creatiointl.org/gallery/william/rocket/v3/demos/layout-grid.php)   
[Changelog](https://github.com/ganlanyuan/rocket/blob/master/changelog.md)   

##### What's new in version 3
Rewrite main layout mixins using `flex-box`. 
Add many new sass mixins, components and javascript components.
+ Scss: `grid`, `metro` , `liquid-3` , `charts` , `validation` , `responsive-type`  
+ Javascript: `sticky` , `priority-nav` , `equalizer` , `reach` , `scrollTo`
+ Improved `breakpoint`: use a single breakpoint (e.g. 800) for both `min` and `max` instead of two (e.g. 799 for `max`, 800 for `min`). You can set `$breakpoint-fix: false;` to turn off this feature.

##### Requests
+ [Modernizr](http://v3.modernizr.com/) (`csstransforms`, `cssanimations`, `flexbox`, `flexboxlegacy`, `flexboxtweener`, `flexwrap`)    
+ [Selectivizr](http://selectivizr.com/) and a Javascript library (if you're not using one)   

#### Tips
+ `Flexbox` 2009 syntax is not supported.  
+ If you are using version 2, please go to branch [v2](https://github.com/ganlanyuan/rocket/tree/v2) 

# Install

Install with [Bower](http://bower.io/): 
```` bash
$ bower install rocket
````
Install with [git](http://www.git-scm.com/):
```` bash
$ git clone https://github.com/ganlanyuan/rocket.git
````
# Structure
```` html 
Rocket/ 
|── scss/   
|   |── layout              
|   |   |── container             
|   |   |── grid                  
|   |   |── liquid-2              
|   |   |── liquid-3              
|   |   |── gallery               
|   |   |── metro               
|   |   |── diamond               
|   |   |── angled-edges               
|   |   |── sticky-footer               
|   |   |── justify               
|   |   |── center   
|   |                                          
|   |── components 
|   |   |── charts
|   |   |── responsive-table
|   |   |── off-canvas
|   |   |── slider-carousel
|   |   |── slider-gallery
|   |   |── validation
|   |   |── button
|   |   |── parallelogram
|   |   |── drop-shadows
|   |   |── switch
|   |   |── push-toggle
|   |   |── checkbox
|   |   |── input-file
|   |   |── tabs
|   |   |── accordion
|   |   |── dropdown
|   |   |── tooltip
|   |   |── media-list
|   |   |── flex-media
|   |
|   |── addons              
|       |── type                  
|       |── responsive-type (rp-type) 
|       |── visible               
|       |── hidden                
|       |── breakpoint (bp)       
|       |── quantity-query (at-least, at-most, equal-to, between)       
|       |── hide-text               
|       |── opacity               
|       |── ie-rgba               
|       |── em                  
|       |── rem                  
|       |── rems                  
|       |── color functions  
|           |── analogous
|           |── contrast
|           |── adjacent
|           |── complementary
|           |── split-complementary
|           |── triad
|           |── rectangle
|           |── square                              
|── js/ 
    |── base                                           
    |── components
        |── ie-placeholder                                        
        |── animate                                        
        |── numChange                                        
        |── sticky                                        
        |── priority-nav
        |── equalizer                                        
        |── reach                                        
        |── scrollTo                                        
````

#【 Layout 】
#### layout setting
```` scss
// global layout setting
$ro-layout: (
  container: 1024px,
  gutter: 20px,
);
````

#### container
The container of the main content. It can be center, left or right aligned.
````html
<div class="header container">
  <!-- other elements -->
</div>
````
```` scss
@mixin container($key)
// pattern
$key: $container (gutter $gutter) $align

.container { @include container(); }
// container: 1024px;
// gutter: 20px; (default)
// align: center; (default)

.container { @include container(1200px gutter 2% left); }
// container: 1200px
// gutter: 2%;
// align: left;
````

#### grid
Make a grid is supper easy. Just `@include grid()` at the wrapper element, then pass a list parameter with each column width. 
````html
<div class="row">
  <div></div>
  <div></div>
  <div></div>
</div>
````
```` scss
@mixin grid($key)
// pattern
$key: (grid $list / $map) (bp $breakpoints) (gutter $gutter) (child $child) $direction $condition $media-type keep;
// $condition: 'min' or 'max'
// $media-type: screen, print, tv
// $direction: from left to right => right (default), from right to left => left

.row { @include grid( 'grid' (3 7 4) ); }
// 1st child: 3 columns;
// 2nd child: 7 columns;
// 3rd child: 4 columns;
// total columns: 3 + 7 + 4 = 14

// change orders
.row { @include grid( 'grid' (3 7 4 : 1 0 0) ); } // or (3:1, 7:0, 4:0)
// children orders: 1 0 0; 
// elements with smaller order will go to the front, with equal orders will go with the origin order in markup.
// more detail about orders please refer to http://the-echoplex.net/flexyboxes/?fixed-height=on&legacy=on&display=flex&flex-direction=row&flex-wrap=nowrap&justify-content=flex-start&align-items=flex-start&align-content=stretch&order[]=0&flex-grow[]=0&flex-shrink[]=1&flex-basis[]=auto&align-self[]=auto&order[]=0&flex-grow[]=0&flex-shrink[]=1&flex-basis[]=auto&align-self[]=auto&order[]=0&flex-grow[]=0&flex-shrink[]=1&flex-basis[]=auto&align-self[]=auto

// several rows
$main: ( (3 7 4) (2 5) );
.row { @include grid('grid' $main); }
// first 3 elements will occupy one row
// last 2 elements will occupy the second row

// with mediaquery
$breakpoints: (
  medium: 800px,
  large: 1200px,
);
$main: (
  'default': (3 4) ( 2 5) 1,
  medium: (2 7 3: 1 0 1) (1 1: 1 0),
  1000px: (2 7 3 4 4),
);
.row { @include grid('grid' $main bp $breakpoints); }
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/layout-grid.php)

#### liquid-2
`liquid-2` is for creating a two columns layout: One is fixed, another is flexible.     
Similar with grid, you can use list or map as a parameter to set up the layout.
````html
<div class="wrapper">
  <div></div>
  <div></div>
</div>
````
```` scss
// scss
@mixin liquid-2($key)
// pattern
$key: ($list or $map) (gutter $gutter) (child $child) keep

.wrapper { @include liquid-2( (null 200px) ); }
// 1st child width: flexible;
// 2nd child width: 200px;

.wrapper { @include liquid-2( (null:2, 200px:1) ); }
// children orders: 2 1;
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/layout-liquid-2.php)

#### liquid-3
`liquid-3` is for creating a three columns layout: one is flexible, another two are fixed.     
Similar with grid, you can use list or map as a parameter to set up the layout.
````html
<div class="wrapper">
  <div></div>
  <div></div>
</div>
````
```` scss
// scss
@mixin liquid-3($key)
// pattern
$key: ($list or $map) (gutter $gutter) (child $child) keep

.wrapper { @include liquid-3( (150px null 200px) ); }
// 1st child width: 150px;
// 2nd child width: flexible;
// 3rd child width: 200px;

.wrapper { @include liquid-3( (150px:0, null:2, 200px:1) ); }
// children orders: 0 2 1;
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/layout-liquid-3.php)

#### gallery
`gallery` is for creating picture galleries.
````html
<ul class="gallery">
  <li></li>
  <li></li>
  <li></li>
  <li></li>
  <li></li>
  <li></li>
  <li></li>
</ul>
````
```` scss
@mixin gallery($key);
//pattern
$key: ($map / $per-row) (gutter $gutter) (child $child) $condition $direction keep;
// $condition: 'min' | 'max'
// $map: ( $breakpoint: $per-row, ...)
// $direction: left | right

.gallery { @include gallery(3); }
// per-row: 3;

.gallery { @include gallery(4 gutter 2% left); }
// per-row: 4;
// gutter: 2%;
// direction: right -> left

// with breakpoints
$map: (
  'null': 2, 
  600: 3,
  800: 4,
);
.gallery { @include gallery($map); }
// default: 2 items per row
// 600px and up: 3 items per row
// 800px and up: 4 items per row
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/layout-gallery.php)

#### metro
`metro` is for creating block layout inspired by Windows 8. Use nested `metro` to make complex layout.
````html
<ul class="main">
  <li>
    <div class="metro-item"></div>
  </li>
  <li>
    <div class="metro-item"></div>
  </li>
  <li>
    <div class="metro-item"></div>
  </li>
  <li>
    <div class="metro-item"></div>
  </li>
  <li>
    <div class="metro-item"></div>
  </li>
</ul>
````
```` scss
// global metro setting
$ro-metro: (
  'gutter': 0,
  'ratio': 1,
  'child': '*',
);

@mixin metro($key)
//pattern
$key: $map (ratio $ratio) (gutter $gutter) (child $child) $condition $media-type

.main { @include metro( (null: 3 1 h2 1 w3 of 3, 800: 3 1 h2 1 w3 of 4) ); }
// null 800: media query, null -> default, 800 -> 800px and up;
// 3: 1st child -> 3 blocks width x 3 blocks height
// 1: 2nd child -> 1 blocks width x 1 blocks height
// h2: 3rd child -> 1 blocks width x 2 blocks height
// 1: 4th child -> 1 blocks width x 1 blocks height
// w3: 5th child -> 3 blocks width x 1 blocks height
// "of 3": totaly 3 blocks width;

// condition: media query condition 'min' or 'max';
// media-type: media type like 'screen', 'print'

````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/layout-metro.php)

#### diamond
````html
<div class="wrapper"> <!-- 'wrapper' could be any valid class name -->
  <div class="diamond"> <!-- 'diamond' could be any valid class name -->
    <div class="diamond-content"> <!-- class 'diamond-content' is required -->
      <div>content</div>
    </div>
  </div>
  <div class="diamond">
    <div class="diamond-content">
      <div>content</div>
    </div>
  </div>
  <div class="diamond">
    <div class="diamond-content">
      <div>content</div>
    </div>
  </div>
  <div class="diamond">
    <div class="diamond-content">
      <div>content</div>
    </div>
  </div>
  <div class="diamond">
    <div class="diamond-content">
      <div>content</div>
    </div>
  </div>
  <div class="diamond">
    <div class="diamond-content">
      <div>content</div>
    </div>
  </div>
</div>
````
```` scss
@mixin diamond($key)
//pattern
$key: ($per-row / $size) $shape 'combined' $selector-type 'keep';
// $shape: 'diamond' | 'octagon'
// $selector-type: 'nth' | 'type' (:nth-child | :nth-of-type)

.diamond { @include diamond(5 'combined'); }
// per-row: 5 (5 diamonds per row)

.diamond { @include diamond(20%); }
// diamond size: 20% (could be fixed value like 200px too)
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/layout-diamond.php)

#### angled-edges
Create `angled-edges` layout. `background` could be image, gradient or pure color, but the background of sibling elements must be pure color.
````html
<div class="main">
  <!-- Content goes here -->
</div>
````
```` scss
@mixin angled-edges($key);
// pattern
$key: $edges $angle flip;
// $edges: top | bottom | both

.main { @include angled-edges("bottom" -5deg); }
// edge: bottom;
// angle: -5deg;
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/layout-angled-edges.php)

#### sticky-footer
Create `sticky-footer` to prevent layout collapse when content is less, like on 404 page.
````html
<body>
  <header>header</header>
  <div class="main">main</div>
  <footer>footer</footer>
</body>
````
```` scss
@mixin sticky-footer($key);
// pattern
$key: $main;

body { @include sticky-footer('.main'); }
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/layout-sticky-footer.php)

#### justify
`justify` is for creating `justify` layout.
````html
<ul class="justify">
  <li></li>
  <li></li>
  <li></li>
  <li></li>
  <li></li>
</ul>
````
```` scss
@mixin justify($key);
// pattern
$key: (child $child)

.justify { @include justify(); }
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/layout-justify.php)

#### center
`center` is for creating both horizontal and vertical center aligned layout.
````html
<div class="popup">
  <div></div>
</div>
````
```` scss
@mixin center($key)
// pattern
$key: $child $align

.popup { @include center('div' left); }
// child: div;
// align: left; (left | right | center, for old browser)
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/layout-center.php)


#【 Components 】
#### Charts
Pure css responsive charts. Currently only include `bar` and `column`, more types will be added soon.
````html
<div class="charts">
  <!-- items: charts body -->
  <ul class="items">
    <li class="item-1">
      <strong>Copper</strong> <!-- title -->
      <span></span> <!-- graphic -->
    </li>
    <li class="item-2">
      <strong>Silver</strong>
      <span></span>
    </li>
    <li class="item-3">
      <strong>Gold</strong>
      <span></span>
    </li>
    <li class="item-4">
      <strong>Platinum</strong>
      <span></span>
    </li>
  </ul>
  <!-- ticks: charts grid -->
  <div class="ticks">
    <div class="tick-1"><span></span></div>
    <div class="tick-2"><span></span></div>
    <div class="tick-3"><span></span></div>
    <div class="tick-4"><span></span></div>
    <div class="tick-5"><span></span></div>
    <div class="tick-6"><span></span></div>
    <div class="tick-7"><span></span></div>
    <div class="tick-8"><span></span></div>
    <div class="tick-9"><span></span></div>
    <div class="tick-10"><span></span></div>
    <div class="tick-11"><span></span></div>
    <div class="tick-12"><span></span></div>
    <div class="tick-13"><span></span></div>
  </div>
  <!-- labels: charts label -->
  <div class="labels">
    <div class="label-1">sales</div>
  </div>
</div>
````
````scss
@mixin charts($key)
// pattern
$key: ($data: $color: data, ...) $chart-type ('bar-height' $bar-height) ('bar-gap' $bar-gap) ('steps' $steps) (gutter $gutter) (animation $animation-val) (hide $hide)

$data1: (
  #5AB5E1: 8.9 10.5 19.3 21.45,
);
.charts { @include charts($data1 'bar' 'steps' (2 22) animation (0.6s)); }
// single factor bar charts
// steps: unit 2, total 22
// animation: 0.6s ease (add class '.active' to charts to show animation)

$data2: (
  #E44B22: 8.9 10.5 19.3 21.45,
  #E48A22: 5 10 16 22,
  #22A1E4: 10.7 12 12 18,
);
.charts { @include charts($data2 'column' 'steps' (2 24) 'hide' ('numbers' 'labels')); }
// multiply factors column charts
// steps: unit 2, total 24
// hide: numbers and labels
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/components-charts.php)

#### off-canvas
Pure css off-canvas with multiple modes.  
```` html
<!-- modes: slide-in, rotate-in, rotate-out, rotate-in-reverse, push, drawer -->
<input type="checkbox" name="" id="nav-toggle">
<div class="page">
  <header>
    <label for="nav-toggle">Menu</label>
    <label for="nav-toggle" class="page-overlay"></label>
    <nav class="nav">
      <ul>
        <li><a href="">How It Works</a></li>
        <li><a href="">Compare</a></li>
        <li><a href="">Technology</a></li>
        <li><a href="">Careers</a></li>
        <li><a href="">Help</a></li>
      </ul>
    </nav>
  </header>
  <div>Other content</div>
</div>

<!-- modes: slide-along, slide-out, scale-down, scale-up, open-door, reveal -->
<!-- If you using these modes, make sure to compile it with Ruby Sass, not Libsass. Current Libsass doesn't fully support @at-root. -->
<input type="checkbox" name="" id="nav-toggle">
<nav class="nav">
  <ul>
    <li><a href="">How It Works</a></li>
    <li><a href="">Compare</a></li>
    <li><a href="">Technology</a></li>
    <li><a href="">Careers</a></li>
    <li><a href="">Help</a></li>
  </ul>
</nav>
<div class="page">
  <header>
    <label for="nav-toggle">Menu</label>
    <label for="nav-toggle" class="page-overlay"></label>
  </header>
  <div>Other content</div>
</div>

<!-- Sub menu -->
<!-- 1. Add [data-has-submenu] to parent item, [data-submenu] to submenu. -->
<!-- 2. Place a checkbox and label before submenu, connect them by [for] and [id]. -->
<nav class="nav">
  <ul>
    <li><a href="">How It Works</a></li>
    <li><a href="">Compare</a></li>
    <li><a href="">Technology</a></li>
    <li><a href="">Careers</a></li>
    <li data-has-submenu>
      <input type="checkbox" id="subnav-1-1" class="hidden-checkbox">
      <label for="subnav-1-1">&gt;</label>
      <a href="">Careers</a>
      <ul data-submenu>
        <li><label for="subnav-1-1" data-back>Back</label></li>
        <li><a href="">sub item 1</a></li>
        <li><a href="">sub item 2</a></li>
        <li><a href="">sub item 3</a></li>
      </ul>
    </li>
    <li><a href="">Help</a></li>
  </ul>
</nav>

````
```` scss
@mixin off-canvas($key)
// pattern
$key: $mode $nav 'submenu' $nav-width $direction ($map $breakpoints) $overlay-background-color $duration

// normal
.page { @include off-canvas('slide-in' left 'submenu' '.nav' rgba(0, 0, 0, 0.1) 200px 0.5s); }
// mode: slide-in; (slide-in | slide-along | slide-out | rotate-in | rotate-out | rotate-in-reverse | scale-down | scale-up | open-door | push | reveal | drawer)
// direction: left; (left | right | top | bottom)
// nav: .nav;
// nav-width(or height): 200px; (default 240px)
// submenu: has sub menu;
// overlay-background-color: rgba(0, 0, 0, 0.1);
// duration: 0.5s;

// For mode "drawer": 
// you need set a dynamic gutter between the nav and the top edge of the window.
// The format is map: $keys => break points, values => gutters.
// You can use the keys form your $breakpoints.
$breakpoints: (
  small: 600px,
  medium: 1000px,
);
$map: (
  500px: 20px, 
  small: 30px, 
  medium: 40px, 
  null: 50px 
);
// null means default (without media query)

.page { @include off-canvas("drawer" ".nav" left $map $breakpoints rgba(0, 0, 0, 0.1) 200px 0.5s); }
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/components-off-canvas.php)

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
  <div class="autoplay">
    <div class="autoplay-progress"></div>
    <label for="banner-autoplay"><span class="play"></span><span class="pause"></span></label>
  </div>
</div>
````

#### slider-carousel
```` scss
// basic
@mixin slider-carousel($key)
// pattern
$key: ($items by $perpage) (gutter $gutter) $style center bypage autoplay autoplay-js (timeout $timeout) (speed $speed) hoverpause progress-bar keep;

.slider { @include slider-carousel(5 by 2 bypage); }
// items: 5;
// perpage: 2;
// gutter: 10px; (default)
// bypage: true;

// customise dots, controls and progress-bar
.slider .dots .normal { ... }
.slider .dots .active { ... }
.slider .controls .prev { ... }
.slider .controls .next { ... }
.slider .autoplay-progress { ... }
````

*Autoplay*  
You can set up autoplay by passing an `autoplay` parameter to the `slider-gallery` mixin (which is using css animation, therefore it's not clickable), or passing an `autoplay-js` parameter, and then add js code like below (this is clickable):  
```` javascript
<script>
  sliderAutoplay(selector, timeout, pages, hoverPause);
  // pages: total slider pages

  ready(function () {
    sliderAutoplay('.gallery-b', 2000);
  });
</script>
````

*Autoheight*   
Add `kit.min.js` to `html`, and then run `autoheightCarousel` function.
```` html
<!-- include kit.js -->
<script src="path/to/kit.min.js"></script>
<script>
  ready(function () {
    autoheightCarousel('.carousel-h'); 
  });
</script>
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/components-slider-carousel.php)

#### slider-gallery
```` scss
// basic
@include slider-gallery($key)
// pattern
$key: $items $style $directon $angle autoplay autoplay-js (speed $speed) (timeout $timeout) hoverpause progress-bar keep

.slider { @include slider-gallery(5 speed 0.5s timeout 4s autoplay progress-bar); }
// items: 5;
// speed: 0.5s; (default 1s)
// timeout: 4s; (default 3s)
// autoplay: true;

// customise dots, controls and progress-bar
.slider .dots .normal { ... }
.slider .dots .active { ... }
.slider .controls .prev { ... }
.slider .controls .next { ... }
.slider .autoplay-progress { ... }

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
*Autoplay*  
Same with `slider-carousel`.   

*Autoheight*   
Add `kit.min.js` to `html`, and then run `autoheightGallery` function.
```` html
<!-- include kit.js -->
<script src="path/to/kit.min.js"></script>
<script>
  ready(function () {
    autoheightGallery('.gallery-c'); 
  });
</script>
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/components-slider-gallery.php)

#### validation
Html5 form validation using [H5F](https://github.com/ryanseddon/H5F). We already include H5F in `kit.js` (with a little bit modification), so you don't need download it again.     
Set your customized alerts information through `<div data-info=""></div>`.
````html
<form action="" class="myform">
  <ol>
    <li>
      <label for="name">Name</label>
      <input type="text" id="name" pattern="[a-zA-Z]{6,}" required>

      <!-- alerts -->
      <div data-info="valid">User name is valid.</div>
      <div data-info="required">Valid user name required.</div>
      <div data-info="error">User name must be at least 6 characters.</div>
    </li>
    <li> … </li>
    <li> … </li>
    <li><input type="submit" value="Submit"></li>
  </ol>
</form>
````
````javascript
// run form validation
window.onload = function () {
  H5F.setup(document.querySelectorAll(".myform"));
}
````
````scss
@mixin validation($key)
// pattern
$key: $style $direction $shake $speed $duration default;
// style: 'normal' | 'fade-in' | 'slide-in'

.myform { @include validation(slide-in right default); }
// style: slide-in;
// direction: right;
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/components-validation.php)

#### button
````html
<!-- normal: you can use button on any tag -->
<span class="button">button</span>
<!-- push: inner span tag, data-text attribute -->
<span class="push" data-text="star"><span>push</span></span>
<!-- line-drawing: 4 empty span tags -->
<span class="line-drawing">line-drawing
  <span></span>
  <span></span>
  <span></span>
  <span></span>
</span>
````
````scss
@mixin button($key)
// pattern
$key: $padding ($border-radius | round) ($background-color $active-color) $hover $direction $duration $timing-function;
// hover: 'highlight' | 'simple' | 'slide' | 'ripple' | 'veil' | 'push' | 'cut' | 'bubble' | 'line-drawing'
// direction: left, right, top, bottom, 'horizontal', 'vertical'

.button { @include button('1em 2em' #2B8ACF #52CFDB 5px bubble); }
// padding: 1em 2em; (padding must be quoted)
// background-color: #2B8ACF;
// active-color: #52CFDB;
// border-radius: 5px; 
// hover: bubble;
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/components-button.php)

#### parallelogram
Create parallelogram style.
````html
<div class="box"></div>
````
````scss
@mixin parallelogram($key);
// pattern
$key: $background $angle

.box { @include parallelogram(#61A4DE -30deg); }
// $background: #61A4DE; 
// $angle: -30deg;
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/components-parallelogram.php)

#### drop-shadows
Thanks [Nicolas Gallagher](http://nicolasgallagher.com/css-drop-shadows-without-images/) for the idea.
````html
<div class="box"></div>
````
````scss
@mixin drop-shadows($key);
// pattern
$key: $style $direction $color $shadow-size;
// $style: 'lifted' | 'raised' | 'perspective' | 'curve'
// $direction: left | right | top | bottom | 'horizontal' | 'vertical'

.box { @include drop-shadows(curve horizontal 20px); }
// $style: 'curve'; 
// $direction: horizontal;
// $shadow-size: 20px;
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/components-drop-shadows.php)

#### switch
Pure css switch.   
```` html
<div class="switch">
  <input type="checkbox" id="switch1" name="switch">
  <label for="switch1"></label>
</div>
````
```` scss
@mixin switch($key)
//pattern
$key: $style $size $active-color (text $text) (radius | round);
// $style: 'toggle' | 'slider'

.switch { @include switch(round text ("on" "off") 36px #399DE1); }
// style: toggle; (default)
// text: on off;
// size: 36px;
// active-color: #399DE1;
// round: true;
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/components-switch.php)

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
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/components-push-toggle.php)    

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
@mixin checkbox() {
  @content;
}

.radio {
  @include checkbox() {
    padding: 4px 0 4px 26px;
    background: url('../images/radio.png') 0 50% no-repeat;
  }
}
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/components-checkbox.php)   

#### checkbox-active
Radios or checkboxes' active style.   

```` scss
@mixin checkbox-active() {
  @content;
}

.radio {
  @include checkbox-active() {
    background-image: url('../images/radio-active.png');
  }
}
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/components-checkbox.php)    

#### input-file
Customize `input[type="file"]`. Thanks [Osvaldas Valutis](http://tympanus.net/codrops/2015/09/15/styling-customizing-file-inputs-smart-way/) for the idea.
```` html
<div class="input-file">
  <input type="file" name="file" id="file" class="inputfile" data-multiple-caption="{count} files selected" multiple />
  <label for="file"><span>Choose a file</span></label>
</div>
````
```` scss
@mixin input-file() {
  @content;
}

.radio {
  @include input-file() {
    // customized style goes here
  }
}
````
```js
// link input-file.js to your page
<script src="path/to/input-file.js"></script>
<script type="text/javascript">
  inputFile('#file');
</script>
```
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/components-input-file.php)   

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
@mixin tabs($key)
// pattern
$key: $length $style

.your-tab-class { @include tabs(3 'carousel'); }
// length: 3; (3 tabs)
// style: carousel; (normal | carousel | customize)
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/components-tabs.php)

#### tabs-active
Set tabs' active styles.   
```` scss
@mixin tabs-active($key)
// pattern
$key: $length

.your-tab-class { 
  @include tabs-active(3) {
    // tab active style
  } 
}
// length: 3; (3 tabs)
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/components-tabs.php)

#### tabs-panel-active
Set panels' active styles.   
```` scss
@mixin tabs-panel-active($key)
// pattern
$key: $length

.your-tab-class { 
  @include tabs-panel-active(3) {
    // panel active style
  } 
}
// length: 3; (3 tabs)
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/components-tabs.php)

#### accordion
Pure css accordion.   
```` html
<div class="accordion">
  <input type="checkbox" name="" id="accordion-checkbox-1">
  <label for="accordion-checkbox-1"><strong>About Us</strong></label>
  <div>
    <p>Well, the way they make shows is, they make one show. That show's called a pilot. Then they show that show to the people who make shows, and on the strength of that one show they decide if they're going to make more shows.</p>
  </div>
</div>
````
```` scss
@mixin accordion($key)
//pattern
$key: $content $max-height $transition-duration

.accordion { @include accordion(div 200px 0.4s); }
// $content: div;
// $max-height: 200px;
// $transition-duration: 0.4s;
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/components-accordion.php)

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
@mixin dropdown($key)
// pattern
$key: $child $show $style $direction $duration default;
// $show: 'hover' | 'click'
// $style: 'display' | 'scale' | 'rotate'

.dropdown { @include dropdown(ul hover display right default); }
// child: ul;
// show: hover;
// style: display;
// direction: right; 
// default: true; (use default dropdown menu style)
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/components-dropdown.php)

#### tooltip
pure css `tooltip`.
````html
<p>Hic, deleniti itaque expedita placeat in veritatis <a href="" class="tooltip" data-tooltip="Tooltip content">consectetur</a> explicabo non odit sed animi quos quibusdam adipisci. Vero dolores animi impedit tempore tenetur.</p>
````
```` scss
@mixin tooltip($key)
// pattern
$key: $direction $color (width $width) (height $height) radius

.tooltip { @include tooltip(radius right #b02df3 width 300px); }
// radius: 0.22em; (This can be custmized by changing "$ro-tooltip-radius: 0.22em !default;")
// direction: right;
// background-color: #b02df3;
// width: 300px; (for old browsers)
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/components-tooltip.php)

#### Media-list
`media-list` displays a media object (images, video, audio) to the left or right of a block object.
````html
<ul class="news">
  <li>
    <figure class="media"><a href=""><img src="http://placehold.it/120x80" alt=""></a></figure>
    <div class="media-body">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam animi tempore harum dignissimos error maxime, porro, quis dolorum laboriosam recusandae officia repudiandae natus mollitia id amet voluptatibus. Quibusdam, facilis! Hic.</p>
    </div>
  </li>
</ul>
````
```` scss
@mixin media-list($key)
// pattern
$key: $role $gutter $direction

.news .media { @include media-list(); } 
// role: 'media'; (media:default | media-body)
// gutter: 10px; (default)
// direction: left; (default)

.news .media { @include media-list('media' 15px right); }
// role: 'media';
// gutter: 15px;
// direction: right;

.news .media-body { @include media-list('media-body'); }
// role: 'media-body'; 
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/components-media-list.php)

#### flex media
````html
<div class="video">
  <iframe width="560" height="315" src="//www.youtube.com/embed/Rb0UmrCXxVA" frameborder="0" allowfullscreen></iframe>
</div>
````
```` scss
@mixin flex-media($key)
// pattern
$key: $ratio $child

.video { @include flex-media(3/4); }
// ratio: 3/4;
// child: iframe, object, embed; (default)

.svg-wrapper { @include flex-media(9/16 svg); }
// ratio: 9/16;
// child: svg; 
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/components-flex-media.php)

#【 Addons 】
#### type
`type` is a shorthand mixin for type.
```` scss
@mixin type($key)
// pattern
$key: $font-size $font-weight $font-style $line-height $font-family $text-align $text-transform 

h1 { @include type(20px 'Georgia, Helvetica, sans-serif' center 1.4 bold italic); }
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
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/addons-type.php)

#### responsive-type (rp-type)
Responsive type.     
Everything you can do with `type` you can do with `responsive-type`.    
```` scss
@mixin font-size($key)
// pattern
$key: $map, $breakpoints: $bp

$bp: (
  small : 480px,
  medium: 700px,
  large : 1024px
);
$p-font-sizes: (
  null  : (15px 1.3 right uppercase),
  small : 16px
  medium: (17px 1.4),
  900px : 18px
  large : (19px 1.45),
  1440px: 20px
);
$h3-font-sizes: (
  null  : (18px 1.3 weight-normal),
  900px : 22px
  large : (30px 1.2),
);

h3.example-font-size { @include rp-type($h3-font-sizes $bp); }
p.example-font-size { @include rp-type($p-font-sizes $bp); }
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/addons-font-size.php) 

#### hide-text
Visually hide a text element.
```html
  <h1 class="logo">Brand Name</h1>
```
```` scss
@mixin hide-text();
%hide-text {};

.logo { 
  @extend %hide-text; 
  // or @include hide-text(); 
}
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/addons-hide-text.php) 

#### opacity
Use `opacity` to set `opacity` property for old IE and modern browsers.
```` scss
@mixin opacity($key)
// pattern
$key: $opacity

.example { @include opacity(0.3); }
````

#### ie-rgba
`ie-rgba` is for getting rgba property for IE8.
```` scss
@mixin ie-rgba($key)
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
A shorthand @mixin for breakpoints.    
Use a single breakpoint (e.g. 800) for both `min` and `max` instead of two (e.g. 799 for `max`, 800 for `min`). 
```` scss
@mixin breakpoint($key)
// pattern
$key: $condition $media $breakpoints

@include bp('min' 640) {};
// output: @media (min-width: 40em) {};
@include bp('max' 640 screen) {};
// output: @media screen and (max-width: 40em) {};
@include bp(400 767 1000 1200 1500) {};
// output: @media (min-width: 25em) and (max-width: 47.875em), (min-width: 62.5em) and (max-width: 74.9375em), (min-width: 93.75em) {};
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/addons-breakpoint.php)

## quantity-query
#### at-least
```` scss
@mixin at-least($key) {
  @content;
}
// pattern
$key: $selector number

.nav {
  @include at-least('li' 4) { width: 25%; }
}
````

#### at-most
```` scss
@mixin at-most($key) {
  @content;
}
// pattern
$key: $selector number

.nav {
  @include at-most('li' 4) { width: 25%; }
}
````

#### equal-to
```` scss
@mixin equal-to($key) {
  @content;
}
// pattern
$key: $selector number

.nav {
  @include equal-to('li' 4) { width: 25%; }
}
````

#### between
```` scss
@mixin between($key) {
  @content;
}
// pattern
$key: $selector number number

.nav {
  @include between('li' 4 6) { width: 25%; }
}
````
[quantity-query demo](http://creatiointl.org/gallery/william/rocket/v3/demos/addons-quantity-query.php)

## visibility
#### visible
A shorthand @mixin for hide elements on some parts of viewport.
```` scss
@mixin visible($key)
// pattern
$key: $media-type $breakpoints

@include visible(500)
// visible on 500px up on all media
````

#### hidden
A shorthand @mixin for hide elements on some parts of viewport.
```` scss
@mixin hidden($key)
// pattern
$key: $media-type $breakpoints

@include hidden(screen 300 500 700)
// hidden between 300px and 500px, and 700px up on screen
````
[visibility demo](http://creatiointl.org/gallery/william/rocket/v3/demos/addons-visibility.php)


#【 Color Functions 】
Please refer to [Adobe Kuler](https://color.adobe.com/create/color-wheel/) and [paletton](http://paletton.com/#uid=1000u0kllllaFw0g0qFqFg0w0aF).   

#### contrast
Get a contrast `font-color` based on the `background-color`.
```` scss
@mixin contrast($key)
// pattern
$key: $color (light $light) (dark $dark)

.main { color: contrast(#a6e36e); }
// color: #a6e36e;
// light: #fff; (default)
// dark: #000; (default)
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/color-contrast.php)

#### adjacent
`adjacent` is for creating adjacent colors.
```` scss
@mixin adjacent($key)
// pattern
$key: $color $order (saturation $saturation) (lightness $lightness) (dist $dist)

.main { color: adjacent(#a6e36e -1 saturation 10% lightness -20% dist 20); }
// color: #a6e36e;
// order: -1;
// saturation: 10%;
// lightness -20%;
// distribution: 20;
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/color-adjacent.php)

#### complementary
`complementary` is for getting a complementary color.
```` scss
@mixin complementary($key)
// pattern
$key: $color (saturation $saturation) (lightness $lightness) (dist $dist)

.main { color: complementary(#a6e36e saturation 20%); }
// color: #a6e36e;
// saturation: 20%;
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/color-complementary.php)

#### split-complementary
`split-complementary` is for getting split-complementary colors based on a given color.
```` scss
@mixin split-complementary($key)
// pattern
$key: $color $order (saturation $saturation) (lightness $lightness) (dist $dist)

.main { color: split-complementary(#a6e36e 2); }
// color: #a6e36e;
// order: 2; (-2 | -1 | 1 | 2)
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/color-split-complementary.php)

#### triad
`triad` is for getting triad colors based on a given color.
```` scss
@mixin triad($key)
// pattern
$key: $color $order (saturation $saturation) (lightness $lightness) (dist $dist)

.main { color: triad(#a6e36e, 2); }
// color: #a6e36e;
// order: 2; (-2 | -1 | 1 | 2)
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/color-triad.php)

#### rectangle
`rectangle` is for getting rectangle colors based on a given color.
```` scss
@mixin rectangle($key)
// pattern
$key: $color $order (saturation $saturation) (lightness $lightness) (dist $dist)

.main { color: rectangle(#a6e36e, -3); }
// color: #a6e36e;
// order: -3; (-3 | -2 | -1 | 1 | 2 | 3)
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/color-rectangle.php)

#### square
`square` is for getting square colors based on a given color.
```` scss
@mixin square($key)
// pattern
$key: $color $order (saturation $saturation) (lightness $lightness) (dist $dist)

.main { color: square(#a6e36e, 3); }
// color: #a6e36e;
// order: 3; (-3 | -2 | -1 | 1 | 2 | 3)
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/color-square.php)


#【 kit.js 】
`Kit.js` is small Javascript library has similar functions with jQuery. `Kit.js` works well on IE8+ and morden browsers.   
The follow methods are available:   
`on`, `off`, `click`, `mouseover`, `mouseout`, `focus`, `blur`, `submit`, `keydown`, `keyup`,   
`find`, `eq`, `filter`, `first`, `last`, `parent`, `parents`, `children`, `firstChild`, `lastChild`, `siblings`, `prev`, `prevAll`, `next`, `nextAll`,   
`hide`, `show`, `fadeIn`, `remove`,   
`text`, `html`, `attr`, `css`, `addClass`, `removeClass`, `toggleClass`, `hasClass`,   
`outerWidth`, `outerHeight`, `getTop`, `getLeft`, `offset(left top)`,   
`append`, `prepend`, `wrap`, `wrapAll`  

#### Ready
```` javascript
ready(function () {
  ...
});
````

#### Dom methods
```` javascript
kit('.header').parent().addClass('newclass');
kit('.button').siblings('p').css({
  'color': 'red',
  'line-height': '1.5'
});
````

#### Event
```` javascript
kit('.icon-menu').click(function() {
  kit(this).parent().toggleClass('active');
});

kit('.news').on('mouseover', function() {
  kit(this).css('background-color', 'blue');
});
````

#### forEach
```` javascript
kit('.site-nav a').forEach(function (el) {
  el.onclick = function () {
    var targetId = kit(this).attr('href');
        targetPosition = kit(targetId).getTop();
    scrollTo(targetPosition, 400);
    return false;
  }
});
````

#### animate
```` javascript
animate(el, attr, from, to, duration);
animate(kit('.target'), 'left', 0, 20, 400);
````

#### numChange
Smoothly change numbers in given period of time.
```` javascript
numChange(element, from, to, duration);

document.onload = function  () {
  numChange(kit('.follows'), 0, 200000, 400);
};
````

#### sticky
```` javascript
// pattern
sticky(options);
default: { 
  sticky: '.sticky',
  stickyWrapper: false,
  spacing: 0, // can be an element like '.header' which means element height
  stickTo: 'top',
  breakpoints: false,
};

sticky({
  sticky: '.sticky', 
  stickyWrapper: '.wrapper', 
  spacing: 20
});
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/js-sticky.php)

#### priority-nav
````javascript
// pattern
priorityNav (obj, buttonText, restore, distory)
// buttonText can be html code: <span class="icon-menu"></span>
// restore: push back all hidden menu items
// distory: hide all menu items

priorityNav('.nav', 'more', false, 600);
// restore: false
// distory: 600
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/js-priority-nav.php)

#### equalizer
Create equal height boxes.
```` javascript
// pattern
equalizer(obj1, obj2, obj3, ...);

equalizer('.item1', '.item2');
equalizer('.gallery li');
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/js-equalizer.php)

#### reach
`reach` is a function to check if target element reach the top, middle or bottom of the browser window.  
```` javascript
if (kit(el).reach('middle',0)) {
  // if target element reach the middle of the browser, do something
}
if (kit(el).reach('top',20)) {
  // if target element reach the point which is above the top of the browser 20px, do something
}
if (kit(el).reach('bottom',0)) {
  // if target element reach the bottom of the browser, do something
}
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/js-reach.php)

#### scrollTo
Scroll to some point in a given period of time.  
```` javascript
scrollTo (to,duration);

kit('.icon-menu').click(function() {
  scrollTo (0,200); // scroll to top in 200ms
});
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/js-scrollTo.php)

