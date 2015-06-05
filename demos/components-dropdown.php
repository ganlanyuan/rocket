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
          <input type="checkbox" name="" id="dropdown" style="display: none">
          <label for="dropdown">▼</label>
          <ul>
            <li><a href="">item01</a></li>
            <li><a href="">item02</a></li>
            <li><a href="">item03</a></li>
          </ul>
        </div>              
      </div>
      <pre><code class="language-scss">
.dropdown-1 { @include dropdown(default); }
.dropdown-2 { @include dropdown(default click); }
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php"; ?>
</div>
</body>
</html>

