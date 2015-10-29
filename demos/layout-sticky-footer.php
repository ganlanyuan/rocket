<?php include 'include/head.php'; ?>
<body>
<div class="page">

  <div class="topic">
    <h2 class="main-heading"><span>layout: </span>sticky-footer</h2>
    <div class="example" data-margin>
      <div class="container container-inner">
        <div class="body" data-content>
          <header>Header</header>
          <div class="main">
            Main <br>
            <input type="checkbox" name="" id="content-toggle" checked=""> 
            <label for="content-toggle">toggle content</label>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est, adipisci tempore vitae harum delectus incidunt id ex earum soluta nobis a suscipit architecto dolore, officiis autem ratione quas dicta consequuntur voluptas? Vitae nihil, repudiandae suscipit, dignissimos libero iure incidunt, nemo adipisci quia a ipsum nobis perspiciatis eius, minima ut quam!</p>
            <p>Accusamus quos quia, ullam assumenda ratione nostrum ab dolor quam voluptatem ipsa porro aut, deleniti, dolores labore aspernatur voluptatum magni excepturi eos minus. Quam nam odio voluptatum deleniti eos quis quas praesentium aliquam accusamus, aspernatur aperiam commodi repellendus maxime maiores voluptas id similique blanditiis sed. Dolore dignissimos optio fugiat laborum.</p>
            <p>Ipsa nostrum quos nobis provident eligendi et laborum, eveniet possimus a, porro sit quo ratione, quam. Dolorem totam soluta dignissimos, quibusdam non iure quia adipisci ad earum neque, natus molestias inventore pariatur porro sed quae eaque modi eum sapiente? Vero necessitatibus hic in vel voluptates autem ad ipsa excepturi facere.</p>
            <p>Exercitationem perferendis sapiente consequatur ipsa incidunt cupiditate eos ea voluptas porro quasi, dolores, magni in aspernatur suscipit temporibus explicabo, libero, earum atque rem! Ad accusamus iure et iusto fuga quam cumque cum dolor sapiente perferendis neque deleniti, veniam eos qui similique amet minima hic nam. Consequatur optio doloremque perspiciatis. Deserunt.</p>
            <p>Perferendis dolores quaerat officiis officia suscipit, dignissimos tempore reiciendis optio a beatae fugit consequatur unde quam nisi est veniam earum, aut at labore asperiores iusto molestias mollitia tenetur. Earum asperiores nemo aut, labore ut totam atque aspernatur at! Tempore, vel omnis voluptate totam soluta doloremque minima cupiditate corporis est illo.</p>
            <p>Sapiente consequatur eaque quibusdam neque perspiciatis dolorum officia alias explicabo corporis blanditiis, ex cumque maiores maxime aperiam. Numquam corrupti sed fugit laboriosam rem, blanditiis. Sint incidunt soluta assumenda fuga hic earum voluptas tenetur unde ullam maiores et harum beatae, perspiciatis, dolorem quaerat eveniet molestias, quasi corporis nostrum, distinctio fugit provident.</p>
            <p>Delectus id est laboriosam ut sunt inventore at dignissimos, nisi ipsum quisquam beatae autem rerum praesentium quod ullam tenetur, aspernatur sapiente ea aut ipsam consectetur? Quibusdam laboriosam odio minus, officia obcaecati. Optio pariatur eum tempora voluptatem quam eos aperiam, quos assumenda, consequuntur magnam, recusandae accusantium facere porro modi ad eaque.</p>
          </div>
          <footer>Footer</footer>
        </div>
      </div>
    </div>
    <div class="container">
      <pre><code class="language-scss">
.body { @include sticky-footer('.main'); }
      </code></pre>
    </div>
  </div>
  <div class="container">
    <?php include "include/more-demos.php" ?>
  </div>
</div>
  <?php include "include/site-footer.php" ?>
</body>
</html>
