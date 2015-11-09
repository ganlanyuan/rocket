<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 class="main-heading"><span>addons: </span>hide-text</h2>
      <div class="example">
        <h1 class="logo"><a href="">Firefox</a></h1>
      </div>
    </div>
    <div class="content-aside-long">
      <pre><code class="language-scss">
.logo > a {
  @extend %hide-text;
  
  display: block;
  width: 144px;
  height: 154px;
  background: url('https://mozorg.cdn.mozilla.net/media/img/styleguide/identity/firefox/usage-logo.54fbc7b6231b.png') 0 0 no-repeat;
}
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php"; ?>
</div>
</body>
</html>

