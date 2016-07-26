<?php include '../part/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 class="main-heading"><span>js: </span>reach</h2>
      <div class="reach">
        <div class="box box-1">box-1</div>
        <div class="box box-2">box-2</div>
        <div class="box box-3">box-3</div>
      </div>
      <pre><code class="language-javascript">
var box1 = kit('.box-1'),
    box2 = kit('.box-2'),
    box3 = kit('.box-3');

window.onscroll = function () {
  if (box1.reach('top', -20)) { 
    // ...
  } else {
    // ...
  }

  if (box2.reach('middle')) { 
    // ...
  } else {
    // ...
  }

  if (box3.reach('bottom', 50)) { 
    // ...
  } else {
    // ...
}
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
<script>
  ready(function () {
    var box1 = kit('.box-1'),
        box2 = kit('.box-2'),
        box3 = kit('.box-3');

    window.onscroll = function () {
      if (box1.reach('top', -20)) { 
        if (!box1.hasClass('reached')) {
          box1.addClass('reached').text('box-1, 20px below top'); 
        } 
      } else {
        box1.removeClass('reached').text('box-1'); 
      }

      if (box2.reach('middle')) { 
        if (!box2.hasClass('reached')) {
          box2.addClass('reached').text('box-2, reach middle'); 
        }
      } else {
        box2.removeClass('reached').text('box-2'); 
      }

      if (box3.reach('bottom', 50)) { 
        if (!box3.hasClass('reached')) {
          box3.addClass('reached').text('box-3, 50px above bottom'); 
        }
      } else {
        box3.removeClass('reached').text('box-3'); 
      }
    }
  });
</script>
</body>
</html>

