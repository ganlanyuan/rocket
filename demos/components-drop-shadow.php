<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 class="main-heading"><span>components: </span>drop-shadow</h2>
      <div class="example">
        <div class="example-drop-shadow">
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
.lifted { @include drop-shadow(lifted); }
.raised { @include drop-shadow(raised); }
.perspective { @include drop-shadow(perspective); }
.curve.left { @include drop-shadow(curve left); }
.curve.right { @include drop-shadow(curve right); }
.curve.horizontal { @include drop-shadow(curve horizontal); }
.curve.top { @include drop-shadow(curve top); }
.curve.bottom { @include drop-shadow(curve bottom); }
.curve.vertical { @include drop-shadow(curve vertical); }
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php"; ?>
</div>
</body>
</html>

