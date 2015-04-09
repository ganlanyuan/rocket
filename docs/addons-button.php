<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>addons: </span>buttons</h2>
      <div class="example">
        <div class="example-button">
          <ul class="breadcrumb">
            <li><a href="">Home</a><span class="ic-angle-right"></span></li>
            <li><a href="">news</a></li>
          </ul>
          <div class="pagination">
            <a href=""><span class="ic-angle-left"></span></a>
            <a href="">1</a>
            <a href="">2</a>
            <a href="">3</a>
            <a href="">4</a>
            <a href=""><span class="ic-angle-right"></span></a>
          </div>
          <button>Submit</button>
          <input type="search" name="" id="">
        </div>
      </div>
      <pre><code class="language-scss">
button { @include button(14px, .5em .8em,#3255ff, null, 3px ); }
input { @include button(16px, .5em 1em, null, 1px solid #ccc, 3px); }
.pagination a { @include button(13px, em(5) em(8), #dbdbdb, null, 3px); }
.breadcrumb a { @include button(14px, 5px); }
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php"; ?>
</div>
</body>
</html>

