<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>components: </span>dropdown</h2>
      <div class="example">
        <div class="dropdown-1">
          <span>dropdown: hover</span>
          <ul>
            <li><a href="">item01</a></li>
            <li><a href="">item02</a></li>
            <li><a href="">item03</a></li>
          </ul>
        </div>              
        <div class="dropdown-2">
          <span>dropdown: </span>
          <span class="ic-angle-down" data-dropdown-toggle></span>
          <ul>
            <li><a href="">item01</a></li>
            <li><a href="">item02</a></li>
            <li><a href="">item03</a></li>
          </ul>
        </div>              
      </div>
      <pre><code class="language-scss">
.dropdown-1 { @include dropdown(); }
.dropdown-2 { @include dropdown(#fff, em(8) em(12), 1px solid #f3ecec, 3px, null, click); }
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php"; ?>
</div>
</body>
</html>

