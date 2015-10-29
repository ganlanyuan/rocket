<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 class="main-heading"><span>layout: </span>center</h2>
      <div class="example example-center" data-margin>
        <div data-content>
          <h4>Center align content</h4>
          <img src="http://placehold.it/600x200/3DC3FF/3DC3FF" alt="">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus doloribus dicta voluptate quaerat vero!</p>
        </div>
      </div>
      <pre><code class="language-scss">
.example-center { @include center(div left); }
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
</body>
</html>

