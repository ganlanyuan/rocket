<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>color: </span>adjacent</h2>
      <div class="example-adjacent">
        <div class="color-box color-box-adjacent-1">adjacent 1</div>
        <div class="color-box color-box-original">original</div>
        <div class="color-box color-box-adjacent-2">adjacent 2</div>
        <div class="color-pattern"><img src="images/adjacent.png" alt="adjacent-colors"></div>
      </div>
      <pre><code class="language-scss">
.color-box-adjacent-1 { 
  background-color: adjacent($original, -1); 
  color: contrast(adjacent($original, -1));
}
.color-box-adjacent-2 { 
  background-color: adjacent($original, 1);
  color: contrast(adjacent($original, 1));
}
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <footer class="site-footer">
    <div class="container">
      <p class="copy-right">Copyright © 2014 Rocket, All rights reserved. </p>
    </div>
  </footer>
</div>
</body>
</html>

