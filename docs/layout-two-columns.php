<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>layout: </span>two columns</h2>
      <div class="example example-two-columns" data-margin>
        <div data-col-main data-content>
          <div class="example-content">
            main
          </div>
        </div>
        <div data-col-aside data-content>
          <div class="example-content">
            aside: 200px
          </div>
        </div>
      </div>
      <pre><code class="language-scss">
.example-two-columns { @include two-columns(right, 200, 20); }
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

