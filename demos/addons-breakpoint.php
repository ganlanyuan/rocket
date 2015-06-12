<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>addons: </span>breakpoint</h2>
      <div class="box"></div>
      <pre><code class="language-scss">
.box {
  @include breakpoint('min' 900) {
    &:before {
      content: "min 900px";
      color: #fff;
      font-size: 40px;
    }
  }
  @include breakpoint('max' 700) {
    &:before {
      content: "max 700px";
      color: #fff;
      font-size: 40px;
    }
  }
  @include breakpoint(600 800 1000 1200) {
    background-color: #FF00FF;
    width: 300px;
    height: 150px;
    transform: rotate(30deg);
  }
  @include breakpoint(801 999 1201) {
    background-color: #0080FF;
    width: 200px;
    height: 200px;
    transform: rotate(240deg);
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

