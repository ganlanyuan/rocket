<div class="more-demos">
  <h2>More demos</h2>
  <h4>layout</h4>
  <nav class="demo-links">
    <?php 
      $layouts = array('grid', 'gallery', 'liquid-2', 'liquid-3', 'center', 'justify');
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
      $components = array('button', 'media-list', 'off-canvas', 'dropdown', 'tabs', 'switch', 'accordion', 'push-toggle', 'checkbox', 'tooltip', 'flex-video', 'validation', 'slider-carousel', 'slider-gallery'); 
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
</div>
