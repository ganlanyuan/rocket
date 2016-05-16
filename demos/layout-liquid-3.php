<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 class="main-heading"><span>layout: </span>liquid-3</h2>
      <div class="example example-liquid-3" data-margin>
        <div class="ie8-1">
          <div class="example-content cell" data-content><strong>A</strong></div>
        </div>
        <div class="ie8-2">
          <div class="example-content cell" data-content><strong>B</strong></div>
        </div>
        <div class="ie8-3">
          <div class="example-content cell" data-content><strong>C</strong></div>
        </div>
      </div>
      <pre><code class="language-scss">
$map2: (
  null: (100px:2, null:1, 250px:0),
  700px: (100px:0, null:1, 250px:2),
  900px: (100px:2, null:1, 250px:0),
);
.example-liquid-3 { @include liquid-3($map2); }
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
</body>
</html>

