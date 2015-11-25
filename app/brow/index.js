/**
 * app/brow/index.js
 *
 * @project vkcm
 * @summary Browserify-powered entry point
 *
 * If you need to compile new /build/bundle.js:
 * $ gulp browserify
 *
 * Real-time recompilation can be started by:
 * $ pm2 gulp start
 * [!] I don't recomment to use pm2-handled gulp on production.
 *     Don't forget to $ pm2 gulp stop after all.
 */

// @task 154 { published & done 24/11/15 }
// Issue with global link that diffs in node/common envs handles
// easily fixes with this obvious:
if (!global && window) var global = window;

// * Dependencies
//   Transport & network modules
var request       = require('superagent');

//   Utilities
var event         = require('dom-events');
var Spinner       = require('spin');
var _             = require('lodash');
var EventEmitter  = require('events').EventEmitter;

// * Configuration extension
var configuration = {
  DEBUG: true
};

// * App HQ
var App = require('./modules/app');
var vkcm = new App(configuration);

vkcm.debug(vkcm);
