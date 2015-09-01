<?php 
  $navs = array('slide-in', 'slide-along', 'slide-out', 'rotate-in', 'rotate-out', 'rotate-in-reverse', 'scale-down', 'scale-up', 'open-door', 'push', 'reveal', 'drawer');
  $className = '';
  foreach ($navs as $nav) {
    $checked = '';

    if ($nav === 'slide-in') {
      $checked = 'checked'; 
    } else {
      $checked = '';
    }
    
    echo '<input type="radio" name="modes" id="' . $nav . '" class="hidden-checkbox" ' . $checked . '>';
  };

  foreach ($navs as $nav) {
    echo '<label for="' . $nav . '" class="btn">' . $nav . '</label>';
  };
?>