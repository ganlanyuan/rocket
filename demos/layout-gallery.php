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
          <li><div class="cell" data-content></div></li>
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
$map: (
  'default': 2,
  700: 3,
  1000: 4,
);
.example-gallery { @include gallery($map); }
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
</body>
</html>

