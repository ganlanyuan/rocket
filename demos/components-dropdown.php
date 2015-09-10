<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>components: </span>dropdown</h2>
      <div class="example">
        <div class="dropdown-1">
          <label for="dropdown"><span>dropdown: </span><img src="images/arrow-down.png" alt="">&nbsp;&nbsp;&nbsp;&nbsp;</label>
          <input type="checkbox" name="" id="dropdown">
          <ul>
            <li><a href="">item 01</a></li>
            <li><a href="">item 02</a></li>
            <li class="sub-2">
              <input type="checkbox" name="" id="dropdown-2">
              <label for="dropdown-2"><img src="images/arrow-down.png" alt=""></label>
              <a href="">item 03</a>
              <ul>
                <li><a href="">subitem 01</a></li>
                <li><a href="">subitem 02</a></li>
                <li><a href="">subitem 03</a></li>
              </ul>
            </li>
          </ul>
        </div>              
        <div class="dropdown-2">
          <span>dropdown: hover</span>
          <ul>
            <li><a href="">item 01</a></li>
            <li class="sub"><a href="">item 02 <img src="images/arrow-right.png" alt=""></a>
              <ul>
                <li><a href="">subitem 01</a></li>
                <li><a href="">subitem 02</a></li>
                <li class="sub"><a href="">subitem 03 <img src="images/arrow-right.png" alt=""></a>
                  <ul>
                    <li><a href="">subitem 01</a></li>
                    <li><a href="">subitem 02</a></li>
                    <li><a href="">subitem 03</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="">item 03</a></li>
          </ul>
        </div>              
      </div>
      <pre><code class="language-scss">
.dropdown-1 { 
  @include dropdown(default); 
  .sub { 
    @include dropdown(default right hover); 
  }
}
.dropdown-2 { 
  @include dropdown(default scale click); 
  .sub-2 {
    @include dropdown(default left scale click);
  }
}
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php"; ?>
</div>
</body>
</html>

