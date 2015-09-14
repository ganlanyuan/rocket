<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>layout: </span>Metro</h2>
      <ul class="w3">
        <li>
          <div class="metro-item">
            <ul class="w3i">
              <li>
                <div class="metro-item" data-content="">1-1</div>
              </li>
              <li>
                <div class="metro-item" data-content="">1-2</div>
              </li>
              <li>
                <div class="metro-item" data-content="">1-3</div>
              </li>
              <li>
                <div class="metro-item" data-content="">1-4</div>
              </li>
            </ul>
          </div>
        </li>
        <li>
          <div class="metro-item" data-content>2</div>
        </li>
        <li>
          <div class="metro-item" data-content>3</div>
        </li>
        <li>
          <div class="metro-item" data-content>4</div>
        </li>
      </ul>
      <pre><code class="language-scss">
.example-gallery {
  @include gallery(3 2% child li); 
  @include breakpoint('min' 800) {
    @include gallery(4 child li keep);
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

