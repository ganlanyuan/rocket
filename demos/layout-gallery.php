<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 class="main-heading"><span>layout: </span>gallery</h2>
      <div class="ovh">
        <ul class="example-gallery" data-margin>
          <li class="ie8-1"><div class="cell" data-content></div></li>
          <li class="ie8-2"><div class="cell" data-content></div></li>
          <li class="ie8-3"><div class="cell" data-content></div></li>
          <li class="ie8-4"><div class="cell" data-content></div></li>
          <li class="ie8-5"><div class="cell" data-content></div></li>
          <li class="ie8-6"><div class="cell" data-content></div></li>
          <li class="ie8-7"><div class="cell" data-content></div></li>
          <li class="ie8-8"><div class="cell" data-content></div></li>
          <li class="ie8-9"><div class="cell" data-content></div></li>
          <li class="ie8-10"><div class="cell" data-content></div></li>
          <li class="ie8-11"><div class="cell" data-content></div></li>
          <li class="ie8-12"><div class="cell" data-content></div></li>
          <li class="ie8-13"><div class="cell" data-content></div></li>
          <li class="ie8-14"><div class="cell" data-content></div></li>
          <li class="ie8-15"><div class="cell" data-content></div></li>
          <li class="ie8-16"><div class="cell" data-content></div></li>
          <li class="ie8-17"><div class="cell" data-content></div></li>
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

