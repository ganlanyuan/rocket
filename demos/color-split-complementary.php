<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>color: </span>split complementary</h2>
      <div class="example-split-complementary">
        <div class="color-box color-box-original">original</div>
        <div class="color-box color-box-split-complementary-1">split-complementary 1</div>
        <div class="color-box color-box-split-complementary-2">split-complementary 2</div>
        <div class="color-pattern"><img src="images/split-complementary.png" alt="split-complementary-colors"></div>
      </div>
      <pre><code class="language-scss">
.color-box-split-complementary-1 { 
  background-color: split-complementary($original 1); 
  color: contrast(split-complementary($original 1));
}
.color-box-split-complementary-2 { 
  background-color: split-complementary($original 2);
  color: contrast(split-complementary($original 2));
}
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
</body>
</html>

