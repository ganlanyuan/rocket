<!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7" lang="en"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js lt-ie10 lt-ie9 lt-ie8" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js lt-ie10 lt-ie9" lang="en"><![endif]-->
<!--[if (IE 9)&!(IEMobile)]><html class="no-js lt-ie10" lang="en"><![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"><!--<![endif]-->
<head>
  <!-- Change this to match your local server hostname and path -->
  <!-- <base href="http://localhost:8888/new/codeset/"> --><!--[if lte IE 6]></base><![endif]-->

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
  <!-- <meta http-equiv="cleartype" content="on"> -->
  <title>Test</title>
  
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

  <!-- css -->
  <link rel="stylesheet" href="css/test.css">
  <script src="js/index.min.js"></script>
</head>
<body>
  <div class="container">

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
          <input type="tel" id="phone" pattern="^\d{4}-\d{3}-\d{4}$" required>
          <div data-info="required">Phone number required.</div>
          <div data-info="error">Phone number format must be xxxx-xxx-xxxx.</div>
        </li>
        <li>
          <input type="submit" value="Submit">
        </li>
      </ol>
    </form>
    
  </div>
  <script>
    window.onload = function () {
      H5F.setup(document.querySelector("#myform"));
    }
  </script>
</body>
</html>