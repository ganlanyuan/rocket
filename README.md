# Rocket v3
<p>
  <img src="https://img.shields.io/badge/sass-3.4.0-ff69b4.svg">
  <img src="https://img.shields.io/badge/Libsass-3.2.0-b6f07e.svg">
  <img src="https://img.shields.io/badge/Version-3.0.0-blue.svg">
</p>
Rocket is a powerful SASS library to help web developers handle layout, color and other components.   
[demos](http://creatiointl.org/gallery/william/rocket/v3/demos/layout-grid.php)   
[Changelog](https://github.com/ganlanyuan/rocket/blob/v3/changelog.md)   

##### REQUESTS 
+ `Flexbox` 2009 syntax is not supported.    
+ Add [Modernizr](http://v3.modernizr.com/) to your project (make sure `flexbox`, `flexboxlegacy`, `flexboxtweener`, `flexwrap` are selected).    
+ Add [Selectivizr](http://selectivizr.com/) to your project.    

# Install

Install with [Bower](http://bower.io/): 
```` bash
$ bower install rocket#v3
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
|   |   |── gallery               
|   |   |── metro               
|   |   |── liquid-2              
|   |   |── liquid-3              
|   |   |── center   
|   |   |── justify               
|   |                                          
|   |── components 
|   |   |── button
|   |   |── charts
|   |   |── media
|   |   |── off-canvas
|   |   |── dropdown
|   |   |── tabs
|   |   |── switch
|   |   |── accordion
|   |   |── push-toggle
|   |   |── checkbox
|   |   |── tooltip
|   |   |── flex-media
|   |   |── validation
|   |   |── slider-carousel
|   |   |── slider-gallery
|   |
|   |── addons              
|       |── type                  
|       |── responsive-type (rp-type) 
|       |── visible               
|       |── hidden                
|       |── breakpoint (bp)       
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
        |── sticky                                        
        |── priority-nav
        |── equalizer                                        
        |── reach                                        
        |── scrollTo                                        
        |── animate                                        
        |── numIncrease                                        
        |── ie-placeholder                                        
````

#【 Layout 】
#### layout setting
```` scss
// default setting
$ro-layout: (
  container: 1024px,
  columns: 12,
  gutter: 20px,
);
````

#### container
The container of the main content. It can be center, left or right aligned.
````html
<div class="container">
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
Make a grid is supper easy. Just `@include grid()` at the wrapper element, then pass a list parameter with each column width to it. 
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
$key: ($list or $map) (gutter $gutter) keep

.row { @include grid( (3 7 4) ); }
// 1st child: 3 columns;
// 2nd child: 7 columns;
// 3rd child: 4 columns;
// total columns number is 3 + 7 + 4 = 14

.row { @include grid( (3:1, 7:0, 4:0) ); }
// children orders: 1 0 0; 
// elements with smaller order will go to the front, elements with equal orders will go with the origin order in html.
// this order is based on flex order, more detail please refer to http://the-echoplex.net/flexyboxes/?fixed-height=on&legacy=on&display=flex&flex-direction=row&flex-wrap=nowrap&justify-content=flex-start&align-items=flex-start&align-content=stretch&order[]=0&flex-grow[]=0&flex-shrink[]=1&flex-basis[]=auto&align-self[]=auto&order[]=0&flex-grow[]=0&flex-shrink[]=1&flex-basis[]=auto&align-self[]=auto&order[]=0&flex-grow[]=0&flex-shrink[]=1&flex-basis[]=auto&align-self[]=auto
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/layout-grid.php)

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
@mixin gallery($key)
//pattern
$key: $per-row (gutter $gutter) (child $child) $direction keep

.gallery { @include gallery(3); }
// per-row: 3;

.gallery { @include gallery(4 gutter 2% left); }
// per-row: 4;
// gutter: 2%;
// direction: right -> left
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
@mixin metro($key)
//pattern
$key: $map (ratio $ratio) (gutter $gutter) (child $child) $condition $media

.main { @include metro( (null: 3 1 h2 1 w3 of 3, 800: 3 1 h2 1 w3 of 4) ); }
// null 800: media query, null -> default, 800 -> 800px and up;
// 3: 1st child -> 3 blocks width x 3 blocks height
// 1: 2nd child -> 1 blocks width x 1 blocks height
// h2: 3rd child -> 1 blocks width x 2 blocks height
// 1: 4th child -> 1 blocks width x 1 blocks height
// w3: 5th child -> 3 blocks width x 1 blocks height
// "of 3": totaly 3 blocks width;

// condition: media query condition 'min' or 'max';
// media: media type like 'screen', 'print'

````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/layout-metro.php)

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
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/layout-liquid-2.php)

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
$key: (child $child) $align

.popup { @include center(child div left); }
// child: div;
// align: left; (left | right | center, for old browser)
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/layout-center.php)

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
$key: (child $child)

.justify { @include justify(); }
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/layout-justify.php)


