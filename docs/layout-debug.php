<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>layout: </span>debug</h2>
      <div class="example-debug cell">
        <div class="example-span-calc-1 cell" data-content="">
          <div class="example-content">
            8 columns<br>
            $gutter: 20px;
          </div>
        </div>
        <div class="example-span-calc-2 cell" data-content="">
          <div class="example-content">
            3 columns
          </div>
        </div>
      </div>
      <pre><code class="language-scss">
.example-debug { @include debug(12, 20);}
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
</body>
</html>

