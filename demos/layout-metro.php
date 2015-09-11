<?php include 'include/head.php'; ?>
<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>layout: </span>gallery</h2>
      <ul class="example-gallery">
        <li><div class="w3">
          <div data-content></div>
          <div data-content></div>
          <div data-content></div>
          <div data-content></div>
        </div></li>
        <li><div class="cell" data-content></div></li>
        <li><div class="cell" data-content></div></li>
        <li><div class="cell" data-content></div></li>
        <li><div class="cell" data-content></div></li>
        <li><div class="cell" data-content></div></li>
        <li><div class="cell" data-content></div></li>
        <li><div class="cell" data-content></div></li>
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

