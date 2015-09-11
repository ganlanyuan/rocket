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
          <span class="round">round button</span> <br>
          <span class="highlight">highlight</span>
          <span class="simple">simple</span>
          <span class="slide-bg">slide-bg</span>
          <span class="water-drop">water-drop</span>
          <span class="ujarak">ujarak</span>
          <span class="wayra">wayra</span>
          <span class="winona ic-star"><span>winona</span></span>
          <span class="moema">moema</span>
          <span class="flash">flash <span></span><span></span><span></span><span></span></span>
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

