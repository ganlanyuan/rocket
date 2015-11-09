<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 class="main-heading"><span>components: </span>input-file</h2>
      <div class="example">
        <div class="input-file">
          <input type="file" name="file" id="file" class="inputfile" data-multiple-caption="{count} files selected" multiple />
          <label for="file">
            <figure>
              <svg version="1.1" id="Capa_1" width="80" height="80" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 35.808 35.808" style="enable-background:new 0 0 35.808 35.808;" xml:space="preserve">
                <g><path d="M30.885,16.314c0.174-0.686,0.275-1.404,0.275-2.145c0-4.66-3.785-8.439-8.447-8.439C17.32,5.738,16.6,9.841,16.6,9.841 s-2.266-2.797-6.262-2.316c-3.598,0.717-5.947,3.953-5.947,7.254c0,0.568,0.08,1.111,0.229,1.639C1.922,17.403,0,19.997,0,23.031 c0,3.891,3.154,7.045,7.047,7.045h7.555v-9.5h-3.221l6.605-6.447l6.441,6.604h-3.221v9.344h7.553c3.896,0,7.049-3.154,7.049-7.045 C35.809,19.876,33.736,17.21,30.885,16.314z"/></g>
              </svg>
            </figure>
            <span>Choose a file</span>
          </label>
        </div>
      </div>
      <pre><code class="language-scss">
.input-file {
  @include input-file() {

    // customize
    padding: 0.8em;
    font-size: 18px;
    color: #2E92E3;
    figure {
      display: table-cell;
      width: 120px;
      height: 120px;
      margin: 0;
      border-radius: 50%;
      background-color: #2E92E3;
      text-align: center;
      vertical-align: middle;
      path { fill: #fff; }
    }
    span {
      display: block;
      margin-top: 10px;
    }
  }
}
      </code></pre>
    
    <?php include "include/more-demos.php" ?>
  </div>
</div>
<?php include "include/site-footer.php"; ?>
<script type="text/javascript">
  ready(function () {
    inputFile('#file');
  });
</script>
</body>
</html>

