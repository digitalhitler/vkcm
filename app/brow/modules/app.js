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

var EventEmitter = require('events').EventEmitter;

/**
 * Main application workflow object
 *
 * @constructor App
 * @param  {object} [config] configuration
 */
var App = function(config) {

  global.appRuntime = {};

  // Check if app is instance of App
  if (!this instanceof App) {
    return new App(config);
  }

  // Set configuration
  if (typeof config === 'object') {
    this.config = config;
  }

  // Debug env
  if (this.config.DEBUG) {
    global.appRuntime.debug = true;
    this.injectDebugger();

  } else {

    this.prototype.debug = function fakeDebugger() { return true; };

    this.prototype.debug.err = function fakeErrorHandler() { return true; };

  }

  this.frameworks = {};

  // Event toolbox
  EventEmitter.call(this);

};


/**
 * Extening application with EventEmitter
 * @type {EventEmitter}
 */
App.prototype = new EventEmitter;

App.prototype.request = require('superagent');

/**
 * Inject debug module in application.
 * Can be used for force-inject debug
 * @param  {String}  [namespaces] Semicolon-divided list of debug namespaces
 * @return {Undefined}
 * @link   http://smalljs.org/logging/debug/
 * @public
 */
App.prototype.injectDebugger = function(namespaces) {


  namespaces = namespaces || 'main,panic';

  var Debug = require('debug');
  Debug.enable(namespaces);

  this.debug = Debug('main');
  this.debug.err = Debug('panic');
  this.exceptionPrototypes = require('./exceptions');

};


App.prototype.handleException = function(e) {
  if (typeof this.debug !== 'function') {
    this.injectDebugger();
  }
  this.debug.err(e);
};

App.prototype.forEach = function(obj, callback) {
  if (typeof obj === 'object' && typeof callback === 'function') {
    for (var key in obj) {
      if (obj.hasOwnProperty(key)) {
        callback(key, obj[key], obj);
      }
    }
  }
};

App.prototype.extend = function(out) {
  out = out || {};

  for (var i = 1; i < arguments.length; i++) {
    var obj = arguments[i];

    if (!obj)
      continue;

    for (var key in obj) {
      if (obj.hasOwnProperty(key)) {
        if (typeof obj[key] === 'object')
          deepExtend(out[key], obj[key]);
        else
          out[key] = obj[key];
      }
    }
  }

  return out;
};

App.prototype.requireFrameworks = function(list) {
  var _this = this;
  if (typeof list === 'object') {
    this.forEach(list, function(key, val, obj) {
      try {
        _this.frameworks[key] = val;
      } catch (e) {
        _this.handleException(e);
      }
    });
  }
};

module.exports = App;
