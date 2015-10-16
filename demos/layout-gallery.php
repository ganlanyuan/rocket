<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 class="main-heading"><span>layout: </span>gallery</h2>
      <div class="ovh">
        <ul class="example-gallery" data-margin>
          <li><div class="cell" data-content></div></li>
          <li><div class="cell" data-content></div></li>
          <li><div class="cell" data-content></div></li>
          <li><div class="cell" data-content></div></li>
          <li><div class="cell" data-content></div></li>
          <li><div class="cell" data-content></div></li>
          <li><div class="cell" data-content></div></li>
          <li><div class="cell" data-content></div></li>
        </ul>
      </div>
      <pre><code class="language-scss">
.example-gallery { @include gallery(3); }
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
</body>
</html>

