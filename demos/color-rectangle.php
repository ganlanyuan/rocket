<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>color: </span>rectangle</h2>
      <div class="example-rectangle">
        <div class="color-box color-box-original">original</div>
        <div class="color-box color-box-rectangle-1">rectangle 1</div>
        <div class="color-box color-box-rectangle-2">rectangle 2</div>
        <div class="color-box color-box-rectangle-3">rectangle 3</div>
        <div class="color-pattern"><img src="images/rectangle.png" alt="rectangle-colors"></div>
      </div>
      <pre><code class="language-scss">
.color-box-rectangle-1 { 
  background-color: rectangle($original 1); 
  color: contrast(rectangle($original 1));
}
.color-box-rectangle-2 { 
  background-color: rectangle($original 2);
  color: contrast(rectangle($original 2));
}
.color-box-rectangle-3 { 
  background-color: rectangle($original 3);
  color: contrast(rectangle($original 3));
}
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
</body>
</html>

