<?php include 'include/head.php'; ?>
<body>
<?php include 'include/mb-nav.php'; ?>
<div class="page">
  <div data-page-cover=""></div>
  <header class="site-header">
    <div class="container">
      <div data-icon-nav class="icon-nav"><span></span></div>
      <h1 class="branding"><a href="/"><?php include 'svgs/min/rocket.svg'; ?></a></h1>
      <?php include 'include/site-nav.php'; ?>
    </div>
  </header>
  <div class="intro">
    <div class="container">
      <div class="intro-content">
        <p><span class="active">Rocket</span> is front-end system built with Sass.</p>
        <p>By using the powerfull tools of Rocket, you can develop your website easier and faster.</p>
        <p>Rocket is not a framework. It doesn’t generate any code unless you need it to. Use you own class to build your own framework.</p>
        <div>
          <a href="https://github.com/ganlanyuan/rocket/archive/master.zip" target="_blank" class="button active">Download</a><a href="https://github.com/ganlanyuan/rocket" target="_blank" class="button">View on Github</a>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="topic">
      <h2 id="layout">layout</h2>
      <section>
        <h3 id="layout-mixin">layout</h3>
        <p>$layout is the default setting for your grid system.</p>
        <div class="content">
          <div class="">
            <pre><code class="language-scss">
$layout: (
  container: num | px | em | rem | % 
  columns: num
  gutter: num | px | em | rem | 1/20 | % | 0.1
);
            </code></pre>
          </div>
        </div>
      </section>
      <section>
        <h3 id="container">container</h3>
        <p>The container of the content. It usually has a max-width. When screen size is smaller than the max-width, it will has a left and right margin. Container can be set align center, left or right.</p>
        <div class="content">
          <div class="content-main">
            <div class="example" data-margin>
              <div class="example-container cell example-content" data-content>
                <strong>I'm a container.</strong><br>
                max-width: 90%;
              </div>
            </div>
          </div>
          <div class="content-aside">
            <pre><code class="language-scss">
@include container {$container, $gutter, $align}
// $container: num | px | em | rem | 3/4 | 90%
// $gutter: num | px | em | rem | 1/20 | 5% | 0.1
// $align: center | left | right
            </code></pre>
          </div>
        </div>
      </section>
      <section>
        <h3 id="wrap">wrap</h3>
        <p><code>wrap</code> is usually used with <code>span</code> when creating columns with fixed width gutters.</p>
        <div class="content">
          <div class="content-main">
            <div class="example">
              <div class="example-wrap" data-padding><div class="cell" data-content>
                <div class="example-content">
                  <strong>I'm a wrap.</strong><br>
                  margin-left: -15px; <br>
                  margin-right: -15px; <br>
                  letter-spacing: -.34em;    // remove the spacing between inline-block boxes
                </div>
              </div></div>
            </div>
          </div>
          <div class="content-aside">
            <pre><code class="language-scss">
@include wrap($columns, $gutter);
// $container: num | px | em | rem | 3/4 | 90%
// $gutter: num | px | em | rem | 1/20 | 5% | 0.1
            </code></pre>
          </div>
        </div>
      </section>
      <section>
        <h3 id="span">span</h3>
        <p><code>span</code> is used to create columns. Both fixed gutter (px, em, rem) and flexible gutter (%) are acceptable. If you use fixed gutter, you need set the parent element as a <code>wrap</code>, or using <code>span-calc</code>.</p>
        <div class="content">
          <div class="content-main">
            <div class="example example-span" data-margin>
              <div class="example-span-1 cell" data-content>
                <div class="example-content">
                  float: left; <br>
                  width: 62.5%; <br>
                  margin-right: 3.125%; 
                </div>
              </div>
              <div class="example-span-2 cell" data-content>
                <div class="example-content">
                  float: left; <br>
                  width: 34.375%;
                </div>
              </div>
            </div>
          </div>
          <div class="content-aside">
            <pre><code class="language-scss">
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
            </code></pre>
          </div>
        </div>
      </section>
      <section>
        <h3 id="span-calc">span-calc</h3>
        <p><code>span-calc</code> is using css-calc to create columns, old browser (e.g. IE8) will not supported.</p>
        <div class="content">
          <div class="content-main">
            <div class="example" data-margin>
              <div class="example-span-calc-1 cell" data-content="">
                <div class="example-content">
                  float: left; <br>
                  width: calc(72.7273% + 0.90909rem - 1.25rem); <br>
                  margin-right: 1.25rem;
                </div>
              </div>
              <div class="example-span-calc-2 cell" data-content="">
                <div class="example-content">
                  float: left; <br>
                  width: calc(27.2727% + 0.34091rem - 1.25rem);
                </div>
              </div>
            </div>
          </div>
          <div class="content-aside">
            <pre><code class="language-scss">
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
            </code></pre>
          </div>
        </div>
      </section>
      <section>
        <h3 id="gallery">gallery</h3>
        <p><code>gallery</code> is for creating picture galleries.</p>
        <div class="content">
          <div class="content-main">
            <div class="example">
              <ul class="example-gallery">
                <li data-padding><span class="example-content" data-content>
                  width: 25%; <br>
                  padding: 0.625rem; <br>
                  letter-spacing: normal;
                </span></li>
                <li data-padding><span data-content></span></li>
                <li data-padding><span data-content></span></li>
                <li data-padding><span data-content></span></li>
                <li data-padding><span data-content></span></li>
                <li data-padding><span data-content></span></li>
                <li data-padding><span data-content></span></li>
                <li data-padding><span data-content></span></li>
              </ul>
            </div>
          </div>
          <div class="content-aside">
            <pre><code class="language-scss">
