<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>layout: </span>liquid-2</h2>
      <div class="example example-liquid-2" data-margin>
        <div data-main>
          <div class="example-content" data-content>
            <strong>main</strong> <br>
            <div class="hide">
              More content <br>
              &nbsp; <br>
              &nbsp; <br>
              &nbsp;
            </div>
          </div>
        </div>
        <div data-aside>
          <div class="example-content" data-content>
            <strong>aside</strong>
          </div>
        </div>
      </div>
      <pre><code class="language-scss">
.example-liquid-2 { 
  @include liquid-2(right 200px); 
  @media (min-width: 800px) {
    @include liquid-2(300px order -1);
  }
}
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
</body>
</html>

