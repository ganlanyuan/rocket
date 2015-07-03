<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>components: </span>Checkbox</h2>
      <h4>Radio</h4>
      <div class="example">
        <div class="radio">
          <input type="radio" name="my-radio-name" id="my-radio-id-1" checked>
          <label for="my-radio-id-1">item 1</label>
          <br />
          <input type="radio" name="my-radio-name" id="my-radio-id-2">
          <label for="my-radio-id-2">item 2</label>
          <br />
          <input type="radio" name="my-radio-name" id="my-radio-id-3">
          <label for="my-radio-id-3">item 3</label>
          <br />
        </div>              
      </div>
      <pre><code class="language-scss">
.radio {
  @include checkbox() {
    padding: 4px 0 4px 26px;
    background: url('../images/radio.png') 0 50% no-repeat;
  }
  @include checkbox-active() {
    background-image: url('../images/radio-active.png');
  }
}
      </code></pre>

      <h4>Checkbox</h4>
      <div class="example">
        <div class="checkbox">
          <input type="checkbox" name="" id="my-checkbox-id-1">
          <label for="my-checkbox-id-1">item 1</label>
          <br />
          <input type="checkbox" name="" id="my-checkbox-id-2" checked>
          <label for="my-checkbox-id-2">item 2</label>
          <br />
          <input type="checkbox" name="" id="my-checkbox-id-3">
          <label for="my-checkbox-id-3">item 3</label>
          <br />
        </div>              
      </div>
    </div>
      <pre><code class="language-scss">
.checkbox {
  @include checkbox() {
    padding: 4px 0 4px 26px;
    background: url('../images/checkbox.png') 0 50% no-repeat;
  }
  @include checkbox-active() {
    background-image: url('../images/checkbox-active.png');
  }
}
      </code></pre>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php"; ?>
</div>
</body>
</html>

