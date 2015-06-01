<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>components: </span>buttons</h2>
      <div class="example">
        <div class="example-button">
          <div class="pagination">
            <a href=""><span class="ic-angle-left"></span></a>
            <a href="">1</a>
            <a href="">2</a>
            <a href="">3</a>
            <a href="">4</a>
            <a href=""><span class="ic-angle-right"></span></a>
          </div>
          <input type="search" name="" id="">
          <button>Submit</button>
        </div>
      </div>
      <pre><code class="language-scss">
button { @include button(14px '.5em .8em' #3255ff round hover); }
input {
  display: block; 
  @include button(16px '.5em 1em' radius); 
  border: 1px solid  #ddd;
}
.pagination a { 
  display: inline-block; 
  @include button(13px '.5em .6em' #dbdbdb hover radius);
}
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php"; ?>
</div>
</body>
</html>

