<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>layout: </span>justify</h2>
      <ul class="example-justify">
        <li><a href="">Features</a></li>
        <li><a href="">Pricing</a></li>
        <li><a href="">Resources</a></li>
        <li><a href="">Partners</a></li>
        <li><a href="">Community</a></li>
        <li><a href="">Blog</a></li>
        <li><input type="search" placeholder="click me"></li>
      </ul>
      <pre><code class="language-scss">
.example-justify {
  @include justify(li);
}
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
</body>
</html>

