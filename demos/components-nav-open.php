<?php 
  $navP = 'outside';
  $navN = 'open';
  $pagegroup = 'nav';
 ?>
<?php include 'include/head.php'; ?>
<body class="has-bg">

<input type="checkbox" name="" id="nav-toggle">
<?php if ($navP == 'outside') {
  echo '
    <nav class="nav">
      <ul>
        <li><a href="">How It Works</a></li>
        <li><a href="">Compare</a></li>
        <li><a href="">Technology</a></li>
        <li><a href="">Careers</a></li>
        <li><a href="">Help</a></li>
      </ul>
    </nav>
  ';
} ?>
<div class="page">
  <div class="container">
    <div class="topic">
      <h2 id=""><span>components: </span>nav<span>(<?php echo $navN; ?>)</span></h2>
      <?php include 'include/nav-links.php'; ?>
      
      <label for="nav-toggle" class="menu-icon"><span></span></label>
      <label for="nav-toggle" class="page-overlay"></label>
      <?php if ($navP == 'inside') {
        echo '
          <nav class="nav">
            <ul>
              <li><a href="">How It Works</a></li>
              <li><a href="">Compare</a></li>
              <li><a href="">Technology</a></li>
              <li><a href="">Careers</a></li>
              <li><a href="">Help</a></li>
            </ul>
          </nav>
        ';
      } ?>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias assumenda quo, quibusdam voluptatibus porro repudiandae sunt, laudantium deserunt pariatur, aperiam itaque ipsum iusto ratione, dolorem sit. Ea necessitatibus quaerat id!</p>
      <p>Consectetur minus eius aut vero eveniet inventore sunt voluptas, accusantium. Nihil eos inventore modi facilis amet porro magnam, perferendis, quidem accusantium explicabo assumenda rem aliquam. Pariatur, temporibus nihil. Itaque, dignissimos.</p>
      <p>Nihil tempora iste, perspiciatis optio accusantium possimus adipisci harum dolorum soluta alias eaque hic magnam veritatis qui, earum consequuntur voluptatum quis perferendis voluptates facere nam! Placeat animi architecto magnam iste.</p>

      <pre><code class="language-markup">
&lt;input type="checkbox" name="" id="nav-toggle"&gt;
&lt;nav class="nav"&gt;
  &lt;ul&gt;
    &lt;li&gt;&lt;a href=""&gt;How It Works&lt;/a&gt;&lt;/li&gt;
    &lt;li&gt;&lt;a href=""&gt;Compare&lt;/a&gt;&lt;/li&gt;
    &lt;li&gt;&lt;a href=""&gt;Technology&lt;/a&gt;&lt;/li&gt;
    &lt;li&gt;&lt;a href=""&gt;Careers&lt;/a&gt;&lt;/li&gt;
    &lt;li&gt;&lt;a href=""&gt;Help&lt;/a&gt;&lt;/li&gt;
  &lt;/ul&gt;
&lt;/nav&gt;
&lt;div class="page"&gt;
  &lt;header&gt;
    &lt;label for="nav-toggle"&gt;Menu&lt;/label&gt;
    &lt;label for="nav-toggle" class="page-overlay"&gt;&lt;/label&gt;
  &lt;/header&gt;
  &lt;div&gt;Other content&lt;/div&gt;
&lt;/div&gt;
      </code></pre>
      <pre><code class="language-scss">
.page {
  @include nav('open' left '.nav' rgba(black, 0.1) 200px 0.5s);
}
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php"; ?>
</div>
</body>
</html>

