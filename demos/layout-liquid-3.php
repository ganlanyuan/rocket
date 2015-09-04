<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>layout: </span>liquid-3</h2>
      <div class="example example-liquid-3" data-margin>
        <div>
          <div class="example-content cell" data-content>flexible</div>
        </div>
        <div>
          <div class="example-content cell" data-content>150px</div>
        </div>
        <div>
          <div class="example-content cell" data-content>200px</div>
        </div>
      </div>
      <pre><code class="language-scss">
.example-liquid-3 { 
  @include liquid-3((null:2, 150px:1, 200px:0) 'gutter' 20px); 
}
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
</body>
</html>

