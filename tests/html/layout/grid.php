<?php include '../part/head.php'; ?>
<body>
<div class="container">
  <div class="topic">
    <h2 class="main-heading"><span>layout: </span>grid</h2>
    <div class="example ovh">
  
      <!-- grid-simple-list -->
      <div class="title">(3 4)</div>
      <div id="grid-simple-list" data-margin>
        <div><div class="example-content cell" data-content></div></div>
        <div><div class="example-content cell" data-content></div></div>
      </div>
  
      <!-- grid-simple-list-child -->
      <div class="title">(3 4) child ".child"</div>
      <div id="grid-simple-list-child" data-margin>
        <main class="child"><div class="example-content cell" data-content></div></main>
        <aside class="child"><div class="example-content cell" data-content></div></aside>
      </div>
  
      <!-- grid-simple-list-gutter -->
      <div class="title">(3 4 : 2 1) gutter 5%</div>
      <div id="grid-simple-list-gutter1" data-margin>
        <div><div class="example-content cell" data-content></div></div>
        <div><div class="example-content cell" data-content></div></div>
      </div>
  
      <!-- grid-simple-list-gutter -->
      <div class="title">(3 4) gutter 5rem</div>
      <div id="grid-simple-list-gutter2" data-margin>
        <div><div class="example-content cell" data-content></div></div>
        <div><div class="example-content cell" data-content></div></div>
      </div>
  
      <!-- grid-simple-list-direction -->
      <div class="title">(3 4) RTL</div>
      <div id="grid-simple-list-direction" data-margin>
        <div><div class="example-content cell" data-content></div></div>
        <div><div class="example-content cell" data-content></div></div>
      </div>
  
      <!-- grid-nested-list -->
      <div class="title">(3 4) 7</div>
      <div id="grid-nested-list" data-margin>
        <div><div class="example-content cell" data-content></div></div>
        <div><div class="example-content cell" data-content></div></div>
        <div><div class="example-content cell" data-content></div></div>
      </div>
  
      <!-- grid-map -->
      <div class="title">( (3 4 7 : 0 2 1) 3 )</div>
      <div id="grid-map" data-margin>
        <div><div class="example-content cell" data-content></div></div>
        <div><div class="example-content cell" data-content></div></div>
        <div><div class="example-content cell" data-content></div></div>
        <div><div class="example-content cell" data-content></div></div>
      </div>
  
      <!-- grid-breakpoint-simple-list -->
      <div class="title">( 600px: (5 7) )</div>
      <div id="grid-breakpoint-simple-list" data-margin>
        <div><div class="example-content cell" data-content></div></div>
        <div><div class="example-content cell" data-content></div></div>
      </div>
  
      <!-- grid-breakpoint-outside-simple-list -->
      <div class="title">( 600px: (5 7) ) outside</div>
      <div id="grid-breakpoint-outside-simple-list" data-margin>
        <div><div class="example-content cell" data-content></div></div>
        <div><div class="example-content cell" data-content></div></div>
      </div>
  
      <!-- grid-breakpoint-nested-list -->
      <div class="title">( 600px: (3 4) (2 5) 3 )</div>
      <div id="grid-breakpoint-nested-list" data-margin>
        <div><div class="example-content cell" data-content></div></div>
        <div><div class="example-content cell" data-content></div></div>
        <div><div class="example-content cell" data-content></div></div>
        <div><div class="example-content cell" data-content></div></div>
        <div><div class="example-content cell" data-content></div></div>
      </div>
  
      <!-- grid-breakpoint-map -->
      <div class="title">( 600px: (3 4 : 2 1) (2 5) 3 )</div>
      <div id="grid-breakpoint-map" data-margin>
        <div><div class="example-content cell" data-content></div></div>
        <div><div class="example-content cell" data-content></div></div>
        <div><div class="example-content cell" data-content></div></div>
        <div><div class="example-content cell" data-content></div></div>
        <div><div class="example-content cell" data-content></div></div>
      </div>
  
      <!-- grid-breakpoint-default -->
      <div class="title">( 'default': (3 4), 900px: (2 7) )</div>
      <div id="grid-breakpoint-default" data-margin>
        <div><div class="example-content cell" data-content></div></div>
        <div><div class="example-content cell" data-content></div></div>
      </div>
  
      <!-- grid-breakpoint-complex-list -->
      <div class="title">( 'default': (3 4) (2 5) 3, 600px: (3 4 2) (5 3), 900px: (5 2 3: 2 1 3) (1 1) )</div>
      <div id="grid-breakpoint-complex-list" data-margin>
        <div><div class="example-content cell" data-content></div></div>
        <div><div class="example-content cell" data-content></div></div>
        <div><div class="example-content cell" data-content></div></div>
        <div><div class="example-content cell" data-content></div></div>
        <div><div class="example-content cell" data-content></div></div>
      </div>
  
    </div>
  </div>
</div>
</body>
</html>