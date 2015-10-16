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
        </div>
      </div>
      <pre><code class="language-scss">
.row { @include grid((2:1, 7:0, 3:0)); }
// if you don't need to change the order, simply @include row((2 7 3));
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
</body>
</html>
