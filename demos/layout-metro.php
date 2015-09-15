<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>layout: </span>Metro</h2>
      <div class="ovh metro-wrapper">
        <ul class="outline" data-margin>
          <li>
            <div class="metro-item">
              <ul class="g-1">
                <li>
                  <div class="metro-item" data-content="">1-1</div>
                </li>
                <li>
                  <div class="metro-item" data-content="">1-2</div>
                </li>
                <li>
                  <div class="metro-item" data-content="">1-3</div>
                </li>
                <li>
                  <div class="metro-item" data-content="">1-4</div>
                </li>
                <li>
                  <div class="metro-item" data-content="">1-5</div>
                </li>
              </ul>
            </div>
          </li>
          <li>
            <div class="metro-item">
              <ul class="g-2">
                <li>
                  <div class="metro-item" data-content="">2-1</div>
                </li>
                <li>
                  <div class="metro-item" data-content="">2-2</div>
                </li>
              </ul>
            </div>
          </li>
          <li>
            <div class="metro-item">
              <ul class="g-3">
                <li>
                  <div class="metro-item" data-content="">3-1</div>
                </li>
                <li>
                  <div class="metro-item" data-content="">3-2</div>
                </li>
                <li>
                  <div class="metro-item" data-content="">3-3</div>
                </li>
                <li>
                  <div class="metro-item" data-content="">3-4</div>
                </li>
                <li>
                  <div class="metro-item" data-content="">3-5</div>
                </li>
              </ul>
            </div>
          </li>
          <li>
            <div class="metro-item">
              <ul class="g-4">
                <li>
                  <div class="metro-item" data-content="">4-1</div>
                </li>
                <li>
                  <div class="metro-item" data-content="">4-2</div>
                </li>
              </ul>
            </div>
          </li>
          <li>
            <div class="metro-item" data-content>5</div>
          </li>
          <li>
            <div class="metro-item" data-content>6</div>
          </li>
        </ul>
      </div>
      <pre><code class="language-scss">
$ro-metro: (
  'gutter': 20px,
  'ratio': (3 / 4),
  'child': 'li',
);

$outline: (
  null: w2h3 w2 w2h4 w2 1 h2 of 2,
  700: w3h2 w3 w2h3 h3 1 w2 of 3,
  1000: w2h3 w2h3 w3h3 h3 1 w3 of 4,
);
$g-1: (
  null: h2 1 1 w2 of 2,
  700: w2h2 1 1 of 3,
  1000: 1 1 h2 1 1 of 2,
);
$g-2: (
  null: 1 1 of 2,
  700: 1 w2 of 3,
  1000: w2h2 w2 of 2,
);
$g-3: (
  null: w2h2 h2 1 1 of 2,
  700: h2 1 1 1 1 of 2,
  1000: w2h2 1 1 1 w2 of 3,
);
$g-4: (
  null: w2 of 2,
  700: 1 h2 of 1,
  1000: 1 h2 of 1,
);

.outline { @include metro($outline); }
.g-1 { @include metro($g-1); }
.g-2 { @include metro($g-2); }
.g-3 { @include metro($g-3); }
.g-4 { @include metro($g-4); }
@media (min-width: 1000px) {
  .g-3 > li:nth-child(4) { clear: left; }
}
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
</body>
</html>

