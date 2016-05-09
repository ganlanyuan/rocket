<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 class="main-heading"><span>layout: </span>liquid-3</h2>
      <div class="example example-liquid-3" data-margin>
        <div>
          <div class="example-content cell" data-content><strong>A</strong>flexible <img src="http://placehold.it/1000x300" alt=""></div>
        </div>
        <div>
          <div class="example-content cell" data-content><strong>B</strong>150px <img src="http://placehold.it/1000x300" alt=""></div>
        </div>
        <div>
          <div class="example-content cell" data-content><strong>C</strong>200px <img src="http://placehold.it/1000x300" alt=""></div>
        </div>
      </div>
      <pre><code class="language-scss">
.example-liquid-3 { @include liquid-3((null: 1, 150px: 0, 200px: 0)); }
// you could do @include liquid-2((null 150px 200px)) if you don't need to change the order
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
</body>
</html>

