<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>layout: </span>grid</h2>
      <h4>span</h4>
      <div class="example example-span" data-margin>
        <div class="example-span-1 cell" data-content>
          <div class="example-content">
            7 columns / 11 columns<br>
            $gutter: 2%; 
          </div>
        </div>
        <div class="example-span-2 cell" data-content>
          <div class="example-content">
            4 columns / 11 columns
          </div>
        </div>
      </div>
      <pre><code class="language-scss">
.example-span-1 { @include span(7 of 11 2%); }
.example-span-2 { @include span(4 of 11 2% last); }
      </code></pre>
      <h4>span-calc</h4>
      <div class="example" data-margin>
        <div class="example-span-calc-1 cell" data-content="">
          <div class="example-content">
            8 columns / 11 columns<br>
            $guttter: 20px
          </div>
        </div>
        <div class="example-span-calc-2 cell" data-content="">
          <div class="example-content">
            3 columns / 11 columns<br>
          </div>
        </div>
      </div>
      <pre><code class="language-scss">
.example-span-calc-1 { @include span-calc(8 of 11 move 3 20px); }
.example-span-calc-2 { @include span-calc(3 of 11 move -8 20px last); }
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
</body>
</html>
