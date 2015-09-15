<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>components: </span>Charts</h2>
      <div class="charts-wrap">
        <h4>Population of Largest U.S. Cities</h4>
        <div class="charts charts1">
          <ul class="items">
            <li class="item-1">
              <strong>Copper</strong>
              <span></span>
            </li>
            <li class="item-2">
              <strong>Silver</strong>
              <span></span>
            </li>
            <li class="item-3">
              <strong>Gold</strong>
              <span></span>
            </li>
            <li class="item-4">
              <strong>Platinum</strong>
              <span></span>
            </li>
          </ul>
          <div class="ticks">
            <div class="tick-1"><span></span></div>
            <div class="tick-2"><span></span></div>
            <div class="tick-3"><span></span></div>
            <div class="tick-4"><span></span></div>
            <div class="tick-5"><span></span></div>
            <div class="tick-6"><span></span></div>
            <div class="tick-7"><span></span></div>
            <div class="tick-8"><span></span></div>
            <div class="tick-9"><span></span></div>
            <div class="tick-10"><span></span></div>
            <div class="tick-11"><span></span></div>
            <div class="tick-12"><span></span></div>
            <div class="tick-13"><span></span></div>
          </div>
          <div class="labels">
            <div class="label-1">sales</div>
          </div>
        </div>
      </div>
      <div class="charts-wrap">
        <h4>Population of Largest U.S. Cities</h4>
        <div class="charts charts2">
          <ul class="items">
            <li class="item-1">
              <strong>Copper</strong>
              <span></span>
              <span></span>
              <span></span>
            </li>
            <li class="item-2">
              <strong>Silver</strong>
              <span></span>
              <span></span>
              <span></span>
            </li>
            <li class="item-3">
              <strong>Gold</strong>
              <span></span>
              <span></span>
              <span></span>
            </li>
            <li class="item-4">
              <strong>Platinum</strong>
              <span></span>
              <span></span>
              <span></span>
            </li>
          </ul>
          <div class="ticks">
            <div class="tick-1"><span></span></div>
            <div class="tick-2"><span></span></div>
            <div class="tick-3"><span></span></div>
            <div class="tick-4"><span></span></div>
            <div class="tick-5"><span></span></div>
            <div class="tick-6"><span></span></div>
            <div class="tick-7"><span></span></div>
            <div class="tick-8"><span></span></div>
            <div class="tick-9"><span></span></div>
            <div class="tick-10"><span></span></div>
            <div class="tick-11"><span></span></div>
            <div class="tick-12"><span></span></div>
            <div class="tick-13"><span></span></div>
          </div>
          <div class="labels">
            <div class="label-1">sales</div>
            <div class="label-2">expenses</div>
            <div class="label-3">profit</div>
          </div>
        </div>
      </div>
      <pre><code class="language-scss">
$data1: (
  #5AB5E1: 8.9 10.5 19.3 21.45,
);
$data2: (
  #E44B22: 8.9 10.5 19.3 21.45,
  #E48A22: 5 10 16 22,
  #22A1E4: 10.7 12 12 18,
);

.charts1 { @include charts($data1 'bar' 'steps' (2 22) animation (0.6s)); }
.charts2 { @include charts($data2 'column' 'steps' (2 24) animation (0.6s)); }
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
  <script>
  ready(function () {
    winLoad(function () {
      var chart = k('.charts1, .charts2');
      chart.addClass('active');
    })
  });
  </script>
</div>
</body>
</html>

