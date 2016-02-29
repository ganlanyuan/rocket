<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 class="main-heading"><span>components: </span>validation</h2>
      <ul class="validation-wrap">
        <li>
          <form action="" class="myform" id="form1">
            <h4>Form 1: normal</h4>
            <?php include 'include/form-validation.php'; ?>
          </form>
        </li>
        <li>
          <form action="" class="myform" id="form2">
            <h4>Form 2: fade-in right</h4>
            <?php include 'include/form-validation.php'; ?>
          </form>
        </li>
        <li>
          <form action="" class="myform" id="form3">
            <h4>Form 3: fade-in bottom</h4>
            <?php include 'include/form-validation.php'; ?>
          </form>
        </li>
        <li>
          <form action="" class="myform" id="form4">
            <h4>Form 4: slide-in top</h4>
            <?php include 'include/form-validation.php'; ?>
          </form>
        </li>
      </ul>
      <pre><code class="language-scss">
#form1 { @include validation(default); }
#form2 { @include validation(fade-in right default); }
#form3 { @include validation(fade-in bottom default); }
#form4 { @include validation(slide-in top default); }
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
  <script>
    window.onload = function () {
      H5F.setup(document.querySelectorAll(".myform"));
    }
  </script>
</div>
</body>
</html>

