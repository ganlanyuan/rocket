<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 class="main-heading"><span>components: </span>tooltip</h2>
      <div class="tooltip top" data-tooltip="I'm a tooltip! Mouse over me to see my content.">top</div>
      <div class="tooltip right" data-tooltip="I'm a tooltip! Mouse over me to see my content.">right</div>
      <div class="tooltip bottom" data-tooltip="I'm a tooltip! Mouse over me to see my content.">bottom</div>
      <div class="tooltip left" data-tooltip="I'm a tooltip! Mouse over me to see my content.">left</div>
      <pre><code class="language-scss">
.tooltip { @include tooltip(radius right #b02df3 width 300px); }
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
</body>
</html>

