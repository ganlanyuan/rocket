<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 class="main-heading"><span>components: </span>Priority-nav</h2>
      <div class="example">
        <nav class="nav">
         <ul class="links">
           <li>Entertainment</li>
           <li>Sports</li>
           <li>Business</li>
           <li>Technology</li>
           <li>Nation</li>
           <li>Politics</li>
           <li>World</li>
           <li>Opinion</li>
           <li>Obituaries</li>
           <li>Travel</li>
           <li>Life & Style</li>
           <li>Science</li>
         </ul>
        </nav>
      </div>
      <pre><code class="language-scss">
.nav { @include priority-nav(); }
      </code></pre>
      <pre><code class="language-javascript">
ready(function () {
  priorityNav('.nav', 'more', 600);
});
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php"; ?>
</div>
<script>
  ready(function () {
    priorityNav('.nav', 'more', false, 600);
  });
</script>
</body>
</html>

