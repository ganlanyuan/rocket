<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>addons: </span>responsive type</h2>
      <div class="example">
        <h3 class="example-responsive-type">This is a h3</h3>
        <p class="example-responsive-type">This is a paragraph.</p>
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
  null  : (15px 1.3),
  small : 16px,
  medium: (17px 1.4),
  900px : 18px,
  large : (19px 1.45),
  1440px: 20px,
);
$h3-font-sizes: (
  null  : (18px 1.3 right),
  900px : 22px,
  large : (30px 1.2 left 300),
);
h3.example-responsive-type { @include responsive-type($h3-font-sizes, $bp); }
p.example-responsive-type { @include responsive-type($p-font-sizes, $bp); }
</code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php"; ?>
</div>
</body>
</html>

