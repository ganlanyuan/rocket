<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>components: </span>media list</h2>
      <div class="example-media">
        <ul class="news-left">
          <li>
            <figure class="media"><a href=""><img src="http://placehold.it/120x80" alt=""></a></figure>
            <div class="media-body">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam animi tempore harum dignissimos error maxime, porro, quis dolorum laboriosam recusandae officia repudiandae natus mollitia id amet voluptatibus. Quibusdam, facilis! Hic.</p>
            </div>
          </li>
          <li>
            <figure class="media"><a href=""><img src="http://placehold.it/120x80" alt=""></a></figure>
            <div class="media-body">
              <p>Quibusdam ea voluptate, inventore illum impedit odio quia. Ducimus iusto mollitia deleniti sequi ea perferendis, tempore enim quisquam optio laboriosam modi hic magni nobis consequuntur minus dolorum quibusdam, excepturi. Sed.</p>
              <ul class="news-left">
                <li>
                  <figure class="media"><a href=""><img src="http://placehold.it/120x80" alt=""></a></figure>
                  <div class="media-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis soluta distinctio commodi fugiat beatae, quibusdam. Deserunt officia eius, eos velit aspernatur ea molestiae quisquam quo, iusto animi vitae enim voluptate.</p>
                  </div>
                </li>
              </ul>
            </div>
          </li>
        </ul>
        <ul class="news-right">
          <li>
            <div class="media-body">
              <p>Magnam, modi. Saepe quaerat, nihil debitis. Quae vel delectus, nulla quaerat porro, aperiam ipsam dicta earum beatae hic nobis ex reiciendis provident, quo sit! Dolore impedit non optio numquam veniam.</p>
            </div>
            <figure class="media"><a href=""><img src="http://placehold.it/120x80" alt=""></a></figure>
          </li>
        </ul>
      </div>
      <pre><code class="language-scss">
.news-left > li { 
  @include media(15px child 'figure' 'div'); 
}
.news-right > li { 
  @include media(50px child '.media' '.media-body'); 
}
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php"; ?>
</div>
</body>
</html>

