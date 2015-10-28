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
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <!-- css -->
  <link href="https://fontastic.s3.amazonaws.com/MSJHPuJFXkve8cKEDAVMKT/icons.css" rel="stylesheet">
  <link href="prism/prism.css" rel="stylesheet">
  <link href="css/normalize.css" rel="stylesheet">
  <link rel="stylesheet" href="css/test.css">

  <!-- javascript -->
  <!--[if (lt IE 9)]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="js/ie.min.js"></script>
    
    <link href="http://externalcdn.com/respond-proxy.html" id="respond-proxy" rel="respond-proxy" />
    <link href="cross-domain/respond.proxy.gif" id="respond-redirect" rel="respond-redirect" />
    <script src="cross-domain/respond.proxy.js"></script> 
  <![endif]-->

  <script src="prism/prism.js"></script>
  <script src="js/Modernizr.js"></script>
  <script src="../bower_components/hammerjs/hammer.js"></script>
  <script src="../bower_components/TouchEmulator/touch-emulator.js"></script>
  <script src="../dist/kit.min.js"></script>
  <!-- <script src="js/prefixfree.js"></script> -->
  <!-- <script src="js/conic-gradient.js"></script> -->
  <style>
    html, body {
      overflow-x: hidden;
      min-width: 320px;
    }
    .box {
      position: relative;
      height: 100px;
      background-color: #4CB4FF;
    }
    .animate {
      -webkit-transition: transform 0.3s;
      -moz-transition: transform 0.3s;
      transition: transform 0.3s;
    }
    .red {
      position: absolute;
      width: 100px;
      height: 100px;
      background: #FF396E;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="red"><a href="">aaa</a></div>
  <div class="box"></div>
</div>
<script>
  var reqAnimationFrame = (function () {
    return window[Hammer.prefixed(window, 'requestAnimationFrame')] || function (callback) {
      window.setTimeout(callback, 1000 / 60);
    };
  })();

  var ticking = false;
  var transform;
  var timer;
  var START_X = 0;
  var START_Y = 0;

  var el = document.querySelector('.box');

  function resetElement() {
    el.className = 'box animate';
    transform = {
        translate: { x: START_X, y: START_Y },
        scale: 1,
        angle: 0,
        rx: 0,
        ry: 0,
        rz: 0
    };

    requestElementUpdate();
  }
  resetElement();

  function updateElementTransform() {
    var value = [
      'translate3d(' + transform.translate.x + 'px, 0, 0)',
      // 'translate3d(' + transform.translate.x + 'px, ' + transform.translate.y + 'px, 0)',
      // 'scale(' + transform.scale + ', ' + transform.scale + ')',
      // 'rotate3d('+ transform.rx +','+ transform.ry +','+ transform.rz +','+  transform.angle + 'deg)'
    ];

    value = value.join(" ");
    // el.textContent = value;
    el.style.webkitTransform = value;
    el.style.mozTransform = value;
    el.style.transform = value;
    ticking = false;
  }

  function requestElementUpdate() {
      if(!ticking) {
          reqAnimationFrame(updateElementTransform);
          ticking = true;
      }
  }

  var mc = new Hammer(el);
  mc.add( new Hammer.Pan({ derection: Hammer.DIRECTION_HORIZONTAL, threshold: 0 }));

  mc.on('panstart panmove', onPan);
  mc.on('swipe', onPan);
  mc.on("hammer.input", function(ev) {
    if(ev.isFinal) {
      if (START_X === 100) {
        if (transform.translate.x < 100) {
          START_X = 0;
        }
      } else {
        if (transform.translate.x > 50) {
          START_X = 100;
        }
      }
      resetElement();
    }
  });

  function onPan(ev) {
    el.className = 'box';
    var calX = (START_X + ev.deltaX > 100) ? 100 : START_X + ev.deltaX;
    transform.translate = {
      x: calX,
      y: ev.deltaY
    };

    requestElementUpdate();
  }
</script>
<!-- <div class="card">
  <div class="chart front">front</div>
  <div class="chart back">back</div>
</div> -->
</body>
</html>