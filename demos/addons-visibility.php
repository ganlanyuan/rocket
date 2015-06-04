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
.visible-1 { @include visible(900);}
.visible-2 { @include visible(900 1000 screen);}
.visible-3 { @include visible(700 900 1200);}
.hidden-1 { @include hidden(900);}
.hidden-2 { @include hidden(900 1000);}
.hidden-3 { @include hidden(700 900 1200);}
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
</body>
</html>

