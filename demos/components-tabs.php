<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>components: </span>Tabs</h2>
      <div class="example">
        <div class="tabs">
          <input type="radio" name="tabs" id="tab-1" checked="">
          <input type="radio" name="tabs" id="tab-2">
          <input type="radio" name="tabs" id="tab-3">
          <div class="ro-tabs">
            <label for="tab-1">tab 1</label>
            <label for="tab-2">tab 2</label>
            <label for="tab-3">tab 3</label>
          </div>
          <div class="ro-panels">
            <div>
              <h4>Lorem ipsum dolor sit amet, consectetur adipisicing.</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore vitae ut dolore itaque ducimus facilis aliquid est minima consequuntur quisquam!</p>
              <p>Est, dicta vitae earum distinctio? Iure harum facilis, at. Nisi rerum, ratione a libero voluptatibus odio incidunt! Tempora, maxime, quo.</p>
            </div>
            <div>
              <h4>Voluptatem laborum facilis architecto, amet aperiam ipsum?</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde sunt perspiciatis maxime, vero odit et velit recusandae accusantium neque atque.</p>
              <p>Voluptate qui quas, natus, fugit saepe dignissimos inventore, ipsa quam illo sunt animi, dicta fuga voluptatum assumenda perspiciatis veniam tenetur?</p>
            </div>
            <div>
              <h4>Odio harum nostrum vero minima, provident quo!</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci nisi est, maxime magnam perspiciatis? Eveniet blanditiis ut porro accusantium itaque.</p>
              <p>Minima incidunt quod quaerat alias, mollitia exercitationem reiciendis dolores. Nihil facilis praesentium doloribus deserunt delectus magni quam quae ab? Quos.</p>
            </div>
          </div>
        </div>              
      </div>
      <pre><code class="language-scss">
.dropdown-2 { @include dropdown(default click); }
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php"; ?>
</div>
</body>
</html>

