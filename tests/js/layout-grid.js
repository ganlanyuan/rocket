module.exports = {
  'Simple list grid' : function (client) {
    var url = client.launch_url + 'layout-grid.php';
    var containerWidth;

    client
      .url(url)
      .pause(1000);

    client.getElementSize('#grid-simple-list', function (result) {
      containerWidth = result.value.width;
    });

    client.getElementSize('#grid-simple-list > div:first-child', function (result) {
      containerWidth = result.value.width;
      this.assert.equal(result.value.width, (containerWidth + 20) * 3 / 7);
    });

    client.end();
  }
};