<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 class="main-heading"><span>js: </span>sticky</h2>
      <div class="sticky-grid wrapper-left-1">
        <div>
          <div class="box"></div>
          <div class="sticky sticky-high sticky-left-1">
            <strong>left-1</strong>
            top <br>
            very long sticky
          </div>
        </div>
        <div>
          <div class="inner-1 wrapper-right-1">
            <div>
              <div class="wrapper wrapper-middle-1">
                <div class="child">
                  <div class="box"></div>
                  <div class="box"></div>
                  <div class="box"></div>
                </div>
                <div class="child">
                  <div class="sticky sticky-middle-1">
                    <strong>middle-1</strong>
                    top <br>
                    sticks between 600 ~ 1000
                  </div>
                </div>
              </div>
              <div class="box two"></div>
              <div class="box"></div>
            </div>
            <div>
              <div class="box two"></div>
              <div class="sticky sticky-right-1">
                <strong>right-1</strong>
                top
              </div>
              <div class="box"></div>
            </div>
          </div>
          <div class="inner-2 wrapper-middle-2">
            <div>
              <div class="box"></div>
              <div class="sticky sticky-middle-2">
                <strong>middle-2</strong>
                bottom
              </div>
              <div class="box two"></div>
            </div>
            <div>
              <div class="box"></div>
              <div class="wrapper wrapper-right-2">
                <div class="child">
                  <div class="box"></div>
                  <div class="box two"></div>
                </div>
                <div class="child">
                  <div class="box"></div>
                  <div class="sticky sticky-right-2">
                    <strong>right-2</strong>
                    bottom
                  </div>
                  <div class="box"></div>
                </div>
              </div>
              <div class="box two"></div>
            </div>
          </div>
        </div>
      </div>
      <pre><code class="language-javascript">
ready(function () {
  sticky({
    sticky: '.sticky-left-1', 
    spacing: 10,
    stickyWrapper: '.wrapper-left-1',
  });
  sticky({
    sticky: '.sticky-middle-1', 
    stickyWrapper: '.wrapper-middle-1', 
    spacing: 30,
    breakpoints: [600, 1000]
  });
  sticky({
    sticky: '.sticky-right-1', 
    stickyWrapper: '.wrapper-right-1',
    spacing: 10,
  });
  sticky({
    sticky: '.sticky-middle-2', 
    stickyWrapper: '.wrapper-middle-2', 
    stickTo: 'bottom',
    spacing: 10,
  });
  sticky({
    sticky: '.sticky-right-2',  
    stickTo: 'bottom',
    spacing: 10,
  });
});
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
<script>
  sticky({
    sticky: '.sticky-left-1', 
    spacing: 10,
    stickyWrapper: '.wrapper-left-1',
  });
  sticky({
    sticky: '.sticky-middle-1', 
    stickyWrapper: '.wrapper-middle-1', 
    spacing: 30,
    breakpoints: [600, 1000]
  });
  sticky({
    sticky: '.sticky-right-1', 
    stickyWrapper: '.wrapper-right-1',
    spacing: 10,
  });
  sticky({
    sticky: '.sticky-middle-2', 
    stickyWrapper: '.wrapper-middle-2', 
    stickTo: 'bottom',
    spacing: 10,
  });
  sticky({
    sticky: '.sticky-right-2',  
    stickTo: 'bottom',
    spacing: 10,
  });
</script>
</body>
</html>

