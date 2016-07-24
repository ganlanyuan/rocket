module.exports = {
  'List grid' : function (client) {
    var url = client.launch_url + 'layout-grid.php';
    var containerWidth, 
        verticalLocation,
        GUTTER = 20, 
        COLUMNS = [3, 4],
        TOTAL = 7;

    client
      .url(url)
      .pause(1000);

    // check grid width
    client.getElementSize('#grid-simple-list', function (result) {
      containerWidth = result.value.width;
    });

    client.getElementSize('#grid-simple-list > div:nth-child(1)', function (result) {
      var thisWidth = Math.round((containerWidth + GUTTER) * COLUMNS[0] / TOTAL - GUTTER);

      this.verify.equal(result.value.width, thisWidth);
    });

    client.getElementSize('#grid-simple-list > div:nth-child(2)', function (result) {
      var thisWidth = Math.round((containerWidth + GUTTER) * COLUMNS[1] / TOTAL - GUTTER);

      this.verify.equal(result.value.width, thisWidth);
    });

    // check vertical location
    client.getLocation('#grid-simple-list', function (result) {
      verticalLocation = result.value.y;
    });

    client.getLocation('#grid-simple-list > div:nth-child(1)', function (result) {
      this.verify.equal(result.value.y, verticalLocation);
    });

    client.getLocation('#grid-simple-list > div:nth-child(2)', function (result) {
      this.verify.equal(result.value.y, verticalLocation);
    });

  },

  'List grid with customized child elements' : function (client) {
    var url = client.launch_url + 'layout-grid.php';
    var containerWidth, 
        verticalLocation,
        GUTTER = 20, 
        COLUMNS = [3, 4],
        TOTAL = 7;

    // check grid width
    client.getElementSize('#grid-simple-list-child', function (result) {
      containerWidth = result.value.width;
    });

    client.getElementSize('#grid-simple-list-child > .child:nth-child(1)', function (result) {
      var thisWidth = Math.round((containerWidth + GUTTER) * COLUMNS[0] / TOTAL - GUTTER);

      this.verify.equal(result.value.width, thisWidth);
    });

    client.getElementSize('#grid-simple-list-child > .child:nth-child(2)', function (result) {
      var thisWidth = Math.round((containerWidth + GUTTER) * COLUMNS[1] / TOTAL - GUTTER);

      this.verify.equal(result.value.width, thisWidth);
    });

    // check vertical location
    client.getLocation('#grid-simple-list-child', function (result) {
      verticalLocation = result.value.y;
    });

    client.getLocation('#grid-simple-list-child > .child:nth-child(1)', function (result) {
      this.verify.equal(result.value.y, verticalLocation);
    });

    client.getLocation('#grid-simple-list-child > .child:nth-child(2)', function (result) {
      this.verify.equal(result.value.y, verticalLocation);
    });

  },

  'List grid with direction: right to left' : function (client) {
    var url = client.launch_url + 'layout-grid.php';
    var containerWidth, 
        verticalLocation,
        horizontalLocation1,
        horizontalLocation2,
        GUTTER = 20, 
        COLUMNS = [3, 4],
        TOTAL = 7;

    // check grid width
    client.getElementSize('#grid-simple-list-direction', function (result) {
      containerWidth = result.value.width;
    });

    client.getElementSize('#grid-simple-list-direction > div:nth-child(1)', function (result) {
      var thisWidth = Math.round((containerWidth + GUTTER) * COLUMNS[0] / TOTAL - GUTTER);

      this.verify.equal(result.value.width, thisWidth);
    });

    client.getElementSize('#grid-simple-list-direction > div:nth-child(2)', function (result) {
      var thisWidth = Math.round((containerWidth + GUTTER) * COLUMNS[1] / TOTAL - GUTTER);
      horizontalLocation1 = thisWidth + GUTTER;

      this.verify.equal(result.value.width, thisWidth);
    });

    // check vertical & horizontal location
    client.getLocation('#grid-simple-list-direction', function (result) {
      verticalLocation = result.value.y;
      horizontalLocation1 += result.value.x;
      horizontalLocation2 = result.value.x;
    });

    client.getLocation('#grid-simple-list-direction > div:nth-child(1)', function (result) {
      this.verify.equal(result.value.y, verticalLocation);
      this.verify.equal(result.value.x, horizontalLocation1);
    });

    client.getLocation('#grid-simple-list-direction > div:nth-child(2)', function (result) {
      this.verify.equal(result.value.y, verticalLocation);
      this.verify.equal(result.value.x, horizontalLocation2);
    });

    client.end();
  }

};