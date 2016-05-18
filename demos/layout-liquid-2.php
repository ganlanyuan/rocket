<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 class="main-heading"><span>layout: </span>liquid-2</h2>
      <div class="example example-liquid-2" data-margin>
        <div>
          <div class="example-content cell" data-content><strong>A</strong></div>
        </div>
        <div>
          <div class="example-content cell" data-content><strong>B</strong></div>
        </div>
      </div>
      <pre><code class="language-scss">
$map2: (
  'default': (150px null),
  750px: (150px:1, null:0),
  900px: (150px:0, null:1)
);
.example-liquid-2 { @include liquid-2($map2); }
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
</body>
</html>

