<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>addons: </span>tooltip</h2>
      <div class="tooltip" data-tooltip="I'm a tooltip! Mouse over me to see my content.">Mouse over me!</div>
      <pre><code class="language-scss">
.tooltip { @include tooltip(right, #b02df3, 3px, 300px); }
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <footer class="site-footer">
    <div class="container">
      <p class="copy-right">Copyright © 2014 Rocket, All rights reserved. </p>
    </div>
  </footer>
</div>
</body>
</html>

