<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>addons: </span>font-size</h2>
      <div class="example">
        <h3 class="example-font-size">This is a h3</h3>
        <p class="example-font-size">This is a paragraph.</p>
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
  null  : (15px, 1.3),
  small : 16px,
  medium: (17px, 1.4),
  900px : 18px,
  large : (19px, 1.45),
  1440px: 20px,
);
$h3-font-sizes: (
  null  : (18px, 1.3),
  900px : 22px,
  large : (30px, 1.2),
);
h3.example-font-size { @include font-size($h3-font-sizes, $bp); }
p.example-font-size { @include font-size($p-font-sizes, $bp); }
</code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php"; ?>
</div>
</body>
</html>