#【 Components 】
#### button
````scss
@mixin button($key)
// pattern
$key: $font-size $padding $background-color radius round hover

.button { @include button(14px #00c8ff '0.8em 1em' radius hover); }
// font-size: 14px;
// background-color: #00c8ff;
// padding: 0.8em 1em; (Tips: padding must be quoted)
// radius: 0.22em; (default, you can modify it by change the varible "$ro-button-radius: 0.22em;" )
// hover: true; (change background-color when mouse over)
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/components-button.php)

#### Media list
`media` displays a media object (images, video, audio) to the left or right of a block.
```` scss
@mixin media($key)
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
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/components-media-list.php)

#### flex video
```` scss
@mixin flex-video($key)
// pattern
$key: $ratio $child

.flex-video { @include flex-video(3/4); }
// ratio: 3/4;
// child: iframe, object, embed; (default)

.flex-video { @include flex-video(9/16 embed); }
// ratio: 9/16;
// child: embed; 
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/components-flex-video.php)

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
$key: $child $show $style $direction default

.dropdown { @include dropdown(ul hover display right default); }
// child: ul;
// show: hover; (hover | click)
// style: display; (scale | display)
// direction: right; (left | right)
// default: true; (use default dropdown menu style)
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/components-dropdown.php)

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
$key: $size $active-color radius round

.switch { @include switch(30px #3DD754 round); }
// $size: 30px (default 20px)
// $active-color: #3DD754 (default #3DD754)
// $round: true (default false)
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/components-switch.php)

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
@mixin checkbox()

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
@mixin checkbox-active()

.radio {
  @include checkbox-active() {
    background-image: url('../images/radio-active.png');
  }
}
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/components-checkbox.php)    

#### tooltip
pure css `tooltip`
```` scss
@mixin tooltip($key)
// pattern
$key: $direction $color radius (width $width) (height $height)

