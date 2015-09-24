<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>js: </span>equalizer</h2>
      <div class="equalizer-grid">
        <div class="equalizer-1">
          <div class="box">
            <img src="http://placehold.it/500x300/aaa/aaa" alt="">
            <p>Consectetur adipisicing elit. Saepe assumenda ipsa aperiam numquam facilis quod dolorum id illo temporibus eos! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis architecto quia ipsam nam quo voluptas nostrum illo earum deserunt animi!</p>
          </div>
        </div>
        <div class="equalizer-2">
          <div class="box">
            <ul>
              <li>
                <img src="http://placehold.it/100x70/aaa/aaa" alt="">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
              </li>
              <li>
                <img src="http://placehold.it/100x70/aaa/aaa" alt="">
                <p>Excepturi, repellendus nobis praesentium quos perferendis inventore!</p>
              </li>
              <li>
                <img src="http://placehold.it/100x70/aaa/aaa" alt="">
                <p>Voluptatem quas nulla adipisci ullam cum modi.</p>
              </li>
              <li>
                <img src="http://placehold.it/100x70/aaa/aaa" alt="">
                <p>Fugiat, sit! Necessitatibus aperiam ipsam ratione fugiat.</p>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <pre><code class="language-javascript">
ready(function () {
  winLoad(function () {
    equalizer('.equalizer-1', '.equalizer-2');
  });
  winResize(function () {
    equalizer('.equalizer-1', '.equalizer-2');
  });
});
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
<script>
  ready(function () {
    winLoad(function () {
      equalizer('.equalizer-1', '.equalizer-2');
    });
    winResize(function () {
      equalizer('.equalizer-1', '.equalizer-2');
    });
  });
</script>
</body>
</html>

