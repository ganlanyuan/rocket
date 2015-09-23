<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>js: </span>sticky</h2>
      <div class="sticky-grid parent-l1">
        <div>
          <div class="box"></div>
          <div class="box"></div>
          <div class="sticky sticky-high sticky-l1"></div>
          <!-- <div class="box"></div> -->
        </div>
        <div>
          <div class="inner-1 parent-r1">
            <div>
              <div class="box"></div>
              <div class="parent parent-m1">
                <div class="child">
                  <div class="box"></div>
                  <div class="box"></div>
                </div>
                <div class="child">
                  <div class="sticky sticky-m1"></div>
                  <!-- <div class="box"></div> -->
                </div>
              </div>
              <div class="box two"></div>
              <div class="box"></div>
            </div>
            <div>
              <div class="box"></div>
              <div class="box three"></div>
              <div class="sticky sticky-r1"></div>
              <!-- <div class="box"></div> -->
            </div>
          </div>
          <div class="inner-2 parent-m2">
            <div>
              <div class="box"></div>
              <div class="sticky sticky-m2"></div>
              <!-- <div class="box two"></div> -->
            </div>
            <div>
              <div class="box"></div>
              <div class="parent parent-r2">
                <div class="child">
                  <div class="box"></div>
                  <div class="box two"></div>
                </div>
                <div class="child">
                  <div class="box"></div>
                  <div class="sticky sticky-r2"></div>
                  <!-- <div class="box"></div> -->
                </div>
              </div>
              <div class="box two"></div>
            </div>
          </div>
        </div>
      </div>
      <pre><code class="language-javascript">
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
<script>
  ready(function () {
    sticky('.sticky-l1', '.parent-l1', 0);
    sticky('.sticky-m1', '.parent-m1', 0);
    sticky('.sticky-r1', '.parent-r1', 0);
    sticky('.sticky-m2', '.parent-m2', 0);
    sticky('.sticky-r2', '.parent-r2', 0);
  });
</script>
</body>
</html>

