<?php 
  $navP = 'inside';
  $navN = 'slide-in';
  $pagegroup = 'mobile-nav';
 ?>
<?php include 'include/head.php'; ?>
<body>

<?php if ($navP == 'outside') {
  include 'include/mobile-nav.php';
} ?>
<div class="page page">
  <div class="container">
    <div class="topic">
      <h2 id=""><span>components: </span>Mobile-nav<span></span></h2>
      <?php include 'include/nav-links.php'; ?>

      <?php 
        $navs = array('slide-in', 'rotate-in', 'rotate-out', 'rotate-in-reverse', 'push', 'drawer');
        $dir = left;

        foreach ($navs as $nav) {
          if ($nav === 'push') {
            $dir = top;
          }        

          echo '
      <!-- ' . $nav . ' -->
      <div class="nav-mode mode-' . $nav . ' has-bg">
        <input type="checkbox" name="" id="nav-toggle-' . $nav . '" class="hidden-checkbox">
        <div class="page page-' . $nav . '">
          <header>
            <label for="nav-toggle-' . $nav . '" class="menu-icon"><span></span></label>
            <label for="nav-toggle-' . $nav . '" class="page-overlay"></label>
            <nav class="nav nav-' . $nav . '">
              <ul>
                <li><a href="">How It Works</a></li>
                <li data-has-submenu>
                  <label for="subnav' . $nav . '-1"><img src="images/arrow-right.png" alt=""></label>
                  <a href="">Compare</a>
                  <input type="checkbox" id="subnav' . $nav . '-1" class="hidden-checkbox">
                  <ul data-submenu>
                    <li><label for="subnav' . $nav . '-1" data-back>Back</label></li>
                    <li><a href="">compare mode 1</a></li>
                    <li data-has-submenu>
                      <label for="subnav' . $nav . '-1-1"><img src="images/arrow-right.png" alt=""></label>
                      <a href="">compare mode 2</a>
                      <input type="checkbox" id="subnav' . $nav . '-1-1" class="hidden-checkbox">
                      <ul data-submenu>
                        <li><label for="subnav' . $nav . '-1-1" data-back>Back</label></li>
                        <li><a href="">item 1</a></li>
                        <li><a href="">item 2</a></li>
                        <li><a href="">item 3</a></li>
                      </ul>
                    </li>
                    <li><a href="">compare mode 3</a></li>
                  </ul>
                </li>
                <li><a href="">Technology</a></li>
                <li data-has-submenu>
                  <label for="subnav' . $nav . '-2"><img src="images/arrow-right.png" alt=""></label>
                  <a href="">Careers</a>
                  <input type="checkbox" id="subnav' . $nav . '-2" class="hidden-checkbox">
                  <ul data-submenu>
                    <li><label for="subnav' . $nav . '-2" data-back>Back</label></li>
                    <li><a href="">Accounting Manager</a></li>
                    <li><a href="">Computer Programmer</a></li>
                    <li><a href="">Web Designer</a></li>
                  </ul>
                </li>
                <li><a href="">Help</a></li>
              </ul>
            </nav>
          </header>
          <div class="main">
            <p><strong>' . $nav . '</strong></p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias assumenda quo, quibusdam voluptatibus porro repudiandae sunt, laudantium deserunt pariatur, aperiam itaque ipsum iusto ratione, dolorem sit. Ea necessitatibus quaerat id!</p>
            <p>Consectetur minus eius aut vero eveniet inventore sunt voluptas, accusantium. Nihil eos inventore modi facilis amet porro magnam, perferendis, quidem accusantium explicabo assumenda rem aliquam. Pariatur, temporibus nihil. Itaque, dignissimos.</p>
          </div>
        </div>
      </div>
      <div class="mode-code mode-' . $nav . '">
        <pre><code class="language-scss">
.page {
  @include mobile-nav("' . $nav .'" '. $dir . ' ".nav-'. $nav . '" rgba(0, 0, 0, 0.1) 200px 0.5s);
}
        </code></pre>
      </div>
          ';
        };

        $navs2 = array('slide-along', 'slide-out', 'scale-down', 'scale-up', 'open-door', 'reveal');
        foreach ($navs2 as $nav2) {
          if ($nav === 'reveal') {
            $dir = right;
          }        

          echo '
      <!-- ' . $nav2 . ' -->
      <div class="nav-mode mode-' . $nav2 . ' has-bg">
        <input type="checkbox" name="" id="nav-toggle-' . $nav2 . '" class="hidden-checkbox">
        <nav class="nav nav-' . $nav2 . '">
          <ul>
            <li><a href="">How It Works</a></li>
            <li data-has-submenu>
              <label for="subnav' . $nav2 . '-1"><img src="images/arrow-right.png" alt=""></label>
              <a href="">Compare</a>
              <input type="checkbox" id="subnav' . $nav2 . '-1" class="hidden-checkbox">
              <ul data-submenu>
                <li><label for="subnav' . $nav2 . '-1" data-back>Back</label></li>
                <li><a href="">compare mode 1</a></li>
                <li data-has-submenu>
                  <label for="subnav' . $nav2 . '-1-1"><img src="images/arrow-right.png" alt=""></label>
                  <a href="">compare mode 2</a>
                  <input type="checkbox" id="subnav' . $nav2 . '-1-1" class="hidden-checkbox">
                  <ul data-submenu>
                    <li><label for="subnav' . $nav2 . '-1-1" data-back>Back</label></li>
                    <li><a href="">item 1</a></li>
                    <li><a href="">item 2</a></li>
                    <li><a href="">item 3</a></li>
                  </ul>
                </li>
                <li><a href="">compare mode 3</a></li>
              </ul>
            </li>
            <li><a href="">Technology</a></li>
            <li data-has-submenu>
              <label for="subnav' . $nav2 . '-2"><img src="images/arrow-right.png" alt=""></label>
              <a href="">Careers</a>
              <input type="checkbox" id="subnav' . $nav2 . '-2" class="hidden-checkbox">
              <ul data-submenu>
                <li><label for="subnav' . $nav2 . '-2" data-back>Back</label></li>
                <li><a href="">Accounting Manager</a></li>
                <li><a href="">Computer Programmer</a></li>
                <li><a href="">Web Designer</a></li>
              </ul>
            </li>
            <li><a href="">Help</a></li>
          </ul>
        </nav>
        <div class="page page-' . $nav2 . '">
          <header>
            <label for="nav-toggle-' . $nav2 . '" class="menu-icon"><span></span></label>
            <label for="nav-toggle-' . $nav2 . '" class="page-overlay"></label>
          </header>
          <div class="main">
            <p><strong>' . $nav2 . '</strong></p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias assumenda quo, quibusdam voluptatibus porro repudiandae sunt, laudantium deserunt pariatur, aperiam itaque ipsum iusto ratione, dolorem sit. Ea necessitatibus quaerat id!</p>
            <p>Consectetur minus eius aut vero eveniet inventore sunt voluptas, accusantium. Nihil eos inventore modi facilis amet porro magnam, perferendis, quidem accusantium explicabo assumenda rem aliquam. Pariatur, temporibus nihil. Itaque, dignissimos.</p>
          </div>
        </div>
      </div>
      <div class="mode-code mode-' . $nav2 . '">
        <pre><code class="language-scss">
.page {
  @include mobile-nav("' . $nav2 . '" ' . $dir . ' ".nav-'. $nav2 . '" rgba(0, 0, 0, 0.1) 200px 0.5s);
}
        </code></pre>
      </div>
          ';
        };
      ?>
      
    </div>
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php"; ?>
</div>
</body>
</html>

