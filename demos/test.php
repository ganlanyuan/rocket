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
  <script src="js/prefixfree.js"></script>
  <script src="js/conic-gradient.js"></script>
</head>
<body>

<div class="container">
  <div class="nav">
    <ul class="links">
      <li>item-1</li>
      <li>item-2</li>
      <li>item-3</li>
      <li>item-4</li>
      <li>item-5</li>
      <li>item-6</li>
      <li>item-7</li>
      <li>item-8</li>
      <li>item-9</li>
      <li>item-10</li>
    </ul>
  </div>
  <!-- <div class="box"></div> -->
  <!-- <div class="card">
    <div class="chart front">front</div>
    <div class="chart back">back</div>
  </div> -->
</div>
<script>
  ready(function () {
    // Array.prototype.last = function() {
    //   return this[this.length-1];
    // }

    var priorityNav = function (navClass, buttonText) {
      var nav = kit(navClass);
      nav.find('ul').addClass('visible-links');
      nav.prepend('<button class="js-nav-toggle" data-count="">' + buttonText + '</button>').append('<ul class="hidden-links"><li>abc</li></ul>');

      // alert(breakpoints[breakpoints.length-1])
      var vlinks = kit(navClass + '> .visible-links > li');
      var breakpoints = [kit(vlinks[0]).outerWidth()];
      for (var i = 1; i < vlinks.length; i++) {
        var itemWidth = breakpoints[breakpoints.length-1] + kit(vlinks[i]).outerWidth();
        breakpoints.push(itemWidth);
      };
      console.log(breakpoints);

      var checkSpace = function () {
        var nav = kit(navClass);
        var btn = kit(navClass + '> .js-nav-toggle');
        var vlinks = kit(navClass + '> .visible-links');
        var availableSpace = vlinks.outerWidth();
        // var availableSpace = nav.outerWidth() - btn.outerWidth();
        if (true) {};
        // console.log(availableSpace);
      };

      winLoad(checkSpace());
      winResize(checkSpace());
    };
    priorityNav('.nav', 'more');
  })
</script>
</body>
</html>