<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>layout: </span>grid</h2>
      <div class="example example-span">
        <div class="row">
          <div class="col1">
            <div class="box" data-content>1</div>
          </div>
          <div class="col2">
            <div class="box" data-content>2</div>
          </div>
          <div class="col3">
            <div class="box" data-content>3</div>
          </div>
        </div>
      </div>
      <pre><code class="language-scss">
$layout: (
  2:1,
  7:0,
  3:0,
);
.row { @include row($layout); }
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
</body>
</html>
