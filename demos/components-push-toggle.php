<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>components: </span>Push toggle</h2>
      <div class="example">
        <div class="push-toggle two">
          <input type="radio" id="male" name="gender" checked="">
          <label for="male">Male</label>
          <input type="radio" id="female" name="gender">
          <label for="female">Female</label>
        </div>              
        <div class="push-toggle three">
          <input type="radio" id="one" name="grade" checked="">
          <label for="one">One</label>
          <input type="radio" id="two" name="grade">
          <label for="two">Two</label>
          <input type="radio" id="three" name="grade">
          <label for="three">Three</label>
        </div>              
      </div>
      <pre><code class="language-scss">
.push-toggle {

  // default push-toggle style
  label {
    padding: 0.9em 1.2em;
    background-image: linear-gradient(to bottom, #fff, #F4F4F4 70%, #e1e1e1);
    border: 1px solid #ccc;
    border-left-width: 0;
    &:first-of-type {
      border-top-left-radius: 3px;
      border-bottom-left-radius: 3px;
      border-left-width: 1px;
    }
    &:last-of-type {
      border-top-right-radius: 5px;
      border-bottom-right-radius: 5px;
    }
    .lt-ie9 & { background-color: #e1e1e1; }
  }

  // active push-toggle style
  @include push-toggle(){
    background-image: linear-gradient(to bottom, #E8E8E8, #F1F1F1 20%, #fff);
    box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.1) inset;
    .lt-ie9 & { background-color: #f2f2f2; }
  }
}
      </code></pre>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php"; ?>
</div>
</body>
</html>

