<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>color: </span>complementary</h2>
      <div class="example-complementary">
        <div class="color-box color-box-original">original</div>
        <div class="color-box color-box-complementary">complementary</div>
        <div class="color-pattern"><img src="images/complementary.png" alt="complementary-colors"></div>
      </div>
      <pre><code class="language-scss">
.color-box-complementary { 
  background-color: complementary($original); 
  color: contrast(complementary($original));
}
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
</body>
</html>

