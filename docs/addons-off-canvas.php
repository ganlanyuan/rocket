<?php include 'include/head.php'; ?>
<body>
<?php include 'include/mb-nav.php'; ?>
<div class="page">
  <div data-page-cover=""></div>
  <div class="container">

    <div class="topic">
      <h2 id=""><span>addons: </span>off-canvas</h2>
      <div data-icon-nav class="icon-nav"><span></span></div>
      <pre><code class="language-scss">
.mb-nav {
  @include off-canvas(translate,left,14px,16px,#102244,true);
}
[data-offcanvas-close] { 
  @include icon-close(#fff, #74baff, 18px 2px 3px, 10px, true); 
}
.icon-nav { @include icon-nav(#333); }
.page { @include page-container(translate,left); }
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php"; ?>
</div>
</body>
</html>

