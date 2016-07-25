module.exports = {
  'List grid' : function (client) {
    var url = client.launch_url + 'layout-grid.php';
    var containerWidth, 
        verticalLocation,
        horizontalLocation1,
        horizontalLocation2,
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
      horizontalLocation2 = (containerWidth + GUTTER) * COLUMNS[0] / TOTAL;

      var thisWidth = (containerWidth + GUTTER) * COLUMNS[0] / TOTAL - GUTTER;
      this.verify.equal(Math.round(result.value.width), Math.round(thisWidth));
    });

    client.getElementSize('#grid-simple-list > div:nth-child(2)', function (result) {
      var thisWidth = (containerWidth + GUTTER) * COLUMNS[1] / TOTAL - GUTTER;
      this.verify.equal(Math.round(result.value.width), Math.round(thisWidth));
    });

    // check vertical & horizontal location
    client.getLocation('#grid-simple-list', function (result) {
      verticalLocation = result.value.y;
      horizontalLocation1 = result.value.x;
      horizontalLocation2 += result.value.x;
    });

    client.getLocation('#grid-simple-list > div:nth-child(1)', function (result) {
      this.verify.equal(Math.round(result.value.y), Math.round(verticalLocation));
      this.verify.equal(Math.round(result.value.x), Math.round(horizontalLocation1));
    });

    client.getLocation('#grid-simple-list > div:nth-child(2)', function (result) {
      this.verify.equal(Math.round(result.value.y), Math.round(verticalLocation));
      this.verify.equal(Math.round(result.value.x), Math.round(horizontalLocation2));
    });

  },

  'List grid with customized child elements' : function (client) {
    var containerWidth, 
        verticalLocation,
        horizontalLocation1,
        horizontalLocation2,
        GUTTER = 20, 
        COLUMNS = [3, 4],
        TOTAL = 7;

    // check grid width
    client.getElementSize('#grid-simple-list-child', function (result) {
      containerWidth = result.value.width;
    });

    client.getElementSize('#grid-simple-list-child > .child:nth-child(1)', function (result) {
      horizontalLocation2 = (containerWidth + GUTTER) * COLUMNS[0] / TOTAL;

      var thisWidth = (containerWidth + GUTTER) * COLUMNS[0] / TOTAL - GUTTER;
      this.verify.equal(Math.round(result.value.width), Math.round(thisWidth));
    });

    client.getElementSize('#grid-simple-list-child > .child:nth-child(2)', function (result) {
      var thisWidth = Math.round((containerWidth + GUTTER) * COLUMNS[1] / TOTAL - GUTTER);
      this.verify.equal(Math.round(result.value.width), Math.round(thisWidth));
    });

    // check vertical & horizontal location
    client.getLocation('#grid-simple-list-child', function (result) {
      verticalLocation = result.value.y;
      horizontalLocation1 = result.value.x;
      horizontalLocation2 += result.value.x;
    });

    client.getLocation('#grid-simple-list-child > .child:nth-child(1)', function (result) {
      this.verify.equal(Math.round(result.value.y), Math.round(verticalLocation));
      this.verify.equal(Math.round(result.value.x), Math.round(horizontalLocation1));
    });

    client.getLocation('#grid-simple-list-child > .child:nth-child(2)', function (result) {
      this.verify.equal(Math.round(result.value.y), Math.round(verticalLocation));
      this.verify.equal(Math.round(result.value.x), Math.round(horizontalLocation2));
    });

  },

  'List grid with direction: right to left' : function (client) {
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
      var thisWidth = (containerWidth + GUTTER) * COLUMNS[0] / TOTAL - GUTTER;
      this.verify.equal(Math.round(result.value.width), Math.round(thisWidth));
    });

    client.getElementSize('#grid-simple-list-direction > div:nth-child(2)', function (result) {
      horizontalLocation1 = (containerWidth + GUTTER) * COLUMNS[1] / TOTAL;

      var thisWidth = (containerWidth + GUTTER) * COLUMNS[1] / TOTAL - GUTTER;
      this.verify.equal(Math.round(result.value.width), Math.round(thisWidth));
    });

    // check vertical & horizontal location
    client.getLocation('#grid-simple-list-direction', function (result) {
      verticalLocation = result.value.y;
      horizontalLocation1 += result.value.x;
      horizontalLocation2 = result.value.x;
    });

    client.getLocation('#grid-simple-list-direction > div:nth-child(1)', function (result) {
      this.verify.equal(Math.round(result.value.y), Math.round(verticalLocation));
      this.verify.equal(Math.round(result.value.x), Math.round(horizontalLocation1));
    });

    client.getLocation('#grid-simple-list-direction > div:nth-child(2)', function (result) {
      this.verify.equal(Math.round(result.value.y), Math.round(verticalLocation));
      this.verify.equal(Math.round(result.value.x), Math.round(horizontalLocation2));
    });

  },

  'List grid with percentage gutter' : function (client) {
    var containerWidth, 
        verticalLocation,
        horizontalLocation1,
        horizontalLocation2,
        GUTTER = 0.05, 
        COLUMNS = [3, 4],
        TOTAL = 7;

    // check grid width
    client.getElementSize('#grid-simple-list-gutter', function (result) {
      containerWidth = result.value.width;
    });

    client.getElementSize('#grid-simple-list-gutter > div:nth-child(1)', function (result) {
      horizontalLocation2 = (containerWidth * (1 + GUTTER)) * COLUMNS[0] / TOTAL;

      var thisWidth = (containerWidth * (1 + GUTTER)) * COLUMNS[0] / TOTAL - containerWidth * GUTTER;
      this.verify.equal(Math.round(result.value.width), Math.round(thisWidth));
    });

    client.getElementSize('#grid-simple-list-gutter > div:nth-child(2)', function (result) {
      var thisWidth = (containerWidth * (1 + GUTTER)) * COLUMNS[1] / TOTAL - containerWidth * GUTTER;
      this.verify.equal(Math.round(result.value.width), Math.round(thisWidth));
    });

    // check vertical & horizontal location
    client.getLocation('#grid-simple-list-gutter', function (result) {
      verticalLocation = result.value.y;
      horizontalLocation1 = result.value.x;
      horizontalLocation2 += result.value.x;
    });

    client.getLocation('#grid-simple-list-gutter > div:nth-child(1)', function (result) {
      this.verify.equal(Math.round(result.value.y), Math.round(verticalLocation));
      this.verify.equal(Math.round(result.value.x), Math.round(horizontalLocation1));
    });

    client.getLocation('#grid-simple-list-gutter > div:nth-child(2)', function (result) {
      this.verify.equal(Math.round(result.value.y), Math.round(verticalLocation));
      this.verify.equal(Math.round(result.value.x), Math.round(horizontalLocation2));
    });

  },

  'Nested grid' : function (client) {
    var containerWidth, 
        verticalLocation,
        horizontalLocation1,
        horizontalLocation2,
        GUTTER = 20, 
        COLUMNS = [3, 4],
        TOTAL = 7;

    // check grid width
    client.getElementSize('#grid-nested-list', function (result) {
      containerWidth = result.value.width;
    });

    client.getElementSize('#grid-nested-list > div:nth-child(1)', function (result) {
      horizontalLocation2 = (containerWidth + GUTTER) * COLUMNS[0] / TOTAL;

      var thisWidth = (containerWidth + GUTTER) * COLUMNS[0] / TOTAL - GUTTER;
      this.verify.equal(Math.round(result.value.width), Math.round(thisWidth));
    });

    client.getElementSize('#grid-nested-list > div:nth-child(2)', function (result) {
      var thisWidth = (containerWidth + GUTTER) * COLUMNS[1] / TOTAL - GUTTER;
      this.verify.equal(Math.round(result.value.width), Math.round(thisWidth));
    });

    client.getElementSize('#grid-nested-list > div:nth-child(3)', function (result) {
      this.verify.equal(Math.round(result.value.width), Math.round(containerWidth));
    });

    // check vertical & horizontal location
    client.getLocation('#grid-nested-list', function (result) {
      verticalLocation = result.value.y;
      horizontalLocation1 = result.value.x;
      horizontalLocation2 += result.value.x;
    });

    client.getLocation('#grid-nested-list > div:nth-child(1)', function (result) {
      this.verify.equal(Math.round(result.value.y), Math.round(verticalLocation));
      this.verify.equal(Math.round(result.value.x), Math.round(horizontalLocation1));
    });

    client.getLocation('#grid-nested-list > div:nth-child(2)', function (result) {
      this.verify.equal(Math.round(result.value.y), Math.round(verticalLocation));
      this.verify.equal(Math.round(result.value.x), Math.round(horizontalLocation2));
    });

    client.getLocation('#grid-nested-list > div:nth-child(3)', function (result) {
      this.verify.equal(Math.round(result.value.x), Math.round(horizontalLocation1));
      this.verify.equal(Math.round(result.value.y), Math.round(verticalLocation));
    });

    client.end();
  }

};