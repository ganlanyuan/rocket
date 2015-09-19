<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>components: </span>Priority-nav</h2>
      <div class="example">
        <nav class="nav">
         <ul>
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
.nav {
  @include priority-nav();

  // your css
  background-color: #2D79F1;
  color: #fff;
  font-size: 14px;
  font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
  button {
    padding: 10px;
    border-width: 0;
    color: #fff;
    font-size: 11px;
    text-transform: uppercase;
    background-color: #333;
    position: relative;
    overflow: visible;
    &:before {
      content: attr(data-count);
      width: 23px;
      height: 23px;
      line-height: 23px;
      border-radius: 50%;
      font-size: 14px;
      text-align: center;
      position: absolute;
      left: 0;
      top: 50%;
      margin-left: -11px;
      margin-top: -11px;
      color: #412F08;
      background-color: #FFB822;
    }
  }
  li {
    padding: 10px 13px;
  }
  .links {
    > li {
      border-right: 1px solid #2563C5;
      &:last-child { border-right-width: 0; }
    }
  }
  .hidden-links {
    background-color: #333;
  }
}
      </code></pre>
      <pre><code class="language-javascript">
ready(function () {
  priorityNav('.nav', 'more');
});
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php"; ?>
</div>
<script>
  ready(function () {
    priorityNav('.nav', 'more');
  });
</script>
</body>
</html>

