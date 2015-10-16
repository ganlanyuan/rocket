<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 class="main-heading"><span>layout: </span>center</h2>
      <div class="example example-center" data-margin>
        <div data-content>
        <div class="example-content">
          <strong>Center align content</strong>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus doloribus dicta voluptate quaerat vero!
        </div>
        </div>
      </div>
      <pre><code class="language-scss">
.example-center { @include center(div left);
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

