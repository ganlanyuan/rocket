<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>components: </span>flex video</h2>
      <div class="flex-video-wrap">
        <div class="flex-video"><iframe width="560" height="315" src="//www.youtube.com/embed/Rb0UmrCXxVA" frameborder="0" allowfullscreen></iframe></div>
      </div>
      <pre><code class="language-scss">
      .flex-video { @include flex-video(iframe 315/560); }
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php"; ?>
</div>
</body>
</html>

