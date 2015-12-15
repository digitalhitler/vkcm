/**
 * app/middlewares.js
 *
 * @project vkcm-api-server
 * @module appMiddlewares
 * @summary Middlewares loader
 *
 * @exports {bool} result of middleware injection
 */

'use strict';

const path            = require('path');
const express         = require('express');
const session         = require('express-session');
const favicon         = require('serve-favicon');
const methodOverride  = require('method-override');
const bodyParser      = require('body-parser');

const InitException   = use('app/exceptions/InitException');
const pathfinder      = use('app/pathfinder');

let passport = require('passport');

//const passport        = require('passport');
let oauth2          = require('./oauth2');
require('./auth');
global.oauth2 = oauth2;

// opbeat error tracking
let opbeat = require('opbeat').start({
  organizationId: '6077d3495e2d4e54994ec08bfe0b3973',
  appId: 'b8c514f298',
  secretToken: 'b325590ead070219c160930207422c363ed31657'
});
global.opbeat = opbeat;

/**
 * Trying to bootstrap all middlewares and throws exception
 * if something goes wrong.
 */
module.exports = function appMiddlewares(app) {

  let result = true;

  if(applicationDebug) {

    app.use((req, res, next) => {

      let userIp = req.ip.split(':').pop();
      let requestLog = use('app/logger')(module);
      requestLog.info(`${userIp} ${req.method} ${req.originalUrl}`, req.query, req.params);

      next();
    });

  }

  try {

    // * serve favicon
    // @todo: make it real
    // app.use(favicon('favicon.ico'));

    // * parse json in queries body
    app.bodyParser = bodyParser;

    // * required for PUT & delete http-methods
    app.use(methodOverride());

    // * Passport auth
    app.use(passport.initialize());

    // * session engine
    app.use(session({
      secret: 'itsMySup3rS3cr3t',
      saveUninitialized: true,
      resave: true,
    }));

    // * serve public directory
    app.use(express.static(path.join(__dirname, 'public')));

  } catch (e) {

    throw new InitException(e);
    result = false;

  }

  // * transport helpers
  app.transport = use('app/transport');

  // serve pathfinder (router)
  app.use(pathfinder);

};
