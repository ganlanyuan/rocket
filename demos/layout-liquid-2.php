<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>layout: </span>liquid-2</h2>
      <div class="example example-liquid-2" data-margin>
        <div>
          <div class="example-content cell" data-content><strong>A</strong>flexible</div>
        </div>
        <div>
          <div class="example-content cell" data-content><strong>B</strong>200px</div>
        </div>
      </div>
      <pre><code class="language-scss">
$layout: (
  null: 1,
  200px: 0,
);

.example-liquid-2 { @include liquid-2($layout); }
// you could do @include liquid-2((null 200px)) if you don't need to change the order
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
</body>
</html>

