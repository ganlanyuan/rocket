<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>color: </span>square</h2>
      <div class="example-square">
        <div class="color-box color-box-original">original</div>
        <div class="color-box color-box-square-1">square 1</div>
        <div class="color-box color-box-square-2">square 2</div>
        <div class="color-box color-box-square-3">square 3</div>
        <div class="color-pattern"><img src="images/square.png" alt="square-colors"></div>
      </div>
      <pre><code class="language-scss">
.color-box-square-1 { 
  background-color: square($original 1); 
  color: contrast(square($original 1));
}
.color-box-square-2 { 
  background-color: square($original 2);
  color: contrast(square($original 2));
}
.color-box-square-3 { 
  background-color: square($original 3);
  color: contrast(square($original 3));
}
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
</body>
</html>

