<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 class="main-heading"><span>addons: </span>visibility</h2>
      <div class="visibility-wrap">
        <div class="visible-1">&gt; 900</div>
        <div class="visible-2">900 ~ 1000</strong></div>
        <div class="visible-3">700 ~ 900 | &gt; 1200</div>
        <div class="hidden-1">&lt; 900</div>
        <div class="hidden-2">&lt; 900 | &gt; 1000</strong></div>
        <div class="hidden-3">&lt; 700 | 900 ~ 1200</div>
      </div>
      <pre><code class="language-scss">
.visible-1 { @include visible(900); }
.visible-2 { @include visible(900 1000 screen); }
.visible-3 { @include visible(700 900 1200); }
.hidden-1 { @include hidden(900); }
.hidden-2 { @include hidden(900 1000); }
.hidden-3 { @include hidden(700 900 1200); }
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
</body>
</html>

