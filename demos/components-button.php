<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 class="main-heading"><span>components: </span>buttons</h2>
      <div class="example">
        <div class="example-button">
          <span class="normal">normal button</span>
          <a href="" class="radius">radius button</a>
          <span class="round">round button</span> <br>
          <span class="highlight">highlight</span>
          <span class="slide">slide</span>
          <span class="ripple">ripple</span>
          <span class="cut">cut</span>
          <span class="push" data-text="star"><span>push</span></span>
          <span class="bubble">bubble</span>
          <span class="shake">shake</span>
          <span class="simple">simple</span>
          <span class="veil">veil</span>
          <span class="line-drawing">line-drawing <span></span><span></span><span></span><span></span></span>
        </div>
      </div>
      <pre><code class="language-scss">
.normal { @include button('1em 2em' #46A736); }
.radius { @include button('1em 2em' #FF851B 0.4em); }
.round { @include button('1em 2em' #B61EFF round); }
.highlight { @include button('1em 2em' #2B8ACF #52CFDB 5px highlight); }
.simple { @include button('1em 2em' #2B8ACF #52CFDB 5px simple); }
.slide { @include button('1em 2em' #2B8ACF #52CFDB 5px slide); }
.ripple { @include button('1em 2em' #2B8ACF #52CFDB 5px ripple); }
.veil { @include button('1em 2em' #2B8ACF #52CFDB 5px veil); }
.cut { @include button('1em 2em' #2B8ACF #52CFDB 5px cut); }
.push { @include button('1em 2em' #2B8ACF #52CFDB 5px push); }
.bubble { @include button('1em 2em' #2B8ACF #52CFDB 5px bubble); }
.shake { 
  @include button('1em 2em' #2B8ACF #52CFDB 5px 0.4s); 
  &:hover { @include shake(); }
}
.line-drawing { @include button('1em 2em' #2B8ACF #52CFDB line-drawing); }
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php"; ?>
</div>
</body>
</html>

