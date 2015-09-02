<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 id=""><span>components: </span>validation</h2>
      <form action="" id="myform">
        <ol>
          <li>
            <label for="name">Name</label>
            <input type="text" id="name" pattern="[a-zA-Z]{6}" required>
            <div data-info="valid">User name is valid.</div>
            <div data-info="required">Valid user name required.</div>
            <div data-info="error">User name must be at least 6 characters.</div>
          </li>
          <li>
            <label for="email">Email</label>
            <input type="email" id="email" required>
            <div data-info="valid">Email address is valid.</div>
            <div data-info="required">Valid email address required.</div>
            <div data-info="error">Please enter a valid email.</div>
          </li>
          <li>
            <label for="phone">Phone</label>
            <input type="tel" id="phone" pattern="^\d{3}-\d{3}-\d{4}$" required>
            <div data-info="required">Phone number required.</div>
            <div data-info="error">Phone number format must be xxx-xxx-xxxx.</div>
          </li>
          <li>
            <input type="submit" value="Submit">
          </li>
        </ol>
      </form>
      <pre><code class="language-scss">
      </code></pre>
    </div>
    
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
  <script>
    window.onload = function () {
      H5F.setup(document.querySelector("#myform"));
    }
  </script>
</div>
</body>
</html>

