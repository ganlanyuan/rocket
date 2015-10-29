<div class="more-demos">
  <h2>More demos</h2>
  <h4>layout</h4>
  <nav class="demo-links">
    <?php 
      $layouts = array('container', 'grid', 'gallery', 'metro', 'liquid-2', 'liquid-3', 'center', 'justify', 'sticky-footer');
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
      $components = array('charts', 'off-canvas', 'slider-carousel', 'slider-gallery', 'validation', 'button', 'switch', 'push-toggle', 'checkbox', 'tabs', 'accordion', 'dropdown', 'tooltip', 'media-list', 'flex-media', ); 
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
      $addons = array('type', 'responsive-type', 'visibility', 'breakpoint', 'color-functions'); 
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
  <h4>javascript</h4>
  <nav class="demo-links">
    <?php 
      $addons = array('sticky', 'priority-nav', 'equalizer', 'reach', 'scrollTo'); 
      $cur = '';

      foreach ($addons as $addon) {
        if ($pagename == 'js-' . $addon) {
          $cur = 'class="current"';
        } else {
          $cur = '';
        }
        
        echo '<a href="js-' . $addon . '.php"' . $cur . '>' . $addon . '</a>';
      }
    ?>
  </nav>
</div>