@include gallery($per-row, $columns, $gutter, $child, $position);
// $per-row: num
// $columns: num
// $gutter: num | px | em | rem | 1/20 | 5% | 0.1
// $child: div | span | ...
// $position: center | bottom
            </code></pre>
          </div>
        </div>
      </section>
      <section>
        <h3 id="justify">justify</h3>
        <p><code>justify</code> is for creating <code>text-align: justify;</code> list.</p>
        <div class="content">
          <div class="content-main">
            <div class="example">
              <ul class="example-justify">
                <li><a href="">Lorem</a></li>
                <li><a href="">Internet</a></li>
                <li><input type="search" placeholder="Click me!"></li>
              </ul>
            </div>
          </div>
          <div class="content-aside">
            <pre><code class="language-scss">
@include justify-flex();
.no-flexbox {
  @inclue justify($child); // for old browsers
}
            </code></pre>
          </div>
        </div>
      </section>
      <section>
        <h3 id="center">center</h3>
        <p><code>center</code> is for creating both horizontal and vertical center aligned layout.</p>
        <div class="content">
          <div class="content-main">
            <div class="example example-center cell" data-margin>
              <div data-content>
              <div class="example-content">
                width: 150px; <br>
                padding: 10px;
              </div>
              </div>
            </div>
          </div>
          <div class="content-aside">
            <pre><code class="language-scss">
@include center($child, $align)
// $child: div | li | span | ...
// $align: left | center
            </code></pre>
          </div>
        </div>
      </section>
      <section>
        <h3 id="two-columns">two-columns</h3>
        <p><code>two-columns</code> is for creating a two columns layout. One of the two columns has a fixed width.</p>
        <div class="content">
          <div class="content-main">
            <div class="example example-two-columns" data-margin>
              <div data-col-main data-content>
                <div class="example-content">
                  main
                </div>
              </div>
              <div data-col-aside data-content>
                <div class="example-content">
                  aside: 200px
                </div>
              </div>
            </div>
            <pre><code class="language-markup">
&lt;div class="your-two-columns"&gt;
  &lt;div data-col-main&gt;&lt;/div&gt;
  &lt;div data-col-aside&gt;&lt;/div&gt;
&lt;/div&gt;
            </code></pre>
          </div>
          <div class="content-aside">
            <pre><code class="language-scss">
@include two-columns($direction, $aside, $gutter);
// $direction (fixed columns direction): left | right
// $aside (fixed columns width): px | em | rem
// $gutter: px | em | rem
            </code></pre>
          </div>
        </div>
      </section>
      <section>
        <h3 id="debug">debug</h3>
        <p>Use a <code>debug</code> to check if your content is well aligned.</p>
        <div class="content">
          <div class="content-main">
            <div class="example">
              <div class="example-debug cell example-content">
                $columns: 12; <br>
                $gutter: 20px;
              </div>
            </div>
          </div>
          <div class="content-aside">
            <pre><code class="language-scss">
