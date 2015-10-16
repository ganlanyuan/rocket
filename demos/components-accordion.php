<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 class="main-heading"><span>components: </span>Accordion</h2>
      <div class="example example-accordion">
        <h4>Checkbox</h4>
        <div class="accordion accordion-checkbox acc-1">
          <input type="checkbox" name="" id="accordion-checkbox-1">
          <label for="accordion-checkbox-1"><strong>About Us</strong></label>
          <div>
            <p>Well, the way they make shows is, they make one show. That show's called a pilot. Then they show that show to the people who make shows, and on the strength of that one show they decide if they're going to make more shows.</p>
          </div>
        </div>
        <div class="accordion accordion-checkbox acc-1">
          <input type="checkbox" name="" id="accordion-checkbox-2">
          <label for="accordion-checkbox-2"><strong>How we work</strong></label>
          <div>
            <p>Like you, I used to think the world was this great place where everybody lived by the same standards I did, then some kid with a nail showed me I was living in his world, a world where chaos rules not order, a world where righteousness is not rewarded. That's Cesar's world, and if you're not willing to play by his rules, then you're gonna have to pay the price. </p>
          </div>
        </div>
        <div class="accordion accordion-checkbox acc-1">
          <input type="checkbox" name="" id="accordion-checkbox-3">
          <label for="accordion-checkbox-3"><strong>Contact Us</strong></label>
          <div>
            <p>You think water moves fast? You should see ice. It moves like it has a mind. Like it knows it killed the world once and got a taste for murder. After the avalanche, it took us a week to climb out. Now, I don't know exactly when we turned on each other, but I know that seven of us survived the slide... and only five made it out. Now we took an oath, that I'm breaking now. We said we'd say it was the snow that killed the other two, but it wasn't. Nature is lethal but it doesn't hold a candle to man. </p>
          </div>
        </div>
        <br>
        <h4>Radio</h4>
        <div class="accordion accordion-radio acc-2">
          <input type="radio" name="accordion-radio" id="accordion-radio-1">
          <label for="accordion-radio-1"><strong>About Us</strong></label>
          <div>
            <p>Well, the way they make shows is, they make one show. That show's called a pilot. Then they show that show to the people who make shows, and on the strength of that one show they decide if they're going to make more shows.</p>
          </div>
        </div>
        <div class="accordion accordion-radio acc-2">
          <input type="radio" name="accordion-radio" id="accordion-radio-2">
          <label for="accordion-radio-2"><strong>How we work</strong></label>
          <div>
            <p>Like you, I used to think the world was this great place where everybody lived by the same standards I did, then some kid with a nail showed me I was living in his world, a world where chaos rules not order, a world where righteousness is not rewarded. That's Cesar's world, and if you're not willing to play by his rules, then you're gonna have to pay the price. </p>
          </div>
        </div>
        <div class="accordion accordion-radio acc-2">
          <input type="radio" name="accordion-radio" id="accordion-radio-3">
          <label for="accordion-radio-3"><strong>Contact Us</strong></label>
          <div>
            <p>You think water moves fast? You should see ice. It moves like it has a mind. Like it knows it killed the world once and got a taste for murder. After the avalanche, it took us a week to climb out. Now, I don't know exactly when we turned on each other, but I know that seven of us survived the slide... and only five made it out. Now we took an oath, that I'm breaking now. We said we'd say it was the snow that killed the other two, but it wasn't. Nature is lethal but it doesn't hold a candle to man. </p>
          </div>
        </div>
        <br>
        <h4>Default open</h4>
        <div class="accordion accordion-checkbox acc-3">
          <input type="checkbox" name="" id="accordion-checkbox-b1" checked="">
          <label for="accordion-checkbox-b1"><strong>About Us</strong></label>
          <div>
            <p>Well, the way they make shows is, they make one show. That show's called a pilot. Then they show that show to the people who make shows, and on the strength of that one show they decide if they're going to make more shows.</p>
          </div>
        </div>
        <div class="accordion accordion-checkbox acc-3">
          <input type="checkbox" name="" id="accordion-checkbox-b2">
          <label for="accordion-checkbox-b2"><strong>How we work</strong></label>
          <div>
            <p>Like you, I used to think the world was this great place where everybody lived by the same standards I did, then some kid with a nail showed me I was living in his world, a world where chaos rules not order, a world where righteousness is not rewarded. That's Cesar's world, and if you're not willing to play by his rules, then you're gonna have to pay the price. </p>
          </div>
        </div>
        <div class="accordion accordion-checkbox acc-3">
          <input type="checkbox" name="" id="accordion-checkbox-b3">
          <label for="accordion-checkbox-b3"><strong>Contact Us</strong></label>
          <div>
            <p>You think water moves fast? You should see ice. It moves like it has a mind. Like it knows it killed the world once and got a taste for murder. After the avalanche, it took us a week to climb out. Now, I don't know exactly when we turned on each other, but I know that seven of us survived the slide... and only five made it out. Now we took an oath, that I'm breaking now. We said we'd say it was the snow that killed the other two, but it wasn't. Nature is lethal but it doesn't hold a candle to man. </p>
          </div>
        </div>
        <br>
        <h4>Menu</h4>
        <div class="header">
          <label for="menu" class="menu-icon"><span></span></label>
          <div class="nav-wrap">
            <input type="checkbox" name="menu" id="menu">
            <nav class="nav">
              <ul>
                <li><a href="">About Us</a></li>
                <li><a href="">How we work</a></li>
                <li><a href="">Contact Us</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
      <pre><code class="language-scss">
.accordion { @include accordion(div 200px 0.4s); }
      </code></pre>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php"; ?>
</div>
</body>
</html>

