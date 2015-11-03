<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 class="main-heading"><span>components: </span>drop-shadows</h2>
      <div class="example">
        <div class="example-drop-shadows">
          <div class="box lifted">lifted</div>
          <div class="box raised">raised</div>
          <div class="box perspective">perspective</div>
          <div class="box curve horizontal">curve horizontal</div>
          <div class="box curve left">curve left</div>
          <div class="box curve right">curve right</div>
          <div class="box curve top">curve top</div>
          <div class="box curve bottom">curve bottom</div>
          <div class="box curve vertical">curve vertical</div>
        </div>
      </div>
      <pre><code class="language-scss">
.lifted { @include drop-shadows(lifted); }
.raised { @include drop-shadows(raised); }
.perspective { @include drop-shadows(perspective); }
.curve.left { @include drop-shadows(curve left); }
.curve.right { @include drop-shadows(curve right); }
.curve.horizontal { @include drop-shadows(curve horizontal); }
.curve.top { @include drop-shadows(curve top); }
.curve.bottom { @include drop-shadows(curve bottom); }
.curve.vertical { @include drop-shadows(curve vertical); }
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php"; ?>
</div>
</body>
</html>

