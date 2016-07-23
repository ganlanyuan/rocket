<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 class="main-heading"><span>js: </span>scrollTo</h2>
      <div class="scroll-to">
        <button class="btn btn-1">scroll to 100px</button> <br>
        <button class="btn btn-2">scroll to <strong>.box</strong></button> <br>
        <div class="box"><strong>Box</strong></div>
        <button class="btn btn-3">scroll to top</button>
      </div>
      <pre><code class="language-javascript">
  kit('.btn-1').click(function() { scrollTo(100, 500); }); // 500 => 500ms
  kit('.btn-2').click(function() { scrollTo(kit('.box').getTop(), 500); });
  kit('.btn-3').click(function() { scrollTo(0, 500); });
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
<script>
  ready(function () {
    kit('.btn-1').click(function() { scrollTo(100, 500); }); // 500 => 500ms
    kit('.btn-2').click(function() { scrollTo(kit('.box').getTop(), 500); });
    kit('.btn-3').click(function() { scrollTo(0, 500); });
  });
</script>
</body>
</html>

