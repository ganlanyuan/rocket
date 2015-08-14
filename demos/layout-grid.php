<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>layout: </span>grid</h2>
      <h4>span</h4>
      Normal
      <div class="example example-span" data-margin>
        <div class="span-1 cell" data-content>
          <div class="example-content">
            span-1
          </div>
        </div>
        <div class="span-2 cell" data-content>
          <div class="example-content">
            span-2
          </div>
        </div>
      </div>
      <pre><code class="language-scss">
.span-1 { @include span(5 of 10 2%); }
.span-2 { @include span(5 of 10 2% last); }
@include breakpoint('min' 800) {
  .span-1 { @include span(9 of 11 move 2 keep); }
  .span-2 { @include span(2 of 11 move -9 keep last); }
}
      </code></pre>
      <br />
      Isolate mode
      <div class="example example-span" data-margin>
        <div class="span-isolate-1 cell" data-content>
          <div class="example-content">
            span-isolate-1
          </div>
        </div>
        <div class="span-isolate-2 cell" data-content>
          <div class="example-content">
            span-isolate-2
          </div>
        </div>
        <div class="span-isolate-3 cell" data-content>
          <div class="example-content">
            span-isolate-3
          </div>
        </div>
      </div>
      <pre><code class="language-scss">
.span-isolate-1 { @include span(2 at 9 of 10 2%); }
.span-isolate-2 { @include span(5 at 1 of 10 2%); }
.span-isolate-3 { @include span(3 at 6 of 10 2%); }
      </code></pre>
      <br />
      Nested grid
      <div class="example example-span" data-margin>
        <div class="span-nested-main">
          <div>main</div>
          <div class="span-nested-main-left cell" data-content>
            <div class="example-content">
              main-left
            </div>
          </div>
          <div class="span-nested-main-right cell" data-content>
            <div class="example-content">
              main-right
            </div>
          </div>
        </div>
        <div class="span-nested-aside" >
          <div>aside</div>
          <div class="cell" data-content>
          </div>
        </div>
      </div>
      <pre><code class="language-scss">
$gutter: 2%;
$layout-main: (8 of 12);
.span-nested {
  &-main {
    @include span($layout-main $gutter);
    &-left { @include span(2 of 5 ($gutter / span($layout-main)))};
    &-right { @include span(3 of 5 ($gutter / span($layout-main)) last)};
  }
  &-aside { @include span(4 of 12 $gutter last); }
}
      </code></pre>
      <h4>span-calc</h4>
      <div class="example" data-margin>
        <div class="span-calc-1 cell" data-content="">
          <div class="example-content">
            span-calc-1
          </div>
        </div>
        <div class="span-calc-2 cell" data-content="">
          <div class="example-content">
            span-calc-2
          </div>
        </div>
      </div>
      <pre><code class="language-scss">
.span-calc-1 { @include span-calc(5 of 11 move 6 20px); }
.span-calc-2 { @include span-calc(6 of 11 move -5 20px last); }
@include breakpoint('min' 800) {
  .span-calc-1 { @include span-calc(8 of 11 30px); }
  .span-calc-2 { @include span-calc(3 of 11 30px last); }
}
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
</body>
</html>
