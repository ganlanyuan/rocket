module.exports = {
  'Simple list grid' : function (client) {
    var url = client.launch_url + 'layout-grid.php';

    client
      .url(url)
      .waitForElementVisible('body', 1000)
      // .setValue('input[type=text]', 'nightwatch')
      // .waitForElementVisible('button[name=btnG]', 1000)
      // .click('button[name=btnG]')
      .assert.containsText('.main-heading', 'Layout: Grid')
      .end();
  }
};