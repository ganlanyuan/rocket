<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>layout: </span>center</h2>
      <div class="example example-center cell" data-margin>
        <div data-content>
        <div class="example-content">
          center
        </div>
        </div>
      </div>
      <pre><code class="language-scss">
.example-center { @include center(div,left);
  > div { width: 200px; padding: 10px; }
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

