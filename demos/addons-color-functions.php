<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 class="main-heading"><span>addons: </span>color functions</h2>
      
      <h4>Contrast</h4>
      <div class="contrast">
        <div class="color-box color-box-contrast-1">contrast</div>
        <div class="color-box color-box-contrast-2">contrast</div>
        <div class="color-box color-box-contrast-3">contrast</div>
      </div>
      <pre><code class="language-scss">
$contrast: #5173a3, #bbf8e6, #cb7d26;
@for $i from 1 through 3 {
  .color-box-contrast-#{$i} { 
    background-color: nth($contrast, $i); 
    color: contrast(nth($contrast, $i) light #eee dark #333);
    width: 30%;
  }
}
      </code></pre>
      
      <h4>Adjacent</h4>
      <div class="example-adjacent">
        <div class="color-box color-box-adjacent-1">adjacent 1</div>
        <div class="color-box color-box-original">original</div>
        <div class="color-box color-box-adjacent-2">adjacent 2</div>
        <div class="color-pattern"><img src="images/adjacent.png" alt="adjacent-colors"></div>
      </div>
      <pre><code class="language-scss">
.color-box-adjacent-1 { 
  background-color: adjacent($original -1); 
  color: contrast(adjacent($original -1));
}
.color-box-adjacent-2 { 
  background-color: adjacent($original 1);
  color: contrast(adjacent($original 1));
}
      </code></pre>
      
      <h4>Complementary</h4>
      <div class="example-complementary">
        <div class="color-box color-box-original">original</div>
        <div class="color-box color-box-complementary">complementary</div>
        <div class="color-pattern"><img src="images/complementary.png" alt="complementary-colors"></div>
      </div>
      <pre><code class="language-scss">
.color-box-complementary { 
  background-color: complementary($original); 
  color: contrast(complementary($original));
}
      </code></pre>
      
      <h4>Split complementary</h4>
      <div class="example-split-complementary">
        <div class="color-box color-box-original">original</div>
        <div class="color-box color-box-split-complementary-1">split-complementary 1</div>
        <div class="color-box color-box-split-complementary-2">split-complementary 2</div>
        <div class="color-pattern"><img src="images/split-complementary.png" alt="split-complementary-colors"></div>
      </div>
      <pre><code class="language-scss">
.color-box-split-complementary-1 { 
  background-color: split-complementary($original 1); 
  color: contrast(split-complementary($original 1));
}
.color-box-split-complementary-2 { 
  background-color: split-complementary($original 2);
  color: contrast(split-complementary($original 2));
}
      </code></pre>
      
      <h4>Triad</h4>
      <div class="example-triad">
        <div class="color-box color-box-original">original</div>
        <div class="color-box color-box-triad-1">triad 1</div>
        <div class="color-box color-box-triad-2">triad 2</div>
        <div class="color-pattern"><img src="images/triad.png" alt="triad-colors"></div>
      </div>
      <pre><code class="language-scss">
.color-box-triad-1 { 
  background-color: triad($original 1); 
  color: contrast(triad($original 1));
}
.color-box-triad-2 { 
  background-color: triad($original 2);
  color: contrast(triad($original 2));
}
      </code></pre>
      
      <h4>Rectangle</h4>
      <div class="example-rectangle">
        <div class="color-box color-box-original">original</div>
        <div class="color-box color-box-rectangle-1">rectangle 1</div>
        <div class="color-box color-box-rectangle-2">rectangle 2</div>
        <div class="color-box color-box-rectangle-3">rectangle 3</div>
        <div class="color-pattern"><img src="images/rectangle.png" alt="rectangle-colors"></div>
      </div>
      <pre><code class="language-scss">
.color-box-rectangle-1 { 
  background-color: rectangle($original 1); 
  color: contrast(rectangle($original 1));
}
.color-box-rectangle-2 { 
  background-color: rectangle($original 2);
  color: contrast(rectangle($original 2));
}
.color-box-rectangle-3 { 
  background-color: rectangle($original 3);
  color: contrast(rectangle($original 3));
}
      </code></pre>
      
      <h4>Square</h4>
      <div class="example-square">
        <div class="color-box color-box-original">original</div>
        <div class="color-box color-box-square-1">square 1</div>
        <div class="color-box color-box-square-2">square 2</div>
        <div class="color-box color-box-square-3">square 3</div>
        <div class="color-pattern"><img src="images/square.png" alt="square-colors"></div>
      </div>
      <pre><code class="language-scss">
.color-box-square-1 { 
  background-color: square($original 1); 
  color: contrast(square($original 1));
}
.color-box-square-2 { 
  background-color: square($original 2);
  color: contrast(square($original 2));
}
.color-box-square-3 { 
  background-color: square($original 3);
  color: contrast(square($original 3));
}
      </code></pre>
    </div>

    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
</body>
</html>

