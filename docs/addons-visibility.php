<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>addons: </span>visibility</h2>
      <div class="visible-1">Visible on <strong>900px</strong> up</div>
      <div class="visible-2">visible between <strong>900px</strong> and <strong>1000px</strong></div>
      <div class="visible-3">visible between <strong>700px</strong> and <strong>900px</strong>, and <strong>1200px</strong> up</div>
      <div class="hidden-1">Hidden on <strong>900px</strong> up</div>
      <div class="hidden-2">Hidden between <strong>900px</strong> and <strong>1000px</strong></div>
      <div class="hidden-3">Hidden between <strong>700px</strong> and <strong>900px</strong>, and <strong>1200px</strong> up</div>
      <pre><code class="language-scss">
.visible-1 { @include visible(null, 900);}
.visible-2 { @include visible(null, 900, 1000);}
.visible-3 { @include visible(null, 700, 900, 1200);}
.hidden-1 { @include hidden(null, 900);}
.hidden-2 { @include hidden(null, 900, 1000);}
.hidden-3 { @include hidden(null, 700, 900, 1200);}
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

