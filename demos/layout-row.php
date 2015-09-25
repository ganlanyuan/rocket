<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>layout: </span>row</h2>
      <div class="example ovh">
        <div class="row" data-margin>
          <div class="col1">
            <div class="example-content cell" data-content><strong>A</strong></div>
          </div>
          <div class="col2">
            <div class="example-content cell" data-content><strong>B</strong></div>
          </div>
          <div class="col3">
            <div class="example-content cell" data-content><strong>C</strong></div>
          </div>
        </div>
      </div>
      <pre><code class="language-scss">
// * flexbox * //
$layout: (
  2:1,
  7:0,
  3:0,
);
.row { @include row($layout); }

// or @include row((2:1, 7:0, 3:0));
// if you don't need to change the orders, simply @include row((2 7 3));
      </code></pre>
      <div class="example ovh">
        <div class="row-2" data-margin>
          <div class="col1">
            <div class="example-content cell" data-content><strong>A</strong></div>
          </div>
          <div class="col2">
            <div class="example-content cell" data-content><strong>B</strong></div>
          </div>
          <div class="col3">
            <div class="example-content cell" data-content><strong>C</strong></div>
          </div>
        </div>
      </div>
      <pre><code class="language-scss">
// * float * //
.row-2 {
  @include row();
  .col1 { @include col(2 move 10); }
  .col2 { @include col(7 move -2); }
  .col3 { @include col(3 move -2); }
}
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
</body>
</html>
