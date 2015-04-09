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
.color-box-contrast { 
  background-color: $contrast; 
  color: contrast($contrast);
}
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
</body>
</html>

