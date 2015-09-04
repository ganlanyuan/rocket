<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>layout: </span>grid</h2>
      <div class="example">
        <div class="row">
          <div class="col1">
            <div class="example-content cell" data-content>1</div>
          </div>
          <div class="col2">
            <div class="example-content cell" data-content>2</div>
          </div>
          <div class="col3">
            <div class="example-content cell" data-content>3</div>
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
      </code></pre>
      <div class="example">
        <div class="row-2">
          <div class="col1">
            <div class="example-content cell" data-content>1</div>
          </div>
          <div class="col2">
            <div class="example-content cell" data-content>2</div>
          </div>
          <div class="col3">
            <div class="example-content cell" data-content>3</div>
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