@include debug($columns, $gutter, $color)
// $columns: num
// $gutter: num | px | em | rem | 1/20 | 5% | 0.1
// $color: rgba | ...
            </code></pre>
          </div>
        </div>
      </section>
    </div>
    <div class="topic">
      <h2 id="slider">Pure css slideshow</h2>
      <p></p>
      <div class="example-slider">
        <input type="radio" name="option-gallery" id="gallery-lg">
        <input type="radio" name="option-gallery" id="gallery-md">
        <input type="radio" name="option-gallery" id="gallery-sm">
        <input type="radio" name="option-gallery" id="gallery-auto-play">
        <input type="radio" name="option-gallery" id="gallery-customise" checked="">
        <div class="slider-labels">
          <div>
            <div class="title">Type: </div>
            <label for="">gallery</label>
          </div>
          <div>
            <div class="title">Options: </div>
            <label for="gallery-lg">lg</label>
            <label for="gallery-md">md</label>
            <label for="gallery-sm">sm</label>
            <label for="gallery-auto-play">auto-play</label>
            <label for="gallery-customise">customise</label>
          </div>
        </div>
        <div class="gallery">
          <input type="radio" name="gallery" id="gallery-1" checked="">
          <input type="radio" name="gallery" id="gallery-2">
          <input type="radio" name="gallery" id="gallery-3">
          <input type="radio" name="gallery" id="gallery-4">
          <input type="radio" name="gallery" id="gallery-5">
          <input type="checkbox" name="gallery-autoplay" id="gallery-autoplay" checked="">
          <div class="slider-container">
            <ul class="inner">
              <li>
                <div class="item"><a href=""><img src="http://placehold.it/1100x619/97cddd/97cddd"></a>
                  <div class="info"><h3>Cloud Dragon</h3> by <a href="http://voyager3.tumblr.com">Brendan Zabarauskas</a></div>
                </div>
              </li>
              <li>
                <div class="item"><a href=""><img src="http://placehold.it/1100x619/e3d189/e3d189"></a>
                  <div class="info"><h3>Mountain Fort</h3> by <a href="http://voyager3.tumblr.com">Brendan Zabarauskas</a></div>
                </div>
              </li>
              <li>
                <div class="item"><a href=""><img src="http://placehold.it/1100x619/97cddd/97cddd"></a>
                  <div class="info"><h3>Mountain Outpost</h3> by <a href="http://voyager3.tumblr.com">Brendan Zabarauskas</a></div>
                </div>
              </li>
              <li>
                <div class="item"><a href=""><img src="http://placehold.it/1100x619/b6cc84/b6cc84"></a>
                  <div class="info"><h3>Cliffs</h3> by <a href="http://voyager3.tumblr.com">Brendan Zabarauskas</a></div>
                </div>
              </li>
              <li>
                <div class="item"><a href=""><img src="http://placehold.it/1100x619/eea7d4/eea7d4"></a>
                  <div class="info"><h3>Hill Fort</h3> by <a href="http://voyager3.tumblr.com">Brendan Zabarauskas</a></div>
                </div>
              </li>
            </ul>
          </div>
          <div class="controls">
            <label for="gallery-1"><span class="prev"></span><span class="next"></span></label>
            <label for="gallery-2"><span class="prev"></span><span class="next"></span></label>
            <label for="gallery-3"><span class="prev"></span><span class="next"></span></label>
            <label for="gallery-4"><span class="prev"></span><span class="next"></span></label>
            <label for="gallery-5"><span class="prev"></span><span class="next"></span></label>
          </div>
          <div class="dots">
            <label for="gallery-1"><span class="normal"></span><span class="active"></span></label>
            <label for="gallery-2"><span class="normal"></span><span class="active"></span></label>
            <label for="gallery-3"><span class="normal"></span><span class="active"></span></label>
            <label for="gallery-4"><span class="normal"></span><span class="active"></span></label>
            <label for="gallery-5"><span class="normal"></span><span class="active"></span></label>
          </div>
          <div class="autoplay"><label for="gallery-autoplay"><span></span></label></div>
        </div>
        <input type="radio" name="option-carousel" id="carousel-lg" checked="">
        <input type="radio" name="option-carousel" id="carousel-md">
        <input type="radio" name="option-carousel" id="carousel-sm">
        <input type="radio" name="option-carousel" id="slide-by-page">
        <input type="radio" name="option-carousel" id="hide-half">
        <input type="radio" name="option-carousel" id="carousel-auto-play">
        <div class="slider-labels">
          <div>
            <div class="title">Type: </div>
            <label for="">carousel</label>
          </div>
          <div>
            <div class="title">Options: </div>
            <label for="carousel-lg">lg</label>
            <label for="carousel-md">md</label>
            <label for="carousel-sm">sm</label>
            <label for="slide-by-page">slide-by-page</label>
            <label for="hide-half">hide-half</label>
            <label for="carousel-auto-play">auto-play</label>
          </div>
        </div>
        <div class="carousel">
          <input type="radio" name="carousel" id="carousel-1" checked="">
          <input type="radio" name="carousel" id="carousel-2">
          <input type="radio" name="carousel" id="carousel-3">
          <input type="radio" name="carousel" id="carousel-4">
          <input type="radio" name="carousel" id="carousel-5">
          <input type="checkbox" name="carousel-autoplay" id="carousel-autoplay">
          <div class="slider-container">
            <ul class="inner">
              <li>
                <div class="item"><a href=""><img src="http://placehold.it/1100x619/97cddd/97cddd"></a>
                  <div class="info"><h3>Cloud Dragon</h3> by <a href="http://voyager3.tumblr.com">Brendan Zabarauskas</a></div>
                </div>
              </li>
              <li>
                <div class="item"><a href=""><img src="http://placehold.it/1100x619/e3d189/e3d189"></a>
                  <div class="info"><h3>Mountain Fort</h3> by <a href="http://voyager3.tumblr.com">Brendan Zabarauskas</a></div>
                </div>
              </li>
              <li>
                <div class="item"><a href=""><img src="http://placehold.it/1100x619/97cddd/97cddd"></a>
                  <div class="info"><h3>Mountain Outpost</h3> by <a href="http://voyager3.tumblr.com">Brendan Zabarauskas</a></div>
                </div>
              </li>
              <li>
                <div class="item"><a href=""><img src="http://placehold.it/1100x619/b6cc84/b6cc84"></a>
                  <div class="info"><h3>Cliffs</h3> by <a href="http://voyager3.tumblr.com">Brendan Zabarauskas</a></div>
                </div>
              </li>
              <li>
                <div class="item"><a href=""><img src="http://placehold.it/1100x619/eea7d4/eea7d4"></a>
                  <div class="info"><h3>Hill Fort</h3> by <a href="http://voyager3.tumblr.com">Brendan Zabarauskas</a></div>
                </div>
              </li>
            </ul>
          </div>
          <div class="controls">
            <label for="carousel-1"><span class="prev"></span><span class="next"></span></label>
            <label for="carousel-2"><span class="prev"></span><span class="next"></span></label>
            <label for="carousel-3"><span class="prev"></span><span class="next"></span></label>
            <label for="carousel-4"><span class="prev"></span><span class="next"></span></label>
            <label for="carousel-5"><span class="prev"></span><span class="next"></span></label>
          </div>
          <div class="dots">
            <label for="carousel-1"><span class="normal"></span><span class="active"></span></label>
            <label for="carousel-2"><span class="normal"></span><span class="active"></span></label>
            <label for="carousel-3"><span class="normal"></span><span class="active"></span></label>
            <label for="carousel-4"><span class="normal"></span><span class="active"></span></label>
            <label for="carousel-5"><span class="normal"></span><span class="active"></span></label>
          </div>
          <div class="autoplay"><label for="carousel-autoplay"><span></span></label></div>
        </div>
      </div>
    </div>
    <div class="topic">
      <h2 id="color">color-functions</h2>
      <p>Please refer to <a href="https://color.adobe.com/create/color-wheel/" target="_blank">Adobe Kuler</a> and <a href="http://paletton.com/#uid=1000u0kllllaFw0g0qFqFg0w0aF" target="_blank">paletton</a></p>
      <section>
        <h3 id="contrast">contrast</h3>
        <p><code>contrast</code> is for getting a contrast font-color based on the background-color.</p>
        <div class="content">
          <div class="content-main-short">
            <div class="example">
              <div class="example-contrast">
                <div class="color-box color-box-contrast">contrast</div>
              </div>
            </div>
          </div>
          <div class="content-aside-long">
            <pre><code class="language-scss">
