<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 class="main-heading"><span>layout: </span>grid</h2>
      <div class="example ovh">
        <div class="row" data-margin>
          <div>
            <div class="example-content cell" data-content><strong>A</strong></div>
          </div>
          <div>
            <div class="example-content cell" data-content><strong>B</strong></div>
          </div>
          <div>
            <div class="example-content cell" data-content><strong>C</strong></div>
          </div>
          <div>
            <div class="example-content cell" data-content><strong>D</strong></div>
          </div>
          <div>
            <div class="example-content cell" data-content><strong>E</strong></div>
          </div>
        </div>
      </div>
      <pre><code class="language-scss">
$grid: (
  'default': (3 4) ( 2 5) 1,
  800px: (2 7 3: 1 0 1) (1 1: 1 0),
  1000px: (2 7 3 4 4),
);
.row { @include grid(grid $grid); }
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
</body>
</html>
