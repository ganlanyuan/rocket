<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 class="main-heading"><span>addons: </span>responsive type</h2>
      <div class="example">
        <p class="example-responsive-type">The research, published by the National Academies of Sciences, Engineering and Medicine, is the result of a sweeping review of nearly 900 publications on the effects of genetically modified crops on human health and the environment. </p>
      </div>
    </div>
    <div class="content-aside-long">
      <pre><code class="language-scss">
$bp: (
  small : 480px,
  medium: 700px,
  large : 1024px
);
$p-font-sizes: (
  null  : (13px 1.7),
  small : 20px,
  medium: (30px 1.5),
  900px : 40px,
  large : (50px 1.2),
  1440px: 60px,
);
p.example-responsive-type { @include rp-type($p-font-sizes $bp); }
</code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php"; ?>
</div>
</body>
</html>

