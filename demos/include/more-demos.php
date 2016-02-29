<div class="more-demos">
  <h2>More demos</h2>
  <h4>layout</h4>
  <nav class="demo-links">
    <?php 
      $layouts = array('container', 'grid', 'liquid-2', 'liquid-3', 'gallery', 'masonry', 'metro', 'diamond', 'angled-edges', 'sticky-footer', 'justify', 'center');
      $cur = '';

      foreach ($layouts as $layout) {
        if ($pagename == 'layout-' . $layout) {
          $cur = ' class="current" ';
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
      $components = array('charts', 'responsive-table', 'off-canvas', 'slider-carousel', 'slider-gallery', 'validation', 'button', 'parallelogram', 'drop-shadows', 'switch', 'push-toggle', 'checkbox', 'input-file', 'tabs', 'accordion', 'dropdown', 'tooltip', 'media-list', 'flex-media', ); 
      $cur = '';

      foreach ($components as $component) {
        if ($pagename == 'components-' . $component) {
          $cur = ' class="current" ';
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
      $addons = array('hide-text' , 'type', 'responsive-type', 'visibility', 'breakpoint', 'quantity-query', 'color-functions'); 
      $cur = '';

      foreach ($addons as $addon) {
        if ($pagename == 'addons-' . $addon) {
          $cur = ' class="current" ';
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
          $cur = ' class="current" ';
        } else {
          $cur = '';
        }
        
        echo '<a href="js-' . $addon . '.php"' . $cur . '>' . $addon . '</a>';
      }
    ?>
  </nav>
</div>