contrast( $color, $light: #fff, $dark: #000 );
// $color: #dbdbdb | rgb | rgba | hsl | hsla | ...
// $light (optional): #dbdbdb | rgb | rgba | hsl | hsla | ...
// $dark (optional): #dbdbdb | rgb | rgba | hsl | hsla | ...

// If lightness < 65%, return $light, otherwise return $dark
// .youclass { color: contrast(#a6e36e, $light:#dbdbdb, $dark: #212121); }
            </code></pre>
          </div>
        </div>
        <h3 id="adjacent">adjacent</h3>
        <p><code>adjacent</code> is for creating adjacent colors.</p>
        <div class="content">
          <div class="content-main-short">
            <div class="example">
              <div class="example-adjacent">
                <div class="color-box color-box-adjacent-1">adjacent 1</div>
                <div class="color-box color-box-original">original</div>
                <div class="color-box color-box-adjacent-2">adjacent 2</div>
                <div class="color-pattern"><img src="images/adjacent.png" alt="adjacent-colors"></div>
              </div>
            </div>
          </div>
          <div class="content-aside-long">
            <pre><code class="language-scss">
adjacent( $color, $order, $saturation, $lightness, $dist );
// $color: #dbdbdb | rgb | rgba | hsl | hsla | ...
// $order: num,
// $saturation (optional): false | null | %,
// $lightness (optional): false | null | %
// $dist (optianal): 30 | num

// .youclass { color: adjacent(#a6e36e, 1, $dist: 20); }
            </code></pre>
          </div>
        </div>
        <h3 id="complementary">complementary</h3>
        <p><code>complementary</code> is for getting a complementary color.</p>
        <div class="content">
          <div class="content-main-short">
            <div class="example">
              <div class="example-complementary">
                <div class="color-box color-box-original">original</div>
                <div class="color-box color-box-complementary">complementary</div>
                <div class="color-pattern"><img src="images/complementary.png" alt="complementary-colors"></div>
              </div>
            </div>
          </div>
          <div class="content-aside-long">
            <pre><code class="language-scss">
complementary( $color, $saturation, $lightness );
// $color: #dbdbdb | rgb | rgba | hsl | hsla | ...
// $saturation (optional): false | null | %,
// $lightness (optional): false | null | %

// .youclass { color: complementary(#a6e36e, null, 20%); }
            </code></pre>
          </div>
        </div>
        <h3 id="split-complementary">split-complementary</h3>
        <p><code>split-complementary</code> is for getting split-complementary colors based on a given color.</p>
        <div class="content">
          <div class="content-main-short">
            <div class="example">
              <div class="example-split-complementary">
                <div class="color-box color-box-original">original</div>
                <div class="color-box color-box-split-complementary-1">split-complementary 1</div>
                <div class="color-box color-box-split-complementary-2">split-complementary 2</div>
                <div class="color-pattern"><img src="images/split-complementary.png" alt="split-complementary-colors"></div>
              </div>
            </div>
          </div>
          <div class="content-aside-long">
            <pre><code class="language-scss">
split-complementary( $color, $order, $saturation, $lightness, $dist );
// $color: #dbdbdb | rgb | rgba | hsl | hsla | ...
// $order: num,
// $saturation (optional): false | null | %,
// $lightness (optional): false | null | %
// $dist (optianal): 30 | num

// .youclass { color: split-complementary(#a6e36e, 1); }
            </code></pre>
          </div>
        </div>
        <h3 id="triad">triad</h3>
        <p><code>triad</code> is for getting triad colors based on a given color.</p>
        <div class="content">
          <div class="content-main-short">
            <div class="example">
              <div class="example-triad">
                <div class="color-box color-box-original">original</div>
                <div class="color-box color-box-triad-1">triad 1</div>
                <div class="color-box color-box-triad-2">triad 2</div>
                <div class="color-pattern"><img src="images/triad.png" alt="triad-colors"></div>
              </div>
            </div>
          </div>
          <div class="content-aside-long">
            <pre><code class="language-scss">
triad( $color, $order, $saturation, $lightness, $dist );
// $color: #dbdbdb | rgb | rgba | hsl | hsla | ...
// $order: num,
// $saturation (optional): false | null | %,
// $lightness (optional): false | null | %
// $dist (optianal): 30 | num

// .youclass { color: triad(#a6e36e, 1); }
            </code></pre>
          </div>
        </div>
        <h3 id="rectangle">rectangle</h3>
        <p><code>rectangle</code> is for getting rectangle colors based on a given color.</p>
        <div class="content">
          <div class="content-main-short">
            <div class="example">
              <div class="example-rectangle">
                <div class="color-box color-box-original">original</div>
                <div class="color-box color-box-rectangle-1">rectangle 1</div>
                <div class="color-box color-box-rectangle-2">rectangle 2</div>
                <div class="color-box color-box-rectangle-3">rectangle 3</div>
                <div class="color-pattern"><img src="images/rectangle.png" alt="rectangle-colors"></div>
              </div>
            </div>
          </div>
          <div class="content-aside-long">
            <pre><code class="language-scss">
rectangle( $color, $order, $saturation, $lightness, $dist );
// $color: #dbdbdb | rgb | rgba | hsl | hsla | ...
// $order: num,
// $saturation (optional): false | null | %,
// $lightness (optional): false | null | %
// $dist (optianal): 30 | num

// .youclass { color: rectangle(#a6e36e, -3); }
            </code></pre>
          </div>
        </div>
        <h3 id="square">square</h3>
        <p><code>square</code> is for getting square colors based on a given color.</p>
        <div class="content">
          <div class="content-main-short">
            <div class="example">
              <div class="example-square">
                <div class="color-box color-box-original">original</div>
                <div class="color-box color-box-square-1">square 1</div>
                <div class="color-box color-box-square-2">square 2</div>
                <div class="color-box color-box-square-3">square 3</div>
                <div class="color-pattern"><img src="images/square.png" alt="square-colors"></div>
              </div>
            </div>
          </div>
          <div class="content-aside-long">
            <pre><code class="language-scss">
square( $color, $order, $saturation, $lightness, $dist );
// $color: #dbdbdb | rgb | rgba | hsl | hsla | ...
// $order: num,
// $saturation (optional): false | null | %,
// $lightness (optional): false | null | %
// $dist (optianal): 30 | num

// .youclass { color: square(#a6e36e, -3); }
            </code></pre>
          </div>
        </div>
      </section>
    </div>
    <div class="topic">
      <h2 id="addons">addons</h2>
      <section>
        <h3 id="type">type</h3>
        <p><code>type</code> is a shorthand mixin for type.</p>
        <div class="content">
          <div class="content-main-short">
            <div class="example">
              <h1 class="example-type">This is h1</h1>
              <h2 class="example-type">This is h2</h2>
              <h3 class="example-type">This is h3</h3>
              <h4 class="example-type">This is h4</h4>
              <h5 class="example-type">This is h5</h5>
            </div>
          </div>
          <div class="content-aside-long">
            <pre><code class="language-scss">
@include type($type...);
$type: ($font-size, $font-weight, $line-height, $margin, $padding);
// font-size: num | px | em | rem | null
// font-weight: normal | bold | num | null
// line-height: num | 18/14 | null
// margin: px | em | null
// padding: px | em | null

h1 { @include type(32px,700,1.1, 0 0 10px 0); }
h2 { @include type(28px); }
h3 { @include type(24px,null,1.3); }
h4 { @include type(20px,normal,1.4, 10px); }
h5 { @include type(16px,null,1.5, 0.5em, 1em); }
            </code></pre>
          </div>
        </div>
      </section>
      <section>
        <h3 id="button">button</h3>
        <p><code>button</code> is not just for "button". Everything which is an inline-block box can be considered as a button.</p>
        <div class="content">
          <div class="content-main-short">
            <div class="example">
              <div class="example-button">
                <button>Submit</button>
                <input type="search" name="" id="">
                <div class="pagination">
                  <a href=""><span class="ic-angle-left"></span></a>
                  <a href="">1</a>
                  <a href="">2</a>
                  <a href="">3</a>
                  <a href="">4</a>
                  <a href=""><span class="ic-angle-right"></span></a>
                </div>
                <ul class="breadcrumb">
                  <li><a href="">Home</a><span class="ic-angle-right"></span></li>
                  <li><a href="">news</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="content-aside-long">
            <pre><code class="language-scss">
@include button(font-size, padding, margin, background-color, border, border-radius);
// font-size: value | null
// padding: value | null
// margin: value | null
// background-color: value | null
// border: value | null
// border-radius: value | null
            </code></pre>
          </div>
        </div>
      </section>
      <section>
        <h3 id="media">Media list</h3>
        <p><code>media</code> displays a media object (images, video, audio) to the left or right of a block.</p>
        <div class="content">
          <div class="content-main">
            <div class="example">
              <div class="example-media">
                <ul class="news-left">
                  <li>
                    <figure class="media"><a href=""><img src="http://placehold.it/120x80" alt=""></a></figure>
                    <div class="media-body">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam animi tempore harum dignissimos error maxime, porro, quis dolorum laboriosam recusandae officia repudiandae natus mollitia id amet voluptatibus. Quibusdam, facilis! Hic.</p>
                    </div>
                  </li>
                  <li>
                    <figure class="media"><a href=""><img src="http://placehold.it/120x80" alt=""></a></figure>
                    <div class="media-body">
                      <p>Quibusdam ea voluptate, inventore illum impedit odio quia. Ducimus iusto mollitia deleniti sequi ea perferendis, tempore enim quisquam optio laboriosam modi hic magni nobis consequuntur minus dolorum quibusdam, excepturi. Sed.</p>
                      <ul class="news-left">
                        <li>
                          <figure class="media"><a href=""><img src="http://placehold.it/120x80" alt=""></a></figure>
                          <div class="media-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis soluta distinctio commodi fugiat beatae, quibusdam. Deserunt officia eius, eos velit aspernatur ea molestiae quisquam quo, iusto animi vitae enim voluptate.</p>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </li>
                </ul>
                <ul class="news-right">
                  <li>
                    <div class="media-body">
                      <p>Magnam, modi. Saepe quaerat, nihil debitis. Quae vel delectus, nulla quaerat porro, aperiam ipsam dicta earum beatae hic nobis ex reiciendis provident, quo sit! Dolore impedit non optio numquam veniam.</p>
                    </div>
                    <figure class="media"><a href=""><img src="http://placehold.it/120x80" alt=""></a></figure>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="content-aside">
            <pre><code class="language-scss">
.news { @include media($gutter, $media, $media-body, $direction); }
// $gutter(optional): px | em | rem
// $media(optional): null | '.class' | '#id' | 'tag'
// $media-body(optional): null | '.class' | '#id' | 'tag'
// $direction(optional): left | right
.news { @include media(); } 
// $gutter: 10px
// $media: [data-media-left] and [data-media-right]
// $media-body: [data-media-body]
// $direction: left
.news { @include media(1em, '.media', '.media-body', right); } 
.news { @include media(15px, 'figure', 'div'); } 

            </code></pre>
          </div>
        </div>
      </section>
      <section>
        <h3 id="off-canvas">off-canvas</h3>
        <p><code>off-canvas</code> is for the navigation on mobile.</p>
        <div class="content">
          <div class="content-main">
            <pre><code class="language-markup">
&lt;nav&gt;
  &lt;ul&gt;
    &lt;li&gt;&lt;span data-offcanvas-close&gt;close&lt;/span&gt;&lt;/li&gt;
    &lt;li&gt;&lt;a href=""&gt;item01&lt;/a&gt;&lt;/li&gt;
    &lt;li&gt;&lt;a href=""&gt;item02&lt;/a&gt;&lt;/li&gt;
    &lt;li&gt;&lt;span data-icon-haschild&gt;&lt;span class="ic-angle-right"&gt;&lt;/span&gt;&lt;/span&gt;&lt;a href=""&gt;item03&lt;/a&gt;
      &lt;ul data-offcanvas-subnav&gt;
        &lt;li data-offcanvas-back&gt;back&lt;/li&gt;
        &lt;li&gt;&lt;a href=""&gt;sub item02&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=""&gt;sub item03&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href=""&gt;sub item04&lt;/a&gt;&lt;/li&gt;
      &lt;/ul&gt;
    &lt;/li&gt;
    &lt;li&gt;&lt;a href=""&gt;item04&lt;/a&gt;&lt;/li&gt;
  &lt;/ul&gt;
&lt;/nav&gt;
&lt;div class="page"&gt;
  &lt;div data-page-cover=""&gt;&lt;/div&gt;
  &lt;div data-icon-nav&gt;&lt;/div&gt;
&lt;/div&gt;
            </code></pre>
          </div>
          <div class="content-aside">
            <pre><code class="language-scss">
nav { @include off-canvas($style, $direction, $font-size, $padding, $bg); }
// $style: move | translate | reveal
// $direction: left | right
// $font-size: font-size (nav-item)
// $padding: padding (nav-item)
// $bgc: background-color (nav-item)
.page { @include page-container($style, $direction); }
// $style: move | translate | reveal
// $direction: left | right
            </code></pre>
          </div>
        </div>
      </section>
      <section>
        <h3 id="dropdown">dropdown</h3>
        <p>There are two ways to show a dropdown menu. If you set as "click", you need add an &lt;span data-dropdown-toggle&gt;&lt;/span&gt; beside your dropdown menu.</p>
        <div class="content">
          <div class="content-main-short">
            <div class="example">
              <div class="example-dropdown-1">
                <span>dropdown: hover</span>
                <ul data-dropdown-menu>
                  <li><a href="">item01</a></li>
                  <li><a href="">item02</a></li>
                  <li><a href="">item03</a></li>
                </ul>
              </div>              
              <div class="example-dropdown-2">
                <span>dropdown: </span>
                <span class="ic-angle-down" data-dropdown-toggle></span>
                <ul data-dropdown-menu>
                  <li><a href="">item01</a></li>
                  <li><a href="">item02</a></li>
                  <li><a href="">item03</a></li>
                </ul>
              </div>              
            </div>
          </div>
          <div class="content-aside-long">
            <pre><code class="language-scss">
@include dropdown($bgc, $padding, $border, $border-radius, $shadow, $open);
// $bgc: dropdown menu background-color
// $padding: dropdown menu item padding
// $border: value | null
// $border-radius: value | null
// $shadow: value | null
// $open: hover | click

// If you set $open: click, 
// you need insert &lt;span data-dropdown-toggle&gt;&lt;/span&gt; inside your dropdown tag.
            </code></pre>
          </div>
        </div>
      </section>
      <section>
        <h3 id="tooltip">tooltip</h3>
        <p>This is a pure css tooltip.</p>
        <div class="content">
          <div class="content-main-short">
            <div class="example">
              <div class="example-tooltip" data-tooltip="I'm a tooltip! Mouse over me to see my content.">Mouse over me!</div>
            </div>
          </div>
          <div class="content-aside-long">
            <pre><code class="language-scss">
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
            </code></pre>
          </div>
        </div>
      </section>
      <section>
        <h3 id="break-point">break point</h3>
        <p>A shorthand @mixin for break point.</p>
        <div class="content">
          <pre><code class="language-scss">
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
          </code></pre>
        </div>
      </section>
      <section>
        <h3 id="visibility">visibility</h3>
        <p>A shorthand @mixin for hide elements on some parts of viewport.</p>
        <div class="content">
          <div class="content-main-short">
            <div class="example">
              <div class="example-visible-1">Visible on <strong>900px</strong> up</div>
              <div class="example-visible-2">visible between <strong>900px</strong> and <strong>1000px</strong></div>
              <div class="example-visible-3">visible between <strong>700px</strong> and <strong>900px</strong>, and <strong>1200px</strong> up</div>
              <div class="example-hidden-1">Hidden on <strong>900px</strong> up</div>
              <div class="example-hidden-2">Hidden between <strong>900px</strong> and <strong>1000px</strong></div>
              <div class="example-hidden-3">Hidden between <strong>700px</strong> and <strong>900px</strong>, and <strong>1200px</strong> up</div>
            </div>
          </div>
          <div class="content-aside-long">
            <pre><code class="language-scss">
@include visible($media, $bp...);
@include hidden($media, $bp...);
// $media: null | screen | print | ...
// $bp: num | px | em | ... (accept maximum 5 values)

// @include visible(null, 500)
// visible on 500px up on all media
// @include hidden(screen, 300, 500, 700)
// hidden between 300px and 500px, and 700px up on screen
            </code></pre>
          </div>
        </div>
      </section>
      <section>
        <h3 id="flex-video">flex-video</h3>
        <div class="content">
          <div class="content-main">
            <div class="example">
              <div class="example-flex-video"><iframe width="560" height="315" src="//www.youtube.com/embed/Rb0UmrCXxVA" frameborder="0" allowfullscreen></iframe></div>
            </div>
          </div>
          <div class="content-aside">
            <pre><code class="language-scss">
@include flex-video($child, $ratio);
// $child: iframe | video | ...
// $ratio: 9/16 | ...
            </code></pre>
          </div>
        </div>
      </section>
      <section>
        <h3 id="icon-font">icon-font</h3>
        <?php include 'include/icon-font.php'; ?>
      </section>
    </div>
    <div class="topic">
      <h2 id="kit">kit.js</h2>
      <p>Kit.js is small Javascript library similar with jQuery. Kit.js works well on IE8 and up, and on other morden browsers.</p>
      <p>The follow metheds are available: <br><code>on</code>, <code>off</code>, <code>click</code>, <code>mouseover</code>, <code>mouseout</code>, <code>focus</code>, <code>blur</code>, <code>submit</code>, <code>keydown</code>, <code>keyup</code>, <br> <code>find</code>, <code>eq</code>, <code>filter</code>, <code>first</code>, <code>last</code>, <code>parent</code>, <code>parents</code>, <code>children</code>, <code>firstChild</code>, <code>lastChild</code>, <code>siblings</code>, <code>prev</code>, <code>prevAll</code>, <code>next</code>, <code>nextAll</code>, <br> <code>hide</code>, <code>show</code>, <code>fadeIn</code>, <code>remove</code>, <br> <code>text</code>, <code>html</code>, <code>attr</code>, <code>css</code>, <code>addClass</code>, <code>removeClass</code>, <code>toggleClass</code>, <code>hasClass</code>, <br> <code>outerWidth</code>, <code>outerHeight</code>, <code>getTop</code>, <code>getLeft</code>, <code>offset(left top)</code>, <br> <code>before</code>, <code>after</code>, <code>append</code>, <code>prepend</code></p>
      <section>
        <h3>Ready</h3>
        <div class="content">
          <pre><code class="language-javascript">
ready(function () {
  ...
});
          </code></pre>
        </div>
      </section>
      <section>
        <h3>Dom methods</h3>
        <div class="content">
          <pre><code class="language-javascript">
k('.header').parent().addClass('newclass');
k('.button').siblings('p').css({
  'color': 'red',
  'line-height': '1.5'
});
          </code></pre>
        </div>
      </section>
      <section>
        <h3>Event</h3>
        <div class="content">
          <pre><code class="language-javascript">
k('.icon-menu').click(function() {
  k(this).parent().toggleClass('active');
});

k('.news').on('mouseover', function() {
  k(this).css('background-color', 'blue');
});
          </code></pre>
        </div>
      </section>
      <section>
        <h3>forEach</h3>
        <div class="content">
          <pre><code class="language-javascript">
k('.site-nav a').forEach(function (el) {
  el.onclick = function () {
    var targetId = k(this).attr('href');
        targetPosition = k(targetId).getTop();
    scrollTo(targetPosition, 400);
    return false;
  }
});
          </code></pre>
        </div>
      </section>
      <section>
        <h3>Reach</h3>
        <p><code>reach</code> is a function to check if target element reach the edge of browser.</p>
        <div class="content">
          <pre><code class="language-javascript">
if (k(el).reach('middle',0)) {
  // if target element reach the middle of the browser, do something
}
if (k(el).reach('top',20)) {
  // if target element reach the point which is under the top of the browser 20px, do something
}
if (k(el).reach('bottom',0)) {
  // if target element reach the bottom of the browser, do something
}
          </code></pre>
        </div>
      </section>
      <section>
        <h3>scrollTo</h3>
        <p>Scroll to some point in a given period of time.</p>
        <div class="content">
          <pre><code class="language-javascript">
scrollTo (to,duration);

k('.icon-menu').click(function() {
  scrollTo (0,200); // scroll to top in 200ms
});
          </code></pre>
        </div>
      </section>
      <section>
        <h3>numIncrease</h3>
        <p>Increase numbers in given period of time.</p>
        <div class="content">
          <pre><code class="language-javascript">
numIncrease(element, from, to, duration);

document.onload = function  () {
  numIncrease(k('.follows'), 0, 200000, 400);
};
          </code></pre>
        </div>
      </section>
      <section>
        <h3>animate</h3>
        <div class="content">
          <pre><code class="language-javascript">
animate(el, attr, from, to, duration);
animate(k('.target'), 'left', 0, 20, 400);
          </code></pre>
        </div>
      </section>
    </div>
  </div>
  <footer class="site-footer">
    <div class="container">
      <p class="copy-right">Copyright © 2014 Rocket, All rights reserved. </p>
    </div>
  </footer>
</div>
</body>
</html>