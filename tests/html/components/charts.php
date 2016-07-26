<?php include '../part/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 class="main-heading"><span>components: </span>Charts</h2>
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
    </div>
    
  </div>
  <script>
  ready(function () {
    winLoad(function () {
      var chart = kit('.charts1, .charts2');
      chart.addClass('active');
    })
  });
  </script>
</div>
</body>
</html>