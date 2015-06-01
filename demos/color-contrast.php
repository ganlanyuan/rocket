<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>color: </span>contrast</h2>
      <div class="contrast">
        <div class="color-box color-box-contrast-1">contrast</div>
        <div class="color-box color-box-contrast-2">contrast</div>
        <div class="color-box color-box-contrast-3">contrast</div>
      </div>
      <pre><code class="language-scss">
$contrast: #5173a3, #bbf8e6, #cb7d26;
@for $i from 1 through 3 {
  .color-box-contrast-#{$i} { 
    background-color: nth($contrast, $i); 
    color: contrast(nth($contrast, $i) light #eee dark red);
    width: 30%;
  }
}
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
</body>
</html>

