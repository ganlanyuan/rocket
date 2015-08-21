<div class="more-demos">
  <h2>More demos</h2>
  <h4>layout</h4>
  <nav class="demo-links">
    <?php 
      $layouts = array('grid', 'gallery', 'justify', 'center', 'two-columns');
      $cur = '';

      foreach ($layouts as $layout) {
        if ($pagename == 'layout-' . $layout) {
          $cur = 'class="current"';
        } else {
          $cur = '';
        }

        echo '<a href="layout-' . $layout . '.php"' . $cur . '>' . $layout . '</a>';
      }
    ?>
  </nav>
  <h4>components</h4>
  <nav class="demo-links">
    <?php 
      $components = array('button', 'media-list', 'offcanvas', 'mobile-nav-slide-in', 'dropdown', 'tabs', 'switch', 'accordion', 'push-toggle', 'checkbox', 'tooltip', 'flex-video', 'slider-carousel', 'slider-gallery'); 
      $cur = '';

      foreach ($components as $component) {
        if ($pagename == 'components-' . $component) {
          $cur = 'class="current"';
        } else {
          $cur = '';
        }
        
        echo '<a href="components-' . $component . '.php"' . $cur . '>' . $component . '</a>';
      }
    ?>
  </nav>
  <h4>addons</h4>
  <nav class="demo-links">
    <?php 
      $addons = array('type', 'font-size', 'visibility', 'breakpoint'); 
      $cur = '';

      foreach ($addons as $addon) {
        if ($pagename == 'addons-' . $addon) {
          $cur = 'class="current"';
        } else {
          $cur = '';
        }
        
        echo '<a href="addons-' . $addon . '.php"' . $cur . '>' . $addon . '</a>';
      }
    ?>
  </nav>
  <h4>color functions</h4>
  <nav class="demo-links">
      <?php 
      $colors = array('contrast', 'adjacent', 'complementary', 'split-complementary', 'triad', 'rectangle', 'square'); 
      $cur = '';

      foreach ($colors as $color) {
        if ($pagename == 'color-' . $color) {
          $cur = 'class="current"';
        } else {
          $cur = '';
        }
        
        echo '<a href="color-' . $color . '.php"' . $cur . '>' . $color . '</a>';
      }
    ?>
  </nav>
</div>
