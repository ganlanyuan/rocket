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
h1 { @include type(32px 1.1 italic); }
h2 { @include type(28px 1.2 weight-normal uppercase); }
h3 { @include type(24px 900 1.3); }
h4 { @include type(20px 'Georgia, Helvetica, sans-serif' 1.4); }
h5 { @include type(16px 1.5); }
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php"; ?>
</div>
</body>
</html>

