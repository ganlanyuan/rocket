<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>color: </span>triad</h2>
      <div class="example-triad">
        <div class="color-box color-box-original">original</div>
        <div class="color-box color-box-triad-1">triad 1</div>
        <div class="color-box color-box-triad-2">triad 2</div>
        <div class="color-pattern"><img src="images/triad.png" alt="triad-colors"></div>
      </div>
      <pre><code class="language-scss">
.color-box-triad-1 { 
  background-color: triad($original 1); 
  color: contrast(triad($original 1));
}
.color-box-triad-2 { 
  background-color: triad($original 2);
  color: contrast(triad($original 2));
}
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
</body>
</html>

