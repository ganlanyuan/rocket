<div class="nav-links">
  <?php 
    $navs = array('slide-in', 'slide-along', 'slide-out', 'rotate-in', 'rotate-out', 'rotate-in-reverse', 'scale-down', 'scale-up', 'open-door', 'push', 'reveal', 'drawer');
    $className = '';
    foreach ($navs as $nav) {
      if ($pagename == 'components-mobile-nav-' . $nav) {
        $className = ' active';
      } else {
        $className = '';
      }
      
      echo '<a href="components-mobile-nav-' . $nav . '.php" class="btn' . $className . '">' . $nav . '</a>';
    }
  ?>
</div>