<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>layout: </span>center</h2>
      <div class="example example-center cell" data-margin>
        <div data-content>
        <div class="example-content">
          center align content <br>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus doloribus dicta voluptate quaerat vero!
        </div>
        </div>
      </div>
      <pre><code class="language-scss">
.example-center { @include center(child div left);
  > div { width: 200px; padding: 10px; }
}
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
</body>
</html>

