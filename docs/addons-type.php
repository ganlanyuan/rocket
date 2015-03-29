<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>addons: </span>type</h2>
      <div class="example">
        <h1 class="example-type">This is h1</h1>
        <h2 class="example-type">This is h2</h2>
        <h3 class="example-type">This is h3</h3>
        <h4 class="example-type">This is h4</h4>
        <h5 class="example-type">This is h5</h5>
      </div>
    </div>
    <div class="content-aside-long">
      <pre><code class="language-scss">
h1.example-type { @include type(32px,null,null,1.1); }
h2.example-type { @include type(28px,null,null,1.2); }
h3.example-type { @include type(24px,null,null,1.3); }
h4.example-type { @include type(20px,null,null,1.4); }
h5.example-type { @include type(16px,null,null,1.5); }
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

