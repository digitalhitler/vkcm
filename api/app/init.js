/**
 * app/init.js
 *
 * @project vkcm-api-server
 * @module app
 * @summary Bootstrap-script for express application & listening for server
 *
 * @exports app
 */

'use strict';

const path            = require('path');
const express         = require('express');

global.applicationRoot = path.normalize(`${__dirname}/../`);
global.use = function(name) {
  return require(`${applicationRoot}/${name}`);
};

let app = express();
app.config  = require('./config.json');
app.map     = require('./map.json');

global.applicationDebug = app.config.debug;

// * First common middlewares

use('app/middlewares')(app);

app.start = function() {

  let self = this;

  // * Final middlewares

  // If no route found, return HTTP/404
  self.use((req, res, next) => {

    console.log('got 404', {
      url: req.originalUrl,
      ipAddr: req.ip,
      hostname: req.hostname
    });

    res.set('Content-Type', 'application/json');
    res.status(404);
    res.send(self.transport.errorResponse({
      status: 404,
      type: 'user',
      message: 'Not found'
    }));

  });

  // stackman MUST be loaded after everything!
  if (self.config.debug === true) {

    self.use(require('express-stackman')());

    self.use(function onError(err, req, res, next) {
      console.log('onError called!');
    });
  } else {
    self.use(opbeat.middleware.express());
  }

  self.listen(self.config.server.port, function() {
    console.log(`API Server is listening on ${self.config.server.port}`);
  });

};

module.exports = app;
