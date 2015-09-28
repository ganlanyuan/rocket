<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 class="main-heading"><span>components: </span>Tabs</h2>
      <h4>normal</h4>
      <div class="example">
        <div class="tabs tabs-normal">
          <input type="radio" name="tabs-normal" id="tab-normal-1" checked="">
          <input type="radio" name="tabs-normal" id="tab-normal-2">
          <input type="radio" name="tabs-normal" id="tab-normal-3">
          <div class="ro-tabs">
            <label for="tab-normal-1">tab 1</label>
            <label for="tab-normal-2">tab 2</label>
            <label for="tab-normal-3">tab 3</label>
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
.tabs-normal {
  @include tabs(3 normal);
  @include tabs-active(3) {
    border: 1px solid #FF0000;
  }
}
      </code></pre>
      <h4>carousel</h4>
      <div class="example">
        <div class="tabs tabs-carousel">
          <input type="radio" name="tabs-carousel" id="tab-carousel-1" checked="">
          <input type="radio" name="tabs-carousel" id="tab-carousel-2">
          <input type="radio" name="tabs-carousel" id="tab-carousel-3">
          <div class="ro-tabs">
            <label for="tab-carousel-1">tab 1</label>
            <label for="tab-carousel-2">tab 2</label>
            <label for="tab-carousel-3">tab 3</label>
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
.tabs-carousel {
  @include tabs(3 carousel);
  @include tabs-active(3) {
    border: 1px solid #FF0000;
  }
}
      </code></pre>
      <h4>customize</h4>
      <div class="example">
        <div class="tabs tabs-customize">
          <input type="radio" name="tabs-customize" id="tab-customize-1" checked="">
          <input type="radio" name="tabs-customize" id="tab-customize-2">
          <input type="radio" name="tabs-customize" id="tab-customize-3">
          <div class="ro-tabs">
            <label for="tab-customize-1">tab 1</label>
            <label for="tab-customize-2">tab 2</label>
            <label for="tab-customize-3">tab 3</label>
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
.tabs-customize {
  @include tabs(3 customize) {
    height: 0;
    padding: 0;
    overflow: hidden;
    -ms-transform-origin: center;
    -webkit-transform-origin: center;
    transform-origin: center;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    -webkit-transition: transform 0.4s ease 0s;
    transition: transform 0.4s ease 0s; 
    &:nth-child(odd) {
      -ms-transform: perspective(1000px) rotateY(180deg);
      -webkit-transform: perspective(1000px) rotateY(180deg);
      transform: perspective(1000px) rotateY(180deg);
    }
    &:nth-child(even) {
      -ms-transform: perspective(1000px) rotateY(-180deg);
      -webkit-transform: perspective(1000px) rotateY(-180deg);
      transform: perspective(1000px) rotateY(-180deg);
    }
    .no-csstransforms & { display: none; height: auto; padding: 8px 12px; }
  }
  @include tabs-active(3) {
    border: 1px solid #FF0000;
  }
  @include tabs-panel-active(3) {
    height: auto;
    padding: 8px 12px;
    -ms-transform: perspective(1000px) rotateY(0deg);
    -webkit-transform: perspective(1000px) rotateY(0deg);
    transform: perspective(1000px) rotateY(0deg);
    .no-csstransforms & { display: block; }
  }
}
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php"; ?>
</div>
</body>
</html>

