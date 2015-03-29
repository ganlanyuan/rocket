<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>color: </span>contrast</h2>
      <div class="contrast">
        <div class="color-box color-box-contrast">contrast</div>
      </div>
      <pre><code class="language-scss">
.color-box-contrast { 
  background-color: $contrast; 
  color: contrast($contrast);
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

