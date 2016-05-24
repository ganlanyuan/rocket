<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 class="main-heading"><span>addons </span>visibility</h2>
      <div class="visibility-wrap">
        <div class="visible-1">Visible <span>&gt; 800</span></div>
        <div class="visible-2">Visible <span>500 - 600</span></div>
        <div class="visible-3">Visible <span>600 - 700 || &gt; 1100</span></div>
        <div class="hidden-1">Hidden <span>&gt; 800</span></div>
        <div class="hidden-2">Hidden <span>500 - 800</span></div>
        <div class="hidden-3">Hidden <span>800 - 900 || &gt; 1100</span></div>
      </div>
      <pre><code class="language-scss">
.visible-1 { @include visible(800); }
.visible-2 { @include visible(500 600 screen); }
.visible-3 { @include visible(600 700 1100); }
.hidden-1 { @include hidden(800); }
.hidden-2 { @include hidden(500 800); }
.hidden-3 { @include hidden(800 900 1100); }
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
</body>
</html>

