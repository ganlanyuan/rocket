<?php include 'include/head.php'; ?>
<body>
<div class="page">

  <div class="topic">
    <h2 class="main-heading"><span>layout: </span>container</h2>
    <div class="example">
      <div class="container" data-margin>
        <div class="example-content cell" data-content></div>
      </div>
    </div>
    <div class="container">
      <pre><code class="language-scss">
.container { @include container(1220px); }
      </code></pre>
    </div>
  </div>
  <div class="container">
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
</body>
</html>
