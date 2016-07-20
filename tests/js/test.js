module.exports = {
  'Demo test Google' : function (client) {
    var data = client.launch_url + 'layout-grid.php';

    client
      // .url('http://www.google.com')
      .url(data)
      .waitForElementVisible('body', 1000)
      // .setValue('input[type=text]', 'nightwatch')
      // .waitForElementVisible('button[name=btnG]', 1000)
      // .click('button[name=btnG]')
      .assert.containsText('.main-heading', 'Layout: Grid')
      .end();
  }
};