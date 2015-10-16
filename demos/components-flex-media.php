<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 class="main-heading"><span>components: </span>flex media</h2>
      <div class="flex-video-wrap">
        <div class="video"><iframe width="560" height="315" src="//www.youtube.com/embed/Rb0UmrCXxVA" frameborder="0" allowfullscreen></iframe></div>
      </div>
      <pre><code class="language-scss">
      .video { @include flex-media(iframe 315/560); }
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php"; ?>
</div>
</body>
</html>

