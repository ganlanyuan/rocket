module.exports = {
  'Simple list grid' : function (client) {
    var url = client.launch_url + 'layout-grid.php';
    var containerWidth, 
        GUTTER = 20, 
        COLUMNS = [3, 4],
        TOTAL = 0;

    for (var i = COLUMNS.length; i--;) {
      TOTAL += COLUMNS[i];
    }

    client
      .url(url)
      .resizeWindow(1400, 800)
      .pause(1000);

    client.getElementSize('#grid-simple-list', function (result) {
      containerWidth = result.value.width;
    });

    client.getElementSize('#grid-simple-list > div:nth-child(1)', function (result) {
      var thisWidth = Math.round((containerWidth + GUTTER) * COLUMNS[0] / TOTAL - GUTTER);

      this.verify.equal(result.value.width, thisWidth);
    });

    client
      .resizeWindow(600, 400);
      
    client.getElementSize('#grid-simple-list', function (result) {
      containerWidth = result.value.width;
    });


    client.getElementSize('#grid-simple-list > div:nth-child(2)', function (result) {
      var thisWidth = Math.round((containerWidth + GUTTER) * COLUMNS[1] / TOTAL - GUTTER);

      this.verify.equal(result.value.width, thisWidth);
    });

    client.end();
  }
  // write : function (results, options, done) {
  //   console.log(results);
  //   done();
  // }
};