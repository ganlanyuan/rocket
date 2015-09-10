<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>components: </span>buttons</h2>
      <div class="example">
        <div class="example-button">
          <span class="normal">normal button</span>
          <a href="" class="radius">radius button</a>
          <button class="round">round button</button> <br>
          <button class="highlight">highlight</button>
          <button class="simple">simple</button>
          <button class="slide-bg">slide-bg</button>
          <button class="water-drop">water-drop</button>
        </div>
      </div>
      <pre><code class="language-scss">
button { @include button(14px '.5em .8em' #3255ff round hover); }
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php"; ?>
</div>
</body>
</html>

