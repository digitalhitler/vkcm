/**
 * app/brow/modules/app.js
 *
 * @project vkcm
 * @module app
 * @summary Main application module file
 *
 * @exports App
 * @extends EventEmitter
 */

'use strict';

var lodash       = require('lodash');
var EventEmitter = require('events').EventEmitter;

/**
 * Main application workflow object
 *
 * @constructor App
 * @param  {object} [config] configuration
 */
var App = function(config) {

  // Set configuration
  if (typeof config === 'object') {
    this.config = config;
  }

  // Debug env
  if (this.config.DEBUG) {

    this.injectDebugger();

  } else {

    this.prototype.debug = function fakeDebugger() { return true; };

  }

  // Event toolbox
  EventEmitter.call(this);

};


/**
 * Extening application with EventEmitter
 * @type {EventEmitter}
 */
App.prototype = new EventEmitter;

/**
 * Inject debug module in application.
 * Can be used for force-inject debug
 * @param  {string}  [namespaces] Semicolon-divided list of debug namespaces
 * @return {undefined}
 * @link   http://smalljs.org/logging/debug/
 * @public
 */
App.prototype.injectDebugger = function(namespaces) {

  namespaces = namespaces || '*';

  var Debug = require('debug');
  Debug.enable(namespaces);

  App.prototype.debug = Debug('main');

};

App.prototype.request = require('superagent');


module.exports = App;
