<?php 
  $navP = 'inside';
  $navN = 'slide-in';
  $pagegroup = 'off-canvas';
 ?>
<?php include 'include/head.php'; ?>
<body>

<?php if ($navP == 'outside') {
  include 'include/off-canvas.php';
} ?>
<div class="page page">
  <div class="container">
    <div class="topic">
      <h2 class="main-heading"><span>components: </span>off-canvas<span></span></h2>
      <?php include 'include/nav-links.php'; ?>

      <?php 
        $navs = array('slide-in', 'rotate-in', 'rotate-out', 'rotate-in-reverse', 'push', 'drawer');
        $dir = left;
        $map = '';
        $bp = '';
        $vmap = '';
        $vbp = '';

        foreach ($navs as $nav) {
          if ($nav == 'push') {
            $dir = top;
          } elseif ($nav == 'drawer') {
            $dir = left;
            $map = '
$map: (
  500px: 20px, 
  small: 30px, 
  medium: 40px, 
  null: 50px
);
';
            $bp = '
$bp: (
  small: 600px, 
  medium: 1000px
);';
            $vmap = '$map';
            $vbp = '$bp';
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
                  <input type="checkbox" id="subnav' . $nav . '-1" class="hidden-checkbox">
                  <label for="subnav' . $nav . '-1"><img src="images/arrow-r-w.png" alt=""></label>
                  <a href="">Compare</a>
                  <ul data-submenu>
                    <li><label for="subnav' . $nav . '-1" data-back>Back</label></li>
                    <li><a href="">compare mode 1</a></li>
                    <li><a href="">L.A. Now</a></li>
                    <li><a href="">California</a></li>
                    <li><a href="">El Niño</a></li>
                    <li><a href="">Politics</a></li>
                    <li><a href="">Education</a></li>
                    <li><a href="">Crime</a></li>
                    <li><a href="">Homicide Report</a></li>
                    <li><a href="">Times Community News</a></li>
                    <li><a href="">Arts & Culture</a></li>
                    <li><a href="">Company Town</a></li>
                    <li><a href="">Gossip</a></li>
                    <li><a href="">Hero Complex</a></li>
                    <li><a href="">Movies</a></li>
                    <li><a href="">Music</a></li>
                    <li><a href="">Television</a></li>
                    <li><a href="">The Envelope</a></li>
                    <li data-has-submenu>
                      <input type="checkbox" id="subnav' . $nav . '-1-1" class="hidden-checkbox">
                      <label for="subnav' . $nav . '-1-1"><img src="images/arrow-r-w.png" alt=""></label>
                      <a href="">compare mode 2</a>
                      <ul data-submenu>
                        <li><label for="subnav' . $nav . '-1-1" data-back>Back</label></li>
                        <li><a href="">item 1</a></li>
                        <li><a href="">item 2</a></li>
                        <li><a href="">item 3</a></li>
                        <li><a href="">Local</a></li>
                      </ul>
                    </li>
                    <li><a href="">compare mode 3</a></li>
                  </ul>
                </li>
                <li><a href="">Technology</a></li>
                <li data-has-submenu>
                  <input type="checkbox" id="subnav' . $nav . '-2" class="hidden-checkbox">
                  <label for="subnav' . $nav . '-2"><img src="images/arrow-r-w.png" alt=""></label>
                  <a href="">Careers</a>
                  <ul data-submenu>
                    <li><label for="subnav' . $nav . '-2" data-back>Back</label></li>
                    <li><a href="">Accounting Manager</a></li>
                    <li><a href="">Computer Programmer</a></li>
                    <li><a href="">Web Designer</a></li>
                  </ul>
                </li>
                <li><a href="">Help</a></li>
                <!--
                <li><a href="">E-Newspaper</a></li>
                <li><a href="">My Account</a></li>
                <li><a href="">California</a></li>
                <li><a href="">Entertainment</a></li>
                <li><a href="">Sports</a></li>
                <li><a href="">Business</a></li>
                <li><a href="">Technology</a></li>
                <li><a href="">Nation</a></li>
                <li><a href="">Politics</a></li>
                <li><a href="">World</a></li>
                <li><a href="">Opinion</a></li>
                <li><a href="">Obituaries</a></li>
                <li><a href="">Travel</a></li>
                <li><a href="">Life & Style</a></li>
                <li><a href="">Food</a></li>
                <li><a href="">Science</a></li>
                <li><a href="">Autos</a></li>
                <li><a href="">Real Estate</a></li>
                <li><a href="">Photos & Video</a></li>
                <li><a href="">CLASSIFIEDS</a></li>
                <li><a href="">FIND A JOB</a></li>
                <li><a href="">SHOP</a></li>
                <li><a href="">ADVERTISING</a></li>
                <li><a href="">CORRECTIONS</a></li>
                <li><a href="">PRIVACY:Update</a></li>
                <li><a href="">Terms:Update</a></li>
                <li><a href="">SITE MAP</a></li>
                <li><a href="">ABOUT US</a></li>
                <li><a href="">CONTACT US</a></li>
                -->
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
        <pre><code class="language-scss"> '. $bp .''. $map .'
.page { @include off-canvas("' . $nav .'" ".nav-'. $nav . '" '. $dir . ' ' . $vmap . ' ' . $vbp . ' rgba(0, 0, 0, 0.1) 200px 0.5s); }
        </code></pre>
      </div>
          ';
        };

        $navs2 = array('slide-along', 'slide-out', 'scale-down', 'scale-up', 'open-door', 'reveal');
        foreach ($navs2 as $nav2) {
          if ($nav2 === 'reveal') {
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
              <input type="checkbox" id="subnav' . $nav2 . '-1" class="hidden-checkbox">
              <label for="subnav' . $nav2 . '-1"><img src="images/arrow-r-w.png" alt=""></label>
              <a href="">Compare</a>
              <ul data-submenu>
                <li><label for="subnav' . $nav2 . '-1" data-back>Back</label></li>
                <li><a href="">compare mode 1</a></li>
                <li data-has-submenu>
                  <input type="checkbox" id="subnav' . $nav2 . '-1-1" class="hidden-checkbox">
                  <label for="subnav' . $nav2 . '-1-1"><img src="images/arrow-r-w.png" alt=""></label>
                  <a href="">compare mode 2</a>
                  <ul data-submenu>
                    <li><label for="subnav' . $nav2 . '-1-1" data-back>Back</label></li>
                    <li><a href="">item 1</a></li>
                    <li><a href="">item 2</a></li>
                    <li><a href="">item 3</a></li>
                    <li><a href="">Local</a></li>
                    <li><a href="">L.A. Now</a></li>
                    <li><a href="">California</a></li>
                    <li><a href="">El Niño</a></li>
                    <li><a href="">Politics</a></li>
                    <li><a href="">Education</a></li>
                    <li><a href="">Crime</a></li>
                    <li><a href="">Homicide Report</a></li>
                    <li><a href="">Times Community News</a></li>
                    <li><a href="">Arts & Culture</a></li>
                    <li><a href="">Company Town</a></li>
                    <li><a href="">Gossip</a></li>
                    <li><a href="">Hero Complex</a></li>
                    <li><a href="">Movies</a></li>
                    <li><a href="">Music</a></li>
                    <li><a href="">Television</a></li>
                    <li><a href="">The Envelope</a></li>
                  </ul>
                </li>
                <li><a href="">compare mode 3</a></li>
              </ul>
            </li>
            <li><a href="">Technology</a></li>
            <li data-has-submenu>
              <input type="checkbox" id="subnav' . $nav2 . '-2" class="hidden-checkbox">
              <label for="subnav' . $nav2 . '-2"><img src="images/arrow-r-w.png" alt=""></label>
              <a href="">Careers</a>
              <ul data-submenu>
                <li><label for="subnav' . $nav2 . '-2" data-back>Back</label></li>
                <li><a href="">Accounting Manager</a></li>
                <li><a href="">Computer Programmer</a></li>
                <li><a href="">Web Designer</a></li>
              </ul>
            </li>
            <li><a href="">Help</a></li>
            <li><a href="">E-Newspaper</a></li>
            <li><a href="">My Account</a></li>
            <li><a href="">California</a></li>
            <li><a href="">Entertainment</a></li>
            <li><a href="">Sports</a></li>
            <li><a href="">Business</a></li>
            <li><a href="">Technology</a></li>
            <li><a href="">Nation</a></li>
            <li><a href="">Politics</a></li>
            <li><a href="">World</a></li>
            <li><a href="">Opinion</a></li>
            <li><a href="">Obituaries</a></li>
            <li><a href="">Travel</a></li>
            <li><a href="">Life & Style</a></li>
            <li><a href="">Food</a></li>
            <li><a href="">Science</a></li>
            <li><a href="">Autos</a></li>
            <li><a href="">Real Estate</a></li>
            <li><a href="">Photos & Video</a></li>
            <li><a href="">CLASSIFIEDS</a></li>
            <li><a href="">FIND A JOB</a></li>
            <li><a href="">SHOP</a></li>
            <li><a href="">ADVERTISING</a></li>
            <li><a href="">CORRECTIONS</a></li>
            <li><a href="">PRIVACY:Update</a></li>
            <li><a href="">Terms:Update</a></li>
            <li><a href="">SITE MAP</a></li>
            <li><a href="">ABOUT US</a></li>
            <li><a href="">CONTACT US</a></li>
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
.page { @include off-canvas("' . $nav2 . '" ".nav-'. $nav2 . '" ' . $dir . ' rgba(0, 0, 0, 0.1) 200px 0.5s); }
        </code></pre>
      </div>
          ';
        };
      ?>
      
    </div>
  </div>
</div>
</body>
</html>