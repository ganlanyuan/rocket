<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 class="main-heading"><span>components: </span>angled-edges</h2>
      <div class="example">
        <div class="example-angled-edges">
          <div class="bottom">
            <h1>Nobis cupiditate, autem quo voluptatum saepe accusantium!</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, accusantium, hic. Mollitia perferendis quibusdam, fuga dolores, ullam vel dolor architecto sapiente eos, laborum commodi? Enim porro blanditiis alias ab, perspiciatis illum dolor. Architecto eum dolorem laboriosam cum autem laudantium labore!</p>
          </div>
          <div class="both">
            <h1>Nobis cupiditate, autem quo voluptatum saepe accusantium!</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, accusantium, hic. Mollitia perferendis quibusdam, fuga dolores, ullam vel dolor architecto sapiente eos, laborum commodi? Enim porro blanditiis alias ab, perspiciatis illum dolor. Architecto eum dolorem laboriosam cum autem laudantium labore!</p>
          </div>
          <div class="top">
            <h1>Nobis cupiditate, autem quo voluptatum saepe accusantium!</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, accusantium, hic. Mollitia perferendis quibusdam, fuga dolores, ullam vel dolor architecto sapiente eos, laborum commodi? Enim porro blanditiis alias ab, perspiciatis illum dolor. Architecto eum dolorem laboriosam cum autem laudantium labore!</p>
          </div>
        </div>
      </div>
      <pre><code class="language-scss">
.bottom {
  @include angled-edges(bottom 5deg);
}
.both {
  @include angled-edges(both 5deg flip);
}
.top {
  @include angled-edges(top -5deg);
}
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php"; ?>
</div>
</body>
</html>

