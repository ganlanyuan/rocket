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
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript">

    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);


    // Callback that creates and populates a data table, 
    // instantiates the pie chart, passes in the data and
    // draws it.
    function drawChart() {

    // Create the data table.
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Topping');
    data.addColumn('number', 'Slices');
    data.addRows([
      ['Mushrooms', 3],
      ['Onions', 1],
      ['Olives', 1],
      ['Zucchini', 1],
      ['Pepperoni', 2]
    ]);

    // Set chart options
    var options = {'title':'How Much Pizza I Ate Last Night',
                   'width':400,
                   'height':300,
                   colors: ['#0080FF', '#FF0080', '#CC66FF', '#FF8000', '#008040']
                 };

    // Instantiate and draw our chart, passing in some options.
    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
    chart.draw(data, options);
    }
    </script>
</head>
<body>
  <div class="container">
    <div class="box"></div>

    <div id="chart_div" style="width:400; height:300"></div>
  </div>
</body>
</html>