<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 class="main-heading"><span>components: </span>angled-edges</h2>
      <div class="example">
        <div class="example-angled-edges">
          <div class="bottom">
            <h1>Edge: bottom</h1>
            <p>Ducimus laboriosam sapiente, sed! Aut alias ipsam excepturi delectus, repellendus laborum deleniti. Modi magni, veniam aliquid, aspernatur quibusdam saepe est, inventore in, ullam eius voluptates quam dolorum ducimus porro dolores?</p>
            <p>Laboriosam quis nostrum rem vitae nisi sunt aut debitis quia totam minus consequatur maiores, alias omnis ad. Placeat magni quos repellat, cum eligendi atque aspernatur, doloremque dignissimos laboriosam impedit blanditiis.</p>
          </div>
          <div class="sibling sibling-1">
            <h1>Sibling: 1</h1>
            <p>Minima quod eius, delectus ipsa aliquid molestias. Unde necessitatibus tenetur reiciendis ipsa autem distinctio sunt libero vitae quidem numquam commodi harum nisi officia quod, ea quibusdam laboriosam accusamus praesentium aspernatur?</p>
          </div>
          <div class="both">
            <h1>Edge: both</h1>
            <p>Magnam libero doloribus eaque laboriosam provident delectus nisi neque repellat fugiat impedit molestias, aut quos numquam amet, vitae tempore, pariatur possimus quam sapiente rerum ut. Corporis laudantium minus nesciunt dicta!</p>
            <p>Doloribus incidunt unde, consequatur, similique aut cumque. Et libero, aut. Sit est ullam nulla saepe. Nam, quo perspiciatis placeat cum voluptatem eum excepturi itaque dolorem porro est. Et, voluptate, eius.</p>
            <p>Commodi sapiente ducimus provident ullam, qui accusantium earum ex unde, voluptates inventore nihil velit quod accusamus? Libero dolor qui ullam nisi, ex, tempore sapiente fugit. Repudiandae sint aliquam expedita similique!</p>
          </div>
          <div class="sibling sibling-2">
            <h1>Sibling: 2</h1>
            <p>Incidunt ipsum suscipit, culpa autem saepe veniam similique assumenda facere eligendi consectetur, quibusdam ducimus optio inventore unde ullam! Soluta laudantium eum inventore doloremque assumenda sunt modi aperiam, error, debitis odio.</p>
          </div>
          <div class="top">
            <h1>Edge: top</h1>
            <p>Quam aliquid, dolorum facilis tempora est soluta perspiciatis mollitia illum distinctio, assumenda, nam praesentium tenetur dolores in nihil sapiente labore maxime voluptates libero. Ex culpa vitae, asperiores quasi. Veniam, eveniet.</p>
            <p>Odit minima expedita voluptatum harum iste natus error libero corporis modi dolor! Architecto repellat consectetur possimus, esse distinctio laboriosam magni vero error fugiat dicta, reprehenderit odit, enim at delectus doloribus.</p>
          </div>
        </div>
      </div>
      <pre><code class="language-scss">
$bg1: #339FEC;
$bg2: #FF4468;
.bottom { @include angled-edges(bottom 5deg $bg1); }
.both { @include angled-edges(both 5deg flip $bg1 $bg2); }
.top { @include angled-edges(top -5deg $bg2); }
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php"; ?>
</div>
</body>
</html>

