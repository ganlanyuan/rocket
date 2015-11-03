<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 class="main-heading"><span>components: </span>parallelogram</h2>
      <div class="example">
        <div class="example-parallelogram">
          <nav>
            <ul>
              <li><a href="">News</a></li>
              <li><a href="">Products</a></li>
              <li><a href="">About us</a></li>
              <li><a href="">Contact us</a></li>
            </ul>
          </nav>
        </div>
      </div>
      <pre><code class="language-scss">
.example-parallelogram a {
  @include parallelogram(linear-gradient(to bottom, #32A8DE, #54CDDE) -20deg);
}
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php"; ?>
</div>
</body>
</html>

