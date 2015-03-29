<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>layout: </span>grid</h2>
      <div class="example example-span" data-margin>
        <div class="example-span-1 cell" data-content>
          <div class="example-content">
            width: 62.5%; <br>
            $gutter: 3.125%; 
          </div>
        </div>
        <div class="example-span-2 cell" data-content>
          <div class="example-content">
            width: 34.375%;
          </div>
        </div>
      </div>
      <pre><code class="language-scss">
.example-span-1 { @include span(7,11,1/2); }
.example-span-2 { @include span(4,11,1/2,$last:true); }
      </code></pre>
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
.example-span-calc-1 { @include span-calc(8,11,20); }
.example-span-calc-2 { @include span-calc(3,11,20,$last:true); }
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <footer class="site-footer">
    <div class="container">
      <p class="copy-right">Copyright © 2014 Rocket, All rights reserved. </p>
    </div>
  </footer>
</div>
</body>
</html>