.tooltip { @include tooltip(radius right #b02df3 width 300px); }
// radius: 0.22em; (This can be custmized by changing "$ro-tooltip-radius: 0.22em !default;")
// direction: right;
// background-color: #b02df3;
// width: 300px; (for old browsers)
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/components-tooltip.php)

#### off-canvas
Pure css off-canvas with multiple styles.  
```` html
<!-- styles: slide-in, rotate-in, rotate-out, rotate-in-reverse, push, drawer -->
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

<!-- styles: slide-along, slide-out, scale-down, scale-up, open-door, reveal -->
<!-- If you using these styles, make sure to compile it with Ruby Sass, not Libsass. Current Libsass doesn't fully support @at-root. -->
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
````
```` scss
@mixin off-canvas($key)
// pattern
$key: $style $direction $nav $nav-width $overlay-background-color $duration

.page { @include off-canvas('slide-in' left '.nav' rgba(0, 0, 0, 0.1) 200px 0.5s); }
// style: slide-in; (slide-in | slide-along | slide-out | rotate-in | rotate-out | rotate-in-reverse | scale-down | scale-up | open-door | push | reveal | drawer)
// direction: left; (left | right | top | bottom)
// nav: .nav;
// nav-width(or height): 200px; (default 240px)
// overlay-background-color: rgba(0, 0, 0, 0.1);
// duration: 0.5s;
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

#### slider-gallery
```` scss
// basic
@include slider-gallery($key)
// pattern
$key: $items autoplay autoplay-js (speed $speed) (timeout $timeout) hoverpause progress-bar keep default

.slider { @include slider-gallery(5 speed 0.5s timeout 4s autoplay progress-bar default); }
// items: 5;
// speed: 0.5s; (default 1s)
// timeout: 4s; (default 3s)
// autoplay: true;
// default: true; (default styles for controls and dots)

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
You can set up autoplay by passing an `autoplay` parameter to the `slider-gallery` mixin (which is using css animation, therefore it's not clickable), or passing an `autoplay-js` parameter, and then add js code like below (this is clickable):  
```` javascript
<script>
  ready(function () {
    sliderAutoplay('.gallery-b', 2000);
  });
</script>

````

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

#### slider-carousel
```` scss
// basic
@mixin slider-carousel($key)
// pattern
$key: ($items by $perpage) (gutter $gutter) center bypage autoplay autoplay-js (timeout $timeout) (speed $speed) hoverpause progress-bar keep default;

.slider { @include slider-carousel(5 by 2 bypage default); }
// items: 5;
// perpage: 2;
// gutter: 10px; (default)
// bypage: true;
// default: true; (default styles for controls and dots)

// customise dots, controls and progress-bar
.slider .dots .normal { ... }
.slider .dots .active { ... }
.slider .controls .prev { ... }
.slider .controls .next { ... }
.slider .autoplay-progress { ... }
````

*Autoplay*  
Same with `slider-gallery`.   

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

#【 Addons 】
#### type
`type` is a shorthand mixin for type.
```` scss
@mixin type($key)
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
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/addons-type.php)

#### responsive-type
Responsive type.
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
  null  : (15px, 1.3),
  small : 16px,
  medium: (17px, 1.4),
  900px : 18px,
  large : (19px, 1.45),
  1440px: 20px,
);
$h3-font-sizes: (
  null  : (18px, 1.3),
  900px : 22px,
  large : (30px, 1.2),
);
h3.example-font-size { @include responsive-type($h3-font-sizes, $bp); }
p.example-font-size { @include responsive-type($p-font-sizes, $bp); }
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/addons-font-size.php) 

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
A shorthand @mixin for break point.
```` scss
@mixin breakpoint($key)
// or @mixin bp($key)
// pattern
$key: $condition $media $breakpoints

@include breakpoint('min' 640) {};
// output: @media (min-width: 40em) {};
@include breakpoint('max' 640 screen) {};
// output: @media screen and (max-width: 40em) {};
@include breakpoint(640 767) {};
// output: @media (min-width: 40em) and (max-width: 47.94em) {};
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/addons-breakpoint.php)

#### visible
A shorthand @mixin for hide elements on some parts of viewport.
```` scss
@mixin visible($key)
// pattern
$key: $media $breakpoints

@include visible(500)
// visible on 500px up on all media
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/addons-visibility.php)

#### hidden
A shorthand @mixin for hide elements on some parts of viewport.
```` scss
@mixin hidden($key)
// pattern
$key: $media $breakpoints

@include hidden(screen 300 500 700)
// hidden between 300px and 500px, and 700px up on screen
````
[demo](http://creatiointl.org/gallery/william/rocket/v3/demos/addons-visibility.php)


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

#### Reach
`reach` is a function to check if target element reach the edge of browser.  
```` javascript
if (kit(el).reach('middle',0)) {
  // if target element reach the middle of the browser, do something
}
if (kit(el).reach('top',20)) {
  // if target element reach the point which is under the top of the browser 20px, do something
}
if (kit(el).reach('bottom',0)) {
  // if target element reach the bottom of the browser, do something
}
````

#### scrollTo
Scroll to some point in a given period of time.  
```` javascript
scrollTo (to,duration);

kit('.icon-menu').click(function() {
  scrollTo (0,200); // scroll to top in 200ms
});
````

#### numIncrease
Increase numbers in given period of time.
```` javascript
numIncrease(element, from, to, duration);

document.onload = function  () {
  numIncrease(kit('.follows'), 0, 200000, 400);
};
````

#### animate
```` javascript
animate(el, attr, from, to, duration);
animate(kit('.target'), 'left', 0, 20, 400);
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

#### sliderAutoplay
```` javascript
sliderAutoplay(selector, timeout, items, hoverPause);
// items: set up how many dots are clickable when using 'bypage' in css
sliderAutoplay('.gallery-b', 2000);
sliderAutoplay('.carousel-g', 3000, 4);
````
