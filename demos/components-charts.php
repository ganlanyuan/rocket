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
              <span>8.9</span>
            </li>
            <li class="item-2">
              <strong>Silver</strong>
              <span>10.5</span>
            </li>
            <li class="item-3">
              <strong>Gold</strong>
              <span>19.3</span>
            </li>
            <li class="item-4">
              <strong>Platinum</strong>
              <span>21.45</span>
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
              <span>8.9</span>
              <span>5</span>
              <span>10.7</span>
            </li>
            <li class="item-2">
              <strong>Silver</strong>
              <span>10.5</span>
              <span>10</span>
              <span>12</span>
            </li>
            <li class="item-3">
              <strong>Gold</strong>
              <span>19.3</span>
              <span>16</span>
              <span>12</span>
            </li>
            <li class="item-4">
              <strong>Platinum</strong>
              <span>21.45</span>
              <span>22</span>
              <span>18</span>
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

