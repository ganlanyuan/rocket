<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>layout: </span>gallery</h2>
      <ul class="example-gallery">
        <li data-padding><span class="example-content" data-content>
          3 colomns / 12 columns<br>
          $gutter: 20px
        </span></li>
        <li data-padding><span data-content></span></li>
        <li data-padding><span data-content></span></li>
        <li data-padding><span data-content></span></li>
        <li data-padding><span data-content></span></li>
        <li data-padding><span data-content></span></li>
        <li data-padding><span data-content></span></li>
        <li data-padding><span data-content></span></li>
      </ul>
      <pre><code class="language-scss">
.example-gallery { @include gallery(4,20px,'li',12); }
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
</body>
</html>

