<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>layout: </span>justify</h2>
      <ul class="example-justify">
        <li><a href="">Lorem</a></li>
        <li><a href="">Internet</a></li>
        <li><input type="search" placeholder="Click me!"></li>
      </ul>
      <pre><code class="language-scss">
.example-justify {
  @include justify-flex();
  .no-flexbox & { @include justify(li); }
}
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
</body>
</html>

