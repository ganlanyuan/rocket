<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>components: </span>Switch</h2>
      <div class="example">
        <div class="switch one">
          <input type="checkbox" id="switch1" name="switch-1">
          <label for="switch1"></label>
        </div>              
        <div class="switch two">
          <input type="checkbox" id="switch2" name="switch-2" checked="">
          <label for="switch2"></label>
        </div>              
        <div class="switch-group">
          <h4>Switch group</h4>
          <div class="switch-g">
            <input type="radio" id="switch-1" name="switch-g">
            <label for="switch-1"></label>
          </div>              
          <div class="switch-g">
            <input type="radio" id="switch-2" name="switch-g" checked="">
            <label for="switch-2"></label>
          </div>              
          <div class="switch-g">
            <input type="radio" id="switch-3" name="switch-g">
            <label for="switch-3"></label>
          </div>              
        </div>
      </div>
      <pre><code class="language-scss">
.switch {
  &.one {
    @include switch(radius);
  }
  &.two {
    @include switch(round 30px #C06EE1);
  }
}
      </code></pre>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php"; ?>
</div>
</body>
</html>

