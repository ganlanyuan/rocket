<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 class="main-heading"><span>addons: </span>breakpoint</h2>
      <div class="box"></div>
      <pre><code class="language-scss">
.box {
  background-color: #FF00FF;
  @include bp('max' 600) {
    &:before {
      content: "< 600";
    }
  }
  @include bp(600 800) {
    &:before {
      content: "600 ~ 800";
    }
  }
  @include bp(800 1000) {
    &:before {
      content: "800 ~ 1000";
    }
  }
  @include bp(1000 1200) {
    &:before {
      content: "1000 ~ 1200";
    }
  }
  @include bp('min' 1200) {
    &:before {
      content: "> 1200";
    }
  }
  @include bp(600 800 1000 1200) {
    background-color: #0080FF;
  }
}
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
</body>
</html>

