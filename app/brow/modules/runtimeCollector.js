'use strict';

module.exports = function(app) {

  var response = {
    storageTransport:     require('./transport'),
    pushNotifications:    require('./push'),
    ui: {
      tether:             require('tether'),
      select:             require('../extensions/ui/tether-select')
    }
  };

  if (global.appRuntime) {
    global.appRuntime.Collector = response;
  }

  document.addEventListener('DOMContentLoaded', function() {
    app.debug('DOM Loaded. Initializing front-end state');

    global.appRuntime.Collector.ui.select.init();

    app.emit('frontendReady');
  });

  return response;

};
